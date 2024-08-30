@extends('back.admin.cpanel.layout.app')
<title> اضافه رتبة جديدة</title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1> اضافه رتبة جديدة </h1>
<br>
                <a href="{{ route('admin.cpanel.roles.index') }}" class="btn btn-success"><i class="fa fa-eye"></i>
                    مشاهدة رتب المديرين
                </a>

<br><br>
                {!! Form::open(array('route' => 'admin.cpanel.roles.store','method'=>'POST')) !!}
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mg-b-20">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    <div class="col-xs-7 col-sm-7 col-md-7">
                                        <div class="form-group">
                                            <p>اسم الرتبة :</p>
                                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-lg-4">
                                        <ul id="treeview1">
                                            <li><a href="#">الصلاحيات</a>
                                                <ul>
                                            </li>
                                            @foreach($permission as $value)

                                            <label
                                                style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->name, false, array('class' => 'name')) }}
                                                {{ $value->name }}
                                            </label>

                                            @endforeach
                                            </li>

                                        </ul>
                                        </li>
                                        </ul>
                                    </div>
                                    <!-- /col -->
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button class="btn btn-primary" type="submit">تاكيد</button>
                                    </div>

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

 </div>
        </div>
    </div>
@endsection
