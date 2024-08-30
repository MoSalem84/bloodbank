<?php

namespace App\Http\Controllers\Api;

use App\Models\Token;
use App\Models\Client;
use App\Models\BloodType;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

//register

public function register (Request $request){

        $validation = validator()->make($request->all(),[

            'name' => ['required', 'string', 'max:255'],
            'city_id' => ['required'],
            'phone' => ['required', 'string'],
            'last_donation_date'=>'required',
            'blood_type_id'=>'required',
            'password' => ['required', 'string','confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],

        ]);

        if ($validation->fails()){
            return responseJson(0 , 'validation error' , $validation->errors()) ;
        }
        $client = Client::create($request->all());
        $client->password = Hash::make($request->password) ;
        $client->api_token = Str::random(60) ;
        $client->save() ;
        return responseJson(1 , 'client is added successfully' , [

            'api_token'=>$client->api_token ,
            'client' =>$client
        ]);
    }

    //end register


    //login

public function login (Request $request){

        $validation = validator()->make($request->all(),[

            'phone' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if ($validation->fails()){
            return responseJson(0 , 'validation error' , $validation->errors()) ;
        }

// $auth =   auth()->guard('api')->validate($request->all());
// return responseJson(1 , 'hi' , $auth) ;

$client = Client::where('phone' , $request->phone)->first() ;

if ($client){

    if(Hash::check($request->password,$client->password)){
        return responseJson(1 , 'login success' ,[
            'api_token' =>$client->api_token ,
            'client' => $client
        ]);


    } else{

        return responseJson(0 , 'login credentials is incorrect !');

    };

}else{
    return responseJson(0 , 'login credentials is incorrect !');

}
    }

    //end login

// reset password
public function passwordReset(Request $request)
{

    $validation = validator()->make($request->all(),[

        'phone' => ['required', 'string'],

    ]);
    
    if ($validation->fails()){
        return responseJson(0 , 'validation error' , $validation->errors()) ;
    }


$user = Client::where('phone' , $request->phone)->first() ;

if($user){

$code = rand(1111,9999) ;
$update = $user->update(['pin_code'=>$code]) ;

if($update){

    //send mail
    Mail::to($user->email)
    ->bcc("bloodbanksalem@gmail.com")
    ->send(new ResetPassword($user));

    return responseJson(1, 'برجاء فحص هاتفك' ,[
        'pin_code_for_test' =>$code
    ]);
}else{

return responseJson( 0 , 'حدث خطا برجاء المحاوله مره اخري') ;
}
}else{

    return responseJson( 0 , 'لا يوجد حساب مرتبط بهذا الهاتف') ;
}
}

// end reset password

//new Password
public function newPassword (Request $request)

{
    $validation = validator()->make($request->all(),[

        'phone' => ['required', 'string'],
        'pin_code' => 'required',
        'password'=>'required |confirmed'

    ]);
    if ($validation->fails()){
        return responseJson(0 , 'validation error' , $validation->errors()) ;
    }

$user = Client::where('pin_code' , $request->pin_code)->where('pin_code' , '!=' , 0)
->where('phone' , $request->phone)->first() ;

if($user){

$user->password = bcrypt($request->password) ;
$user->pin_code = null ;

if($user->save())
{

return responseJson(1 , 'تم تغيير الباسورد بنجاح');
}else {

    return responseJson(0 , 'برجاء المحاولة مرة اخري');
}
}else{

    return responseJson(0 , 'هذا الكود غير صالح');
}

}

//end new Password

//--------profile--------

public function profile (Request $request){

    $validation = validator()->make($request->all(),[

        'name'      => Rule::unique('clients')->ignore($request->user()->id),
        'email'     => Rule::unique('clients')->ignore($request->user()->id),
        'phone'     => Rule::unique('clients')->ignore($request->user()->id),
        'password'  => ['confirmed'],


    ]);

    if ($validation->fails()){
        $data = $validation->errors() ;
        return responseJson(0 , $validation->errors()->first() , $data) ;
    }

$loginUser =$request->user();

$loginUser->update ($request->all());

if($request->has('password'))

{
    $loginUser->password = bcrypt($request->password) ;
}

$loginUser->save() ;

return responseJson(1 , 'تم حفظ البيانات بنجاح' ,$loginUser)  ;
}

//------end profile------


//------show  notification settings------

public function showNotitficationSettings(Request $request){

    $loginUser = $request->user() ;
    $selected_bloodTypes =  $loginUser->bloodType->pluck('name');
    $selected_governorate = $request->user()->Governorate->pluck('name');
return responseJson(1 , 'success' , [

'selected_governorate'=>$selected_governorate,
'selected_bloodTypes'=>$selected_bloodTypes
]);
}

//------edit  notification settings------

public function editNotitficationSettings(Request $request){

    $validation = validator()->make($request->all(),[

        'blood_type_id' => 'required', 'array',
        'blood_type_id.*' => 'required', 'exists:blood_types,id','string',
        'governorate_id' => 'required', 'array',
        'governorate_id.*' => 'required', 'exists:governorates,id','string',


]);

if ($validation->fails()){
    $data = $validation->errors() ;
    return responseJson(0 , $validation->errors()->first() , $data) ;
}

    if($request->has('blood_type_id')){

        $blood_id = $request->blood_type_id ;

        // dd( $blood_id );


      $update_blood_type =  $request->user()->bloodType()->sync($blood_id);
    }

    if($request->has('governorate_id')){

        $governorate_id = $request->governorate_id ;

      $update_governorate =  $request->user()->Governorate()->sync($governorate_id);
    }

    return responseJson(1, 'تم تحديث البيانات بنجاح'  ,[$update_governorate, $update_blood_type] );

}

//------register new token------

public function registerToken(Request $request){

$validation = validator()->make($request->all(),[

    'token' => 'required' ,
    'platform' => 'required|in:android,ios'
]);

if ($validation->fails()){
    $data = $validation->errors() ;
    return responseJson(0 , $validation->errors()->first() , $data) ;
}

Token::where('token' , $request->token)->delete() ;
$request->user()->tokens()->create($request->all()) ;

return responseJson(1, 'تم التسجيل بنجاح');

}

//------remove token------

public function removeToken(Request $request){

    $validation = validator()->make($request->all(),[

        'token' => 'required' ,
    ]);

    if ($validation->fails()){
        $data = $validation->errors() ;
        return responseJson(0 , $validation->errors()->first() , $data) ;
    }

    Token::where('token' , $request->token)->delete() ;

    return responseJson(1, 'تم الحذف بنجاح');

    }
















}
