@extends('back.admin.cpanel.layout.app')

<title>اضافه اقسام المقالات </title>
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

  @include('back.inc.message')
                <h1> اضافه اقسام المقالات 

                </h1>
                <form action="{{route('admin.cpanel.categories.index')}}" method="POST" class="div_center">
                    @csrf

                    <div class="form-group">
                        <label for="name">اسم القسم</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder= " ادخل اسم القسم ">
                    </div>

                    <button class="btn btn-primary" type="submit">اضافه</button>

                </form>
        </div>
    </div>


@endsection
