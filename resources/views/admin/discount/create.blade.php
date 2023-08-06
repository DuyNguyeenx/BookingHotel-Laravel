@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form thêm ưu đãi</h6>
</div>
<form action="{{ route('discount.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="mt-3 ">
        <label class="form-label">Tên ưu đãi</label>
        <input type="text" class="form-control border border-dark w-50" name="name">
      </div>
      <div class="mt-3 ">
        <label class="form-label">Content</label>
        <textarea cols="30" rows="10" class="form-control border border-dark w-50" name="content"></textarea>
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
      <div class="mt-3">
        <label class="form-label">Ngày bắt đầu</label>
        <input type="date" class="form-control border border-dark w-50" name="start_date">
      </div>
      <div class="mt-2">
        <label class="form-label">Ngày kết thúc</label>
        <input type="date" class="form-control border border-dark w-50" name="end_date">
      </div>
        <button class="btn btn-primary mt-3 w-10" type="submit">Submit</button>
    </form>
@endsection
