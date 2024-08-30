<?php

namespace App\Http\Controllers\back\cpanel;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\City;
use App\Models\BloodType;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DonationRequests = DonationRequest::paginate(10);
        $cities = City::select('id' , 'name')->get();
        $clients = Client::select('id' , 'name')->get();
        $bloodTypes = BloodType::select('id' , 'name')->get();

        return view('back.admin.cpanel.sections.main-panel.Donation-requests.index',
         compact('DonationRequests' , 'cities' , 'clients' , 'bloodTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonationRequest $donationRequest)
    {
        //
    }
}
