@extends('back.admin.cpanel.layout.app')
<title> اقسام المقالات</title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1> اقسام المقالات</h1>

<a href="{{ route('admin.cpanel.categories.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
    اضافه قسم جديد
</a>

<div class="table-responsive">
<table class="table table-bordered">

<thead>
    <tr>
        <th>#</th>
        <th>اسم القسم</th>
        <th class="text-center">تعديل</th>
        <th class="text-center">حذف</th>
    </tr>
</thead>

<tbody>

    @foreach ($categories as $category)

    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $category->name }}</td>
      <td class="text-center">
    <a href="{{ url('admin/cpanel/categories/'.$category->id.'/edit')}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>
    </a>
    </td>

      <td class="text-center">
        <form action="{{ url('admin/cpanel/categories/' . $category->id) }}" method="POST">
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
