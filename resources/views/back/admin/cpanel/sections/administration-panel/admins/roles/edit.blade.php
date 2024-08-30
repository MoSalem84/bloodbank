@extends('back.admin.cpanel.layout.app')
<title> تعديل الرتب </title>

@section('content')
    <div> @include('back.inc.message')</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['admin.cpanel.roles.update', $role->id]]) !!}
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mg-b-20">
                                <div class="card-body">
                                    <div class="main-content-label mg-b-5">
                                        <div class="form-group">
                                            <p>تعديل اسم الرتبة :</p>
                                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-lg-4">
                                            <ul id="treeview1">
                                                <li>
                                                    <p>تعديل صلاحيات الرتبة :</p>
                                                    <ul>
                                                        <li>
                                                            @foreach ($permission as $value)
                                                                <label>{{ Form::checkbox('permission[]', $value->name, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                                    {{ $value->name }}</label>
                                                                <br />
                                                            @endforeach
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button class="btn btn-primary" type="submit">تحديث</button>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row closed -->
                </div>
                <!-- Container closed -->
            </div>
            <!-- main-content closed -->

            {!! Form::close() !!}
        @endsection
