@extends('back.admin.cpanel.layout.app')
<title>المدن</title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>المدن</h1>

<a href="{{ route('admin.cpanel.cities.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
    اضافه مدينة جديدة
</a>

<div class="table-responsive">
<table class="table table-bordered">

<thead>
    <tr>
        <th>#</th>
        <th>اسم المدينة</th>
        <th>اسم المحافظة</th>
        <th class="text-center">تعديل</th>
        <th class="text-center">حذف</th>
    </tr>
</thead>

<tbody>

    @foreach ($cities as $city)

    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $city->name }}</td>
      <td>{{ $city->governorates_name }}</td>
      <td class="text-center">
    <a href="{{ url('admin/cpanel/cities/'.$city->id.'/edit')}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>
    </a>
    </td>

      <td class="text-center">

        <form action="{{ url('admin/cpanel/cities/' . $city->id) }}" method="POST">
            @method('DELETE')
            @csrf
           <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
        </form>

      </td>

    </tr>

    @endforeach
</tbody>


</table>


</div>

            </div>
        </div>
    </div>
@endsection
