@extends('front.layout.app')

@section('content')
    <title> طلبات التبرع</title>

    <!--requests-->
    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>طلبات التبرع</h2>
                </div>
                <div class="content">
                    <form class="row filter" >
                        @csrf
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    {{-- فصيلة الدم --}}
                                    <select class="form-control" id="bloodtypes" name="blood_type_id">
                                        <option selected disabled>اختر فصيلة الدم</option>
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

                                        <option selected disabled>اختر المدينة</option>
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

                </div>
                <div class="pages">
                    <nav aria-label="Page navigation example" dir="ltr">
                        <ul class="pagination">


                            {{-- <div> {{ $donationRequests->links() }}</div> --}}

                            {{-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li> --}}
                            {{-- <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li> --}}
                            {{-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
