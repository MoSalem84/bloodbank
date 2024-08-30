@extends('back.admin.cpanel.layout.app')

<title>اضافه المقالات</title>
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

  @include('back.inc.message')
                <h1> اضافه مقال
                </h1>
                <form action="{{route('admin.cpanel.posts.index')}}" method="POST" class="div_center">
                    @csrf

                    <div class="form-group">
                        <label for="title">عنوان المقال</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder= " ادخل عنوان المقال ">
                    </div>


                    <div class="form-group">
                        <label for="content">نص المقال</label>
                        <textarea name="content" id="content" cols="100" rows="5" placeholder="ادخل نص المقال"></textarea>

                    </div>

                    <div class="form-group">
                        <label for="">القسم</label>
                            <select name="category">
                            @foreach ( $categories as $category)
                            <option value={{ $category->id }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                             </select>
                      </div>
                      
                     <div class="form-group">
                        <label for="image">الصورة المرفقة</label>
                        <input type="file" class="form-control" name="image" id="image">
                      </div>

                    <button class="btn btn-primary" type="submit">اضافه</button>

                </form>
        </div>
    </div>


@endsection
