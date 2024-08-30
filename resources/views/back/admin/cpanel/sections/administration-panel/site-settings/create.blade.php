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

                        <form>


                        @endforeach
                            <!-- facebook input -->
                            <label class="form-label" for="form6Example3">رابط فيسبوك</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form6Example3" class="form-control" name="facebook"
                                />
                            </div>

                            <!-- instgram input -->
                            <label class="form-label" for="form6Example3">رابط انستجرام</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form6Example3" class="form-control" />
                            </div>

                            <!-- twitter input -->
                            <label class="form-label" for="form6Example4">رابط تويتر</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form6Example4" class="form-control" />
                            </div>

                            <!-- whatsapp input -->
                            <label class="form-label" for="form6Example6">رابط الواتس</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="number" id="form6Example6" class="form-control" />
                            </div>

                            <!-- Email input -->
                            <label class="form-label" for="form6Example5">الايميل</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="form6Example5" class="form-control" />
                            </div>

                            <!-- phone input -->
                            <label class="form-label" for="form6Example6">الهاتف</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="number" id="form6Example6" class="form-control" />
                            </div>

                            <!-- about input -->
                            <label class="form-label" for="form6Example7">عن التطبيق</label>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                            </div>

                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="button"
                                class="btn btn-primary btn-block mb-4">تعديل</button>
                        </form>
                    </table>


                </div>

            </div>
        </div>
    </div>
@endsection
