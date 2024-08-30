<?php

namespace App\Http\Controllers\Front;

use App\Models\client;
use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ClientAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {

        return view('front.auth.login');
    }

    public function checklogin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('client')->attempt(
            [
                'phone' => $request->phone,
                'password' => $request->password
            ],
            $request->remember
        )) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('home'));
        } else {
            return redirect()->intended(route('client.login'));
        }
    }

    public function username()
    {
        $value = request()->input('phone');

        if (preg_match("/^01[0125][0-9]{8}$/", $value)) {

            request()->merge(['phone' => $value]);
            return "phone";
        }
    }
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('auth')->only('logout');
    // }


    public function register()
    {

        $governorates=Governorate::all();
        $bloodtypes=BloodType::all();
       return view('front.auth.register' , compact('governorates' , 'bloodtypes'));

    }

    public function store (Request $request){

        $validation = validator()->make($request->all(),[

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'city_id' => ['required'],
            'phone' => ['required', 'string' , 'unique:clients'],
            'last_donation_date'=>'required',
            'blood_type_id'=>['required'],
            'password' => ['required', 'string','confirmed'],
            'password_confirmation' => ['required', 'string'],
            'd_o_b ' => ['required'],
        ]);

$data = $request->except(['password_confirmation']);
$data['password'] = Hash::make($data['password']);
Client::create($data);


return redirect()->route('client.login')->with('success', 'تم تسجيل المدير بنجاح');


    }

    public function logout(){

        Auth::guard('client')->logout();
        return redirect()->route('home');
    }


}
