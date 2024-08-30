<?php

namespace App\Http\Controllers\back\cPanel;

use App\Http\Controllers\Controller;
use App\Models\governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{

        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Governorate::paginate(10);
        return view('back.admin.cpanel.sections.main-panel.governorates.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.admin.cpanel.sections.main-panel.governorates.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => ['required', 'unique:governorates,name', 'string', 'min:3', 'max:30']
        ]);

        $records =governorate::create($request->all());

        return redirect('admin/cpanel/governorates')->with('success', "تم اضافة المحافظة");
    }

    /**
     * Display the specified resource.
     */
    public function show(governorate $governorate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(governorate $governorate)

    {
        return view('back.admin.cpanel.sections.main-panel.governorates.edit' ,
         ['governorate'=>$governorate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, governorate $governorate)
    {

        $request->validate([

        'name' => ['required', 'unique:governorates,name', 'string', 'min:3', 'max:30']
        ]);


        $governorate->name = $request->name;
        $governorate->save();

        return redirect('admin/cpanel/governorates')->with('success', "تم تعديل المحافظة");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(governorate $governorate)
    {

        $governorate->delete();
        return redirect('admin/cpanel/governorates')->with('deleted' , "تم حذف المحافظة") ;

    }
}
