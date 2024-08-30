@extends('back.admin.cpanel.layout.app')

<title>اضافه المدن</title>
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

  @include('back.inc.message')
                <h1> اضافه المدن
                </h1>
                <form action="{{route('admin.cpanel.cities.index')}}" method="POST" class="div_center">
                    @csrf

                    <div class="form-group">
                        <label for="name">اسم المدينة</label>
                        <input type="text" class="form-control" name="name" id="name"  placeholder= " ادخل اسم المدينة ">
                    </div>

                    <div class="form-group">
                        <label for="name">اسم المحافظة</label>
                        <div class="form-group">
                            <select name="governorate">
                            @foreach ( $governorates as $governorate)
                            <option value={{ $governorate->id }}>
                                {{ $governorate->name }}
                            </option>
                            @endforeach
                            </select>
                          </div>
                    </div>

                    <button class="btn btn-primary" type="submit">اضافه</button>

                </form>
        </div>
    </div>


@endsection
