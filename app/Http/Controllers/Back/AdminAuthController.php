<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {

        return view('back.admin.auth.login');
    }


    public function checkLogin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);


        if (Auth::guard('web')->attempt(
            [
                'phone' => $request->phone,
                'password' => $request->password
            ],
            $request->remember
        )) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.cpanel.home'));
        } else {
            return redirect()->intended(route('admin.login'));
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


public function logout(){

    Auth::guard('web')->logout();
    return redirect()->route('admin.login');
}

}
