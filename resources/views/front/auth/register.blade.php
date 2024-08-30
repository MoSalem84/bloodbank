@extends('front.layout.app')

@section('content')

    <title> تسجيل مستخدمين | بنك الدم</title>
    <body class="create">

    <!--form-->

    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form method="POST" action="{{ route('client.registerstore') }}">
                    @csrf
                    <input type="text" class="form-control"  aria-describedby="emailHelp"
                        placeholder="الإسم" name="name">

                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="البريد الإلكترونى" name="email">

                    <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')"
                        id="date" name="d_o_b">

                      {{-- فصيلة الدم --}}

                      <select class="form-control" id="bloodtypes" name="blood_type_id">

                        <option selected disabled hidden value="">اختر فصيلة الدم</option>
                        @foreach ($bloodtypes as $bloodtype)
                            <option value="{{ $bloodtype->id }}">{{ $bloodtype->name }}</option>
                        @endforeach
                    </select>

                    {{-- المحافظات --}}
                    <select class="form-control" id="governorates" name="governorates">

                        <option selected disabled hidden value="">اختر المحافظة</option>
                        @foreach ($governorates as $governorate)
                            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                        @endforeach
                    </select>

                    {{-- المدن --}}

                    <select class="form-control" id="cities" name="city_id">
                        <option selected disabled hidden value="">اختر المدينة</option>
                        <option value=""></option>
                    </select>

                    <input type="text" class="form-control"  aria-describedby="emailHelp"
                        placeholder="رقم الهاتف" name="phone">

                    <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')"
                        id="date" name="last_donation_date">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور"  name="password">

                    <input type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="تأكيد كلمة المرور" name="password_confirmation">

                    <div class="create-btn">
                        <input type="submit" value="إنشاء"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </body>
@endsection


{{-- to choose cities based on governotares  --}}
@push('scripts')
    <script>

        // when event change in id governorates
        $("#governorates").change(function(e) {

            //alert('test') ;
            e.preventDefault();

            //get gov
            var governorate_id = $("#governorates").val();

            //check if there gove before send request to server
            if (governorate_id) {

                console.log(governorate_id);

                $.ajax({
                    url  : '{{ url("api/v1/cities?governorate_id=") }}'+governorate_id,
                    type : 'get',
                    success: function(data) {
                        if (data.status == 1)
                        {
                            $("#cities").empty() ;
                            $("#cities").append('<option value= ""> اختر مدينة </option>');
                            $.each(data.data , function (index , city){
                                $("#cities").append('<option value= "'+city.id+'">'+city.name+'</option>');
                            });
                        }
                    },
                    error:function ( jqXhr, textStatus , errorMessage){
                            alert(errorMessage);
                    }
                });


            }
            //if no gov choosen
            else{
                $("#cities").empty() ;
                $("#cities").append('<option value= ""> اختر مدينة </option>');
            }
        });
    </script>
@endpush
