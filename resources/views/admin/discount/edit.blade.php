@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form thêm ưu đãi</h6>
</div>
<form action="{{ route('discount.edit',['id' => $discount->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="mt-3">
        <label  class="form-label">Tên ưu đãi</label>
        <input type="text" class="form-control border border-dark w-50" name="name" value="{{ $discount->name}}">
      </div>
      <div class="mt-3 ">
        <label class="form-label">Content</label>
        <textarea cols="30" rows="10" class="form-control border border-dark w-50" name="content">{{ $discount->content}}</textarea>
      </div>
      <div class="form-group mt-3">
        <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
        <div class="col-md-9 col-sm-8">
            <div class="row">
                <div class="col-xs-6">
                    <img id="mat_truoc_preview" src="{{ $banner->image?''.Storage::url($banner->image):''}}" alt="your image"
                         style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                    <input type="file" name="image" accept="image/*"
                           class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                </div>
            </div>
        </div>
</div>
      <div class="mt-3">
        <label class="form-label">Ngày bắt đầu</label>
        <input type="datet" class="form-control border border-dark w-50" name="start_date" value="{{ $discount->start_date}}">
      </div>
      <div class="">
        <label class="form-label">Ngày kết thúc</label>
        <input type="date" class="form-control border border-dark w-50" name="end_date" value="{{ $discount->end_date}}">
      </div>
        <button class="btn btn-primary mt-3 w-15" type="submit">Submit</button>
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
