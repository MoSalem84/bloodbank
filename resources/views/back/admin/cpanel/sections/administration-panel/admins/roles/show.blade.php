@extends('back.admin.cpanel.layout.app')
<title> صلاحيات رتب المديرين </title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>  صلاحيات رتب المديرين </h1>
                <div class="pull-right">

                <a href="{{ route('admin.cpanel.roles.edit', $role->id)}}" class="btn btn-success"><i class="fa fa-edit"></i>
                    تعديل الرتبة / تعديل صلاحيات الرتبة   </a>

                    <a class="btn btn-primary btn" href="{{ route('admin.cpanel.roles.index') }}">رجوع</a>
                </div>
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">

                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#">{{ $role->name }}</a>
                                <ul>
                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                    <li>{{ $v->name }}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /col -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->

            </div>

        </div>

    </div>
    </div>
    </div>
@endsection
