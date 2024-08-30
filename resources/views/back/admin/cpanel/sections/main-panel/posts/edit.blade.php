@extends('back.admin.cpanel.layout.app')

@section('content')


<title>تعديل المقالات</title>
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

  @include('back.inc.message')
                <h1> تعديل المقالات </h1>

                <form action="{{ url('admin/cpanel/posts/'.$post->id) }}"

                    method="POST" class="div_center">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">  تعديل عنوان المقال </label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" >
                    </div>

                    <div class="form-group">
                        <label for="content">تعديل نص المقال</label>
                        <textarea name="content" id="content" cols="100" rows="5" >{{ $post->content }}</textarea>

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

                    <button class="btn btn-primary" type="submit">تعديل</button>

                </form>
        </div>
    </div>
@endsection

