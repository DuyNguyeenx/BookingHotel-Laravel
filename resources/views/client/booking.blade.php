@extends('templates.layout')
@section('content')
<div class="container mb-5">
        <h2>Book a Room</h2>
        <hr>
        <form action="{{ route('client.booking')}}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                      <h4 class="form-label mb-2">Phòng: {{$room->name}}</h4>
                      <h5 class="mb-2">Giá tiền: {{$formattedAmount}} / đêm</h5>
                      <h5 class="mb-2">Loại phòng: {{$room->type->name}}</h5>
                      <img src="{{ $room->image?''.Storage::url($room->image):''}}" alt="" style="width: 600px">
                      <input type="text" hidden name="room_id" value="{{$room->id}}">
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label class="form-label">Check-In Date (Ngày nhận phòng)</label>
                            <input type="date" class="form-control" name="start_date" required>
                          </div>
                          <div class="mb-3 ">
                            <label for="checkout" class="form-label">Check-Out Date (Ngày trả phòng)</label>
                            <input type="date" class="form-control" name="end_date" required>
                          </div>
                    </div>
                </div>

            </div>

            <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-3">Thông tin cá nhân</h3>
                    <div class="mb-3">
                        <label class="form-label">FullName (Họ và tên)</label>
                        <input type="text" class="form-control" required name="name">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" required name="email">
                      </div>
                      <div class="mb-3">
                        <label class="form-label mr">Gender (Giới tính)</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="Nam" name="gender">
                            <label class="form-check-label">Boy (Nam)</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Nữ">
                            <label class="form-check-label">Girl (Nữ)</label>
                          </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Quốc gia</label>
                        <input type="text" class="form-control" required name="nation">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Phone (Số điện thoại)</label>
                        <input type="tel" class="form-control" name="phone" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Yêu cầu thêm</label>
                        <textarea cols="60" rows="3" class="form-control border border-gray-800" name="request_add"></textarea>
                      </div>
                    </div>


                  <div class="col-md-6">
                    <h3 class="mb-2">Đảm bảo đặt phòng</h3>
                    <h5 class="mb-2">Không thanh toán trực tuyến.</h5>
                    <p>Thông tin thẻ tín dụng của quý khách chỉ được sử dụng nhằm đảm bảo việc đặt phòng. Số tiền thanh toán sẽ được thực hiện tại khách sạn. Hệ thống đặt phòng của chúng tôi luôn được bảo mật.</p>
                    <div class="mb-3">
                        <label class="form-label">Số thẻ</label>
                        <input type="text" class="form-control" required name="card_number">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Tên chủ thẻ thẻ</label>
                        <input type="text" class="form-control" required name="card_name">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Ngày hết hạn</label>
                        <input type="date" class="form-control" required name="card_date">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Mã bảo mật</label>
                        <input type="text" class="form-control" required name="card_code">
                      </div>
                  </div>
              </div>
         </div>
<h4 class="mt-2">
    Đặt phòng này không thể bị hủy bỏ hoặc sửa đổi.
Nếu quý khách không đến, phí phạt là 100% sẽ được áp dụng.
</h4>
          <div class="text-center mt-3">
            <button type="reset" class="btn btn-danger mr-3">Reset</button>
          <button class="btn btn-primary" type="submit">Book Now</button>
          </div>
        </form>

  </div>
@endsection
