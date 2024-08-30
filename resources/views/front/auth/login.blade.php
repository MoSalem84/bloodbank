@extends('front.layout.app')

@section('content')

    <title> دخول مستخدمين | بنك الدم</title>

    <body class="signin-account">

  <div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                </ol>
            </nav>
        </div>

          <!--form-->

        <div class="signin-form">
            <form method="POST" action="{{ route('client.checklogin') }}">
                @csrf
                <div class="logo">
                    <img src="{{ asset('front') }}/assets/imgs/logo.png">

                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف" name="phone">
                </div>


                 {{-- <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الايميل " name="email">
                </div> --}}

                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور" name="password">
                </div>
                <div class="row options">
                    <div class="col-md-6 remember">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                        </div>
                    </div>
                    <div class="col-md-6 forgot">
                        <img src="{{ asset('front') }}/assets/imgs/complain.png">

                        <a href="#">هل نسيت كلمة المرور</a>
                    </div>
                </div>
                <div class="row buttons">
                    <div class="col-md-6 right">
                        <button type="submit">  دخول </button>
                    </div>
                    <div class="col-md-6 left">
                        <a href="{{ route('client.register') }}">انشاء حساب جديد</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



    </body>
@endsection
