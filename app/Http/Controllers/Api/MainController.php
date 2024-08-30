<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\Post;
use App\Models\Token;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{

    //from helper file
public function governorates(){
    $governorates = Governorate::all() ;
    return responseJson(1 , 'success' , $governorates);
}

//------get cities------

public function cities( Request $request){

    $cities = City::where(function($query) use($request)
    {

        if ($request->has(key:'governorate_id'))
        {
            $query->where('governorate_id' , $request->governorate_id);

        }
    })->get() ;

    return responseJson(1 , 'success' , $cities);
}

//------get posts------

public function posts(){

    $posts = Post::with('Category')->paginate(10);
    return responseJson(1 , 'success' , $posts);
}

//------get posts favo------

public function postFavourite(Request $request){


$rules = [
    'post_id' => 'required | exists:posts,id'
];

$validator = validator()->make($request->all() , $rules) ;

if ($validator->fails()){
    return responseJson(0 , 'validation error' , $validator->errors()) ;
}

$toggle = $request->user()->postFavourite()->toggle($request->post_id) ;

return responseJson(1 , 'success' , $toggle) ;
}


public function showpostFavorite(Request $request){

    $posts = $request->user()->postFavourite()->latest()->paginate(20) ;
    return responseJson(1 , 'loaded...' , $posts);
}

//------create donation Requests ------
public function createDonationRequests(Request $request){

    $rules = [

'patient_name'=>'required' ,
'patient_age'=>'required:digits' ,
'blood_type_id'=>'required|exists:blood_types,id',
'bags_num'=> 'required:digits' ,
'hospital_address'=> 'required' ,
'city_id'=>'required|exists:cities,id',
'patient_phone'=> 'required:digits:11' ,

];

$validator = validator()->make($request->all() , $rules) ;

if($validator->fails()){
    return responseJson(0 , $validator->errors()->first() , $validator->errors()) ;
}

$donationRequest = $request->user()->DonationRequests()->create($request->all()) ;

return responseJson(1 , 'تم ارسال طلب التبرع' , $donationRequest) ;

}

//------send donation Requests ------

public function sendDonationRequests(Request $request){

$rules = [

    'patient_name'=>'required' ,
    'patient_age'=>'required:digits' ,
    'blood_type_id'=>'required|exists:blood_types,id',
    'bags_num'=> 'required:digits' ,
    'hospital_address'=> 'required' ,
    'city_id'=>'required|exists:cities,id',
    'patient_phone'=> 'required:digits:11' ,

    ];

    $validator = validator()->make($request->all() , $rules) ;

    if($validator->fails()){
        return responseJson(0 , $validator->errors()->first() , $validator->errors()) ;
    }

    $donationRequest = $request->user()->DonationRequests()->create($request->all()) ;

    //find ids of clients who will get notifications for donation Request
    $clientsIds = $donationRequest->city->Governorate->clients()->whereHas('bloodType',
    function($q)use($request){

        $q->where('blood_types.id' , $request->blood_type_id) ;

        })->pluck('clients.id')->toArray();

//if found clients match with donation request , create and send notificaions

if(count($clientsIds)){

    //1 - create notificaions
    $notification = $donationRequest->Notification()->create([

        'title' =>'توجد حاله تبرع قريبة منك',
        'content'=>$donationRequest->bloodType->name . ' محتاج الي متبرع لفصيلة' ,
    ]);

    //2 - send notification to all clients
    $notification->clients()->attach($clientsIds);

    //3 - get tokens of clients

    $tokens = Token::where('client_id' , $clientsIds)->where('token','!=' ,null)->pluck('token')->toArray() ;

    if($tokens){


        $title = $notification->title ;
        $body = $notification->content ;
        $data = [

            'dontaion_request_id' =>$donationRequest->id
        ];

        $send = notifyByFirebase($title , $body , $tokens , $data) ;

    }
    return responseJson(1 , 'تم ارسال طلب التبرع' , $send) ;

    }

    }



}




// $rules = [
//     'donation_requests_id.*' => 'required','exists:donation_requests,id',
//     ];

//     $validator = validator()->make($request->all() , $rules) ;

//     if($validator->fails()){
//         return responseJson(0 , $validator->errors()->first() , $validator->errors()) ;
//     }

//     $donationRequest = $request->user()->DonationRequests();


// //find ids of clients who will get notifications for donation Request
//     $clientsIds = $donationRequest->city->Governorate->clients()->whereHas('bloodType',
//     function($q)use($request){

//         $q->where('blood_types.id' , $request->blood_type_id) ;

//         })->pluck('clients.id')->toArray();







