@extends('back.admin.cpanel.layout.app')
<title>الاعدادات</title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>الاعدادات</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>  اسم الاعداد  </th>
                                        <th>  القيمة</th>
                                        <th> تعديل</th>
                                        <th> حذف </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $record)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @foreach ($columns as $column => $name)
                                      <td>{{ $name }}</td>  
                                        @endforeach

                                        <td>{{$record->about_app}}</td>
                                        <td>{{$record->phone}}</td>
                                        <td>{{$record->email}}</td>
                                    </tr>
                                     @endforeach

                                    <tr>
                                        <td>2</td>
                                        @foreach ($columns as $column => $name)
                                      <td>{{ $name }}</td>  
                                        @endforeach
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                 {{--    <tr>
                                        <td>3</td>
                                        <td>ig</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>whats</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>yt</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>about</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>phone</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>email</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr> --}}
                                </tbody>
                            </div>

                    </table>


                </div>

            </div>
        </div>
    </div>
@endsection
