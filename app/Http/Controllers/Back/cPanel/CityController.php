<?php

namespace App\Http\Controllers\back\cpanel;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::paginate(10);
        return view('back.admin.cpanel.sections.main-panel.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $governorates = Governorate::select('id' , 'name')->get() ;
        return view('back.admin.cpanel.sections.main-panel.cities.create', compact('governorates' , 'cities'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => ['required', 'unique:cities,name', 'string', 'min:3', 'max:30']
        ]);

        $governorate = Governorate::find(request('governorate'));


        $cities = new City;

        $cities->name = $request->name ;
        $cities->governorate_id        =  $governorate->id;
        $cities->governorates_name    = $governorate->name;
        $cities->save() ;


        return redirect('admin/cpanel/cities')->with('success', "تم اضافة المدينة");

    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('back.admin.cpanel.sections.main-panel.cities.edit' ,['city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([

            'name' => ['required', 'unique:cities,name', 'string', 'min:3', 'max:30']
            ]);

            $city->name = $request->name;
            $city->save();

            return redirect('admin/cpanel/cities')->with('success', "تم تعديل المدينة");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect('admin/cpanel/cities')->with('deleted' , "تم حذف المدينة") ;
    }
}
