@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form thêm loại phòng</h6>
</div>
<form action="{{ route('banner.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mt-3">
        <label class="col-md-3 col-sm-4 control-label">Banner</label>
        <div class="col-md-9 col-sm-8">
            <div class="row">
                <div class="col-xs-6">
                    <input type="file" name="image" accept="image/*"
                           class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                </div>
            </div>
        </div>
</div>
        <button class="btn btn-primary mt-2" type="submit">Submit</button>
    </form>
@endsection


