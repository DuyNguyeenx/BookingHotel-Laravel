@extends('templates.admin')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Danh sách đơn đặt phòng</h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">

                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">STT</th>
                    <td>{{ $bill->id }} </td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tên</th>
                    <td>{{ $bill->name }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Email</th>
                    <td>{{ $bill->email }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Số điện thoại</th>
                    <td>{{ $bill->phone }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Giới tính</th>
                    <td>{{ $bill->gender }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Quốc gia</th>
                    <td>{{ $bill->nation }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Yêu cầu đặc biệt</th>
                    <td>{{ $bill->request_add }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Phòng</th>
                    <td>{{ $bill->room->name }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Sô thẻ</th>
                    <td>{{ $bill->card_number }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tên thẻ</th>
                    <td>{{ $bill->card_name }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Ngày hết hạn</th>
                    <td>{{ $bill->card_date }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Mã thẻ</th>
                    <td>{{ $bill->card_code }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Ngày lấy phòng</th>
                    <td>{{ $bill->start_date }}</p></td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Ngày trả phòng</th>
                    <td>{{ $bill->end_date }}</td>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                    <td>{{$formattedAmount}}</td>
                </tr>
            </table>
            <a href="{{ route('bill.index') }}" class="btn btn-primary mt-3">Quay về</a>
          </div>
        </div>
      </div>
@endsection
