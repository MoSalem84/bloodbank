@extends('back.admin.cpanel.layout.app')

@section('content')

<title> تعديل  اقسام المقالات   </title>
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

  @include('back.inc.message')
                <h1> تعديل  اقسام المقالات   </h1>

                <form action="{{ url('admin/cpanel/categories/'.$category->id) }}"
                    method="POST" class="div_center">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">  تعديل اسم القسم </label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" >
                    </div>

                    <button class="btn btn-primary" type="submit">تعديل</button>

                </form>
        </div>
    </div>
@endsection

