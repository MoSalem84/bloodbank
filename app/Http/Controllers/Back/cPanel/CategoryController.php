<?php

namespace App\Http\Controllers\back\cpanel;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::paginate(10);
        return view('back.admin.cpanel.sections.main-panel.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.admin.cpanel.sections.main-panel.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => ['required', 'unique:categories,name', 'string', 'min:3', 'max:30']
        ]);

        $categories =category::create($request->all());

        return redirect('admin/cpanel/categories')->with('success', "تم اضافة القسم");
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('back.admin.cpanel.sections.main-panel.categories.edit' ,
         ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([

            'name' => ['required', 'unique:categories,name', 'string', 'min:3', 'max:30']
            ]);
    
    
            $category->name = $request->name;
            $category->save();
    
            return redirect('admin/cpanel/categories')->with('success', "تم تعديل القسم");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect('admin/cpanel/categories')->with('deleted' , "تم حذف القسم") ;

    }
}
