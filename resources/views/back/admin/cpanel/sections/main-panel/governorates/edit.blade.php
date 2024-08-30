@extends('back.admin.cpanel.layout.app')

@section('content')

<title>تعديل المحافظات</title>
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

  @include('back.inc.message')
                <h1> تعديل المحافظات </h1>

                <form action="{{url('admin/cpanel/governorates/'.$governorate->id) }}" method="POST" class="div_center">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">  تعديل اسم المحافظة </label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $governorate->name }}" >
                    </div>

                    <button class="btn btn-primary" type="submit">تعديل</button>

                </form>
        </div>
    </div>
@endsection

