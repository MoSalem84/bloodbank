@extends('back.admin.cpanel.layout.app')

<title>اضافه المحافظات</title>
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

  @include('back.inc.message')
                <h1> اضافه المحافظات
                </h1>
                <form action="{{route('admin.cpanel.governorates.index')}}" method="POST" class="div_center">
                    @csrf

                    <div class="form-group">
                        <label for="name">اسم المحافظه</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder= " ادخل اسم المحافظة ">
                    </div>

                    <button class="btn btn-primary" type="submit">اضافه</button>

                </form>
        </div>
    </div>


@endsection
