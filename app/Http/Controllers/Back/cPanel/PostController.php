<?php

namespace App\Http\Controllers\back\cpanel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('back.admin.cpanel.sections.main-panel.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::select('id' , 'name')->get();

        return view('back.admin.cpanel.sections.main-panel.posts.create' , compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([

            'title'    =>['required' ,'string' , 'min:2' , 'max:30' ] ,
            'content' =>['string' , 'max:1000'] ,
            'image'    =>['nullable' ,'image' ,'mimes:png,jpg,jpeg,gif,webp'],
        ]);

        $Category = Category::find(request('category'));

        $posts = New Post ; 

        $posts->title = $request->title ;
        $posts->content = $request->content;
        $posts->category_id      =  $Category->id;
        $posts-> save();

        return redirect('admin/cpanel/posts')->with('success', "تم اضافة المقال");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        $categories = Category::select('id' , 'name')->get() ;


        return view('back.admin.cpanel.sections.main-panel.posts.edit' ,compact('post' , 'categories' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([

            'title'    =>['required' ,'string' , 'min:2' , 'max:30' ] ,
            'content' =>['string' , 'max:1000'] ,
            'image'    =>['nullable' ,'image' ,'mimes:png,jpg,jpeg,gif,webp'],
        ]);

    
        $Category = Category::find(request('category'));

        $post->title            = $request->title ;
        $post->content          = $request->content;
        $post->category_id      =  $Category->id;

        $post-> save();
    
            return redirect('admin/cpanel/posts')->with('success', "تم تعديل المقال");    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('admin/cpanel/posts')->with('deleted' , "تم حذف المقال") ;

    }
}
