@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form thêm phòng</h6>
</div>
<form action="{{ route('room.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="mt-3 ">
        <label class="form-label">Tên loại phòng</label>
        <input type="text" class="form-control border border-dark w-50" name="name">
      </div>
      <div class="form-group mt-3">
        <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
        <div class="col-md-9 col-sm-8">
            <div class="row">
                <div class="col-xs-6">
                    <input type="file" name="image" accept="image/*"
                           class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                </div>
            </div>
        </div>
</div>
<div class="mt-3 ">
    <label class="form-label">Sức chứa</label>
    <input type="text" class="form-control border border-dark w-50" name="capacity">
  </div>
  <div class="mt-3 ">
    <label class="form-label">Dịch vụ</label>
    <input type="text" class="form-control border border-dark w-50" name="services">
  </div>
<div class="mt-3 ">
    <label class="form-label">Mô tả</label>
    <textarea cols="30" rows="10" class="form-control border border-dark w-50" name="description"></textarea>
  </div>
  <div class="mt-3 ">
    <label class="form-label">Giá/1 Đêm</label>
    <input type="text" class="form-control border border-dark w-50" name="price">
  </div>
  <div class="mt-3">
    <label class="form-label">Loại Phòng</label>
    <select class="form-select mt-3 w-50" name="type_id">
        @foreach ($type_room as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
      </select>
  </div>
  {{-- <div class="mt-3">
    <label class="form-label">Ưu đãi</label>
    <select class="form-select mt-3 w-50" name="discount_id">
        <option value="" selected></option>
        @foreach ($discount as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
      </select>
  </div> --}}
        <button class="btn btn-primary mt-3" type="submit">Submit</button>
    </form>
@endsection
@section('script')
<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_truoc").change(function () {
            readURL(this, '#mat_truoc_preview');
        });

    });
    </script>
@endsection
