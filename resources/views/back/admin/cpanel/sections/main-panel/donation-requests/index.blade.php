@extends('back.admin.cpanel.layout.app')
<title>  طلبات التبرع </title>

@section('content')
    <div>
        @include('back.inc.message')

    </div>

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1> طلبات التبرع  </h1>

<a href="{{ route('admin.cpanel.donation-requests.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>
    اضافه طلب تبرع جديد
</a>

<div class="table-responsive">
<table class="table table-bordered">

<thead>
    <tr>
        <th>#</th>
        <th>اسم المريض المحتاج </th>
        <th>رقم هاتف المريض</th>
        <th> عمر المريض</th>
        <th>  اسم المتبرع   </th>
        <th> اسم المستشفي</th>
        <th> عنوان المستشفي </th>
        <th>  فصيلة الدم </th>
        <th> المدينة  </th>
        <th>  عدد اكياس الدم </th>
        <th>  تفاصيل الطلب   </th>


        <th class="text-center">تعديل</th>
        <th class="text-center">حذف</th>
    </tr>
</thead>

<tbody>

    @foreach ($DonationRequests as $DonationRequest )


    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $DonationRequest->patient_name }}</td>
      <td>{{ $DonationRequest->patient_phone  }}</td>
      <td>{{ $DonationRequest->patient_age }}</td>
      <td>{{ $DonationRequest->patient_name  }}</td>
      <td>{{ $DonationRequest->hospital_name }}</td>
      <td>{{ $DonationRequest->hospital_address }}</td>
      <td>{{ $DonationRequest->name }}</td>
      <td>{{ $city->name }}</td>
      <td>{{ $DonationRequest->bags_num  }}</td>
      <td>{{ $DonationRequest->details  }}</td>

      <td class="text-center">
    <a href="{{ url('admin/cpanel/categories/'.$DonationRequest->id.'/edit')}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>
    </a>
    </td>

      <td class="text-center">
        <form action="{{ url('admin/cpanel/categories/' . $DonationRequest->id) }}" method="POST">
            @method('DELETE')
            @csrf
           <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
        </form>
      </td>
    </tr>
    @endforeach

</tbody>


</table>


</div>

            </div>
        </div>
    </div>
@endsection
