@extends('front.layout.app')

@section('content')
    <title>بنك الدم</title>

    <!--intro-->
    <div class="intro">
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-1 active">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي
                                أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص.
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-2">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي
                                أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي للنص.
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-3">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي
                                أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                الشكل الخارجي.
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--about-->
    <div class="about">
        <div class="container">
            <div class="col-lg-6 text-center">
                <p>
                    <span>بنك الدم</span>
                    {{ $settings->about_app }}
                </p>
            </div>
        </div>
    </div>

    <!--المقالات-->
    <div class="articles">
        <div class="container title">
            <div class="head-text">
                <h2>المقالات</h2>
            </div>
        </div>
        <div class="view">
            <div class="container">
                <div class="row">
                    <div class="owl-carousel articles-carousel">
                        {{-- owl-carousel --}}
                        @foreach ($posts as $post)
                            <div class="card">
                                <div class="photo">
                                    <img class="card-img-top" src="{{ asset('front') }}/assets/imgs/p2.jpg" alt="...">
                                </div>
                                <a href="#" class="favourite">
                                    <i id="{{ $post->id }}" onclick="postFavourite(this)"
                                        class="fab fa-gratipay
                                    {{ $post->postFavorite ? 'second-heart' : 'first-heart' }}"></i>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"> {{ $post->title }} </h5>
                                    <p class="card-text"> {{ $post->content }} </p>
                                </div>
                                <button class="btn btn-danger" a href="{{ url('post/' . $post->id) }}"> المزيد
                                    </a></button>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--نهائه المقالات-->


    <!--requests-->
    <div class="requests">
        <div class="container">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form class="row filter">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                {{-- فصيلة الدم --}}
                                <select class="form-control" id="bloodtypes" name="blood_type_id">

                                    <option selected disabled hidden value="">اختر فصيلة الدم</option>
                                    @foreach ($bloodtypes as $bloodtype)
                                        <option value="{{ $bloodtype->id }}">{{ $bloodtype->name }}</option>
                                    @endforeach
                                </select>

                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                {{--  المدن --}}
                                <select class="form-control" id="cities" name="city_id">

                                    <option selected disabled hidden value="">اختر المدينة</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div class="patients">

                        @foreach ($donationRequests as $donationRequest)
                            <div class="details">
                                <div class="blood-type">
                                    <h2 dir="ltr">{{ $donationRequest->bloodType->name }}</h2>
                                </div>
                                <ul>
                                    <li><span>اسم الحالة:</span> {{ $donationRequest->patient_name }} </li>
                                    <li><span>مستشفى:</span> {{ $donationRequest->hospital_name }} </li>
                                    <li><span>المدينة:</span> {{ $donationRequest->city->name }}</li>
                                </ul>
                                <a href="#">التفاصيل</a>
                            </div>
                        @endforeach
                    </div>
                </form>
                <div class="more">
                    <a href="{{ route('donation-requests') }}">المزيد</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function postFavourite(heart) {

            var post_id = heart.id;
            $.ajax({
                url: '{{ url(route('client.post-favourite')) }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    post_id: post_id
                },
                success: function(data) {

                    if (data.status == 1) {
                        // console.log(data);
                        var currentClass = $(heart).attr('class');
                        if (currentClass.include('first')) {
                            $(heart).removeClass('first-heart').addClass('second-heart');
                        } else {
                            $(heart).removeClass('second-heart').addClass('first-heart');
                        }

                    }

                },

                error: function(jqXhr, textStatus, errorMessage) {
                    alert(errorMessage);
                }

            });

        }
    </script>
@endpush
