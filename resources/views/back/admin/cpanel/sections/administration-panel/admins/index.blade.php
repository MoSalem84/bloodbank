@extends('back.admin.cpanel.layout.app')
<title>  المديرين </title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>  المديرين </h1>
                <a href="{{ route('admin.cpanel.admins.create') }}"
                class="btn btn-success"><i class="fa fa-plus"></i>
                    اضافه  مدير جديد
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th class="text-center">اسم المدير</th>
                                <th class="text-center"> رتبة المدير </th>
                                <th class="text-center"> صلاحيات المدير </th>
                                <th class="text-center"> حالة المدير </th>
                                <th class="text-center">  معلومات عن المدير </th>
                                <th class="text-center">تعديل</th>
                                <th class="text-center">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>

                                     @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $RoleName )
                                            <label class="badge badge-Success mx-1">
                                                {{ $RoleName}}
                                            </label>
                                        @endforeach
                                    @endif
                                    </td>
                                    {{-- permissions --}}
                                    <td>

                                        @if (!empty($user->getAllPermissions()))
                                           @foreach ($user->getAllPermissions() as $Permission )
                                               <label class="badge badge-primary mx-1">
                                                 {{ $Permission->name}}
                                               </label>
                                           @endforeach
                                       @endif
                                       </td>

                                    <td>{{ $user->status }}</td>
                                    <td><i class="fa fa-eye"></i>
                                        {{ 'الايميل تاريخ التسجيل الرتبة الصلاحيات'}}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ url('admin/cpanel/admins/'.$user->id.'/edit') }}"
                                            class="btn btn-success btn-xs"><i class="fa fa-edit"></i>
                                        </a>
                                    </td>

                                    <td class="text-center">

                                        <form action="{{ url('admin/cpanel/admins/' . $user->id) }}" method="POST">
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

<div>{{ $users->links() }}</div>
                </div>




                </div>

            </div>

        </div>
    </div>
    </div>
@endsection
