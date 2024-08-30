@extends('back.admin.cpanel.layout.app')
<title> رتب المديرين </title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1> رتب المديرين </h1>
                <a href="{{ route('admin.cpanel.roles.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
                    اضافه رتبة جديدة
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم الرتبة</th>
                                <th class="text-center">صلاحيات الرتبة</th>
                                <th class="text-center"> تعديل الرتبة / تعديل صلاحيات الرتبة </th>
                                <th class="text-center"> حذف الرتبة </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.cpanel.roles.show', $role->id) }}"
                                            class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/cpanel/roles/' . $role->id . '/edit') }}"
                                            class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                    </td>

                                    <td class="text-center">

                                        <form action="{{ url('admin/cpanel/roles/' . $role->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash"></i></button>
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
    </div>
    </div>
@endsection
