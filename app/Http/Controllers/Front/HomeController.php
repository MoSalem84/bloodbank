<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(Request $request)
    {

        $posts = Post::take(9)->get();
        $bloodtypes=BloodType::all();
        $cities=City::all();

        $donationRequests = DonationRequest::whereHas('bloodType',
        function ($query)use($request) {
           $query->where('blood_type_id',  $request->blood_type_id);
       })->get();
       //$view = view('front.home')->render();

        return view('front.home' , compact('posts' , 'bloodtypes' , 'cities' , 'donationRequests'));
    }

public function postFavourite(Request $request){


    $postFavourite = $request->user()->postFavourite()->toggle($request->post_id);


    return responseJson(1 ,'success' , $postFavourite);
}


public function donationRequests(Request $request)
{

    $bloodtypes=BloodType::all();
    $cities=City::all();
    // $donationRequests = DonationRequest::all() ;

    $donationRequests = DonationRequest::where(
     function ($query)use($request) {
        $query->where('blood_type_id',  $request->blood_type_id);
    })->paginate(10);



    // $donationRequests = DonationRequest::whereHas('bloodType',
    //  function ($query)use($request) {
    //     $query->where('blood_type_id',  $request->blood_type_id);
    // })->get();



    return view('front.donation-requests'  , compact('bloodtypes' , 'cities' , 'donationRequests')
);
}
// public function donationRequestsStore(Request $request)
// {

//     $bloodtypes=BloodType::all();
//     $cities=City::all();
//     $donationRequests = DonationRequest::all() ;

//     $donationRequests = DonationRequest::whereHas('bloodType', function ($query)use($request) {
//         $query->where('blood_type_id',  $request->blood_type_id);
//     })->get();


//     return view('front.donation-requests'  , compact('bloodtypes' , 'cities' , 'donationRequests')
// );
// }

// public function donationRequestsShow(Request $request)
// {

//     $rules = [

//         'blood_type_id'=>'required|exists:blood_types,id',
//         'city_id'=>'required|exists:cities,id',

//         ];

//     $bloodtypes=BloodType::all();
//     $cities=City::all();

//        $donationRequests = DonationRequest::whereHas('bloodType', function ($query)use($request) {
//         $query->where('blood_type_id',  $request->blood_type_id);
//     })->get();

//     return view('front.donation-requests' , compact('donationRequests','bloodtypes' , 'cities'));
// }


}
