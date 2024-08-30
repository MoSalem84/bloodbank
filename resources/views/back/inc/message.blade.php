{{-- error message --}}

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" p-1 my-1>{{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

        </div>
    @endforeach
@endif

{{-- add success message --}}

@if (session('success') != null)
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{ session('success') }}
    </div>
@endif

{{-- delete success message --}}
@if (session('deleted') != null)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{ session('deleted') }}
    </div>
@endif


{{-- admin success register  --}}
@if (session('adminSuccessRegister'))
    <div class="alert alert-success"><strong>{{ session('adminSuccessRegister') }}</strong></div>
@endif

{{-- admin key incorrect --}}

@if (session('KeyIncorrectResponse'))
    <div class="alert alert-danger"><strong>{{ session('KeyIncorrectResponse') }}</strong></div>
@endif

{{-- admin login incorrect --}}

@if (session('AdminLoginError'))
    <div class="alert alert-danger"><strong>{{ session('AdminLoginError') }}</strong></div>
@endif


{{-- already Approved --}}

@if (session('alreadyApproved'))

    <div class="alert alert-danger"><strong>{{ session('alreadyApproved') }}</strong></div>
@endif

{{-- reject borrow  --}}

@if (session('rejectBorrow'))

    <div class="alert alert-danger"><strong>{{ session('rejectBorrow') }}</strong></div>
@endif
