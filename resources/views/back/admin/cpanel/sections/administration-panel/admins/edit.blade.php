@extends('back.admin.cpanel.layout.app')

<title> تعديل بيانات مدير </title>

@section('content')
    <div class="card-header">{{ __('تعديل بيانات مدير  ') }}</div>

    @include('back.inc.message')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['admin.cpanel.admins.update', $user->id]]) !!}

                        @csrf
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>اسم المستخدم: </label>
                            {!! Form::text('name', null, ['class' => 'form-control' ,'readonly']) !!}
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>الموبايل : <span class="tx-danger">*</span></label>
                            {!! Form::text('phone', null, ['class' => 'form-control' ]) !!}
                        </div>


                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <label class="form-label">حالة المستخدم</label>
                                <select name="Status" id="select-beast" class="form-control  ">
                                    <option @selected('status== مفعل') value="مفعل">مفعل</option>
                                    <option @selected('status== غير مفعل') value="غير مفعل">غير مفعل</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>رتبة المستخدم</strong>

                                    {{-- @if($user->$userRole->contains($userRole)) selected @endif --}}

                                    {!! Form::select('roles_name[]',
                                    $roles, $userRoles,
                                    ['class' => 'form-control','required' ,'multiple']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-primary" type="submit">تحديث</button>
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
