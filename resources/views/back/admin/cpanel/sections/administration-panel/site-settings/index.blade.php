@extends('back.admin.cpanel.layout.app')
<title>اعدادت الموقع</title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>اعدادت الموقع</h1>

                <div class="table-responsive">
                    <table class="table table-bordered">

                        <form action="{{route('admin.cpanel.site-settings')}}" method="POST">
                            @csrf
                            <!-- facebook input -->
                            <label class="form-label" for="form6Example3">رابط فيسبوك</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form6Example3" class="form-control"
                                name="fb_link"
                                value="{{ $record->fb_link}}"
                                />
                            </div>

                            <!-- instgram input -->
                            <label class="form-label" for="form6Example3">رابط انستجرام</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form6Example3" class="form-control"
                                    name="insta_link"
                                value="{{ $record->insta_link}}"/>
                            </div>

                            <!-- twitter input -->
                            <label class="form-label" for="form6Example4">رابط تويتر</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form6Example4" class="form-control" name="tw_link"
                                value="{{ $record->tw_link}}"/>
                            </div>

                             <!-- youtube input -->
                             <label class="form-label" for="form6Example4">رابط اليوتيوب </label>

                             <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" id="form6Example4" class="form-control" name="yt_link"
                                 value="{{ $record->yt_link}}"/>
                             </div>

                            <!-- whatsapp input -->
                            <label class="form-label" for="form6Example6">رابط الواتس</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="number" id="form6Example6" class="form-control"
                                name="wts_link"
                                value="{{ $record->wts_link}}"/>
                            </div>

                            <!-- Email input -->
                            <label class="form-label" for="form6Example5">الايميل</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input name="email" type="email" id="form6Example5" class="form-control"
                                 value="{{ $record->email}}"
                                />
                            </div>

                            <!-- phone input -->
                            <label class="form-label" for="form6Example6">الهاتف</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="number" id="form6Example6" class="form-control"
                                name="phone"
                                value="{{ $record->phone}}"/>
                            </div>

                            <!-- about input -->
                            <label class="form-label" for="form6Example7">عن التطبيق</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <textarea name="about_app" class="form-control" id="form6Example7"
                                rows="4"  value="{{ $record->about_app}}"></textarea>
                            </div>

                            <!-- Submit button -->

                                <button data-mdb-ripple-init type="submit"
                                class="btn btn-primary btn-block mb-4">  تعديل و حفظ   </button>                            </form>

                        </form>
                    </table>


                </div>

            </div>
        </div>
    </div>
@endsection
