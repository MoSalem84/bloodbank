@extends('back.admin.cpanel.layout.app')
<title>المقالات</title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>المقالات</h1>

<a href="{{ route('admin.cpanel.posts.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
    اضافه مقال جديد
</a>

<div class="table-responsive">
<table class="table table-bordered">

<thead>
    <tr>
        <th>#</th>
        <th>عنوان المقال</th>
        <th class="text-center">تعديل</th>
        <th class="text-center">حذف</th>
    </tr>
</thead>

<tbody>

    @foreach ($posts as $post)

    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $post->title }}</td>
      <td class="text-center">
    <a href="{{ url('admin/cpanel/posts/'.$post->id.'/edit')}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>
    </a>
    </td>

      <td class="text-center">
        <form action="{{ url('admin/cpanel/posts/' . $post->id) }}" method="POST">
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
