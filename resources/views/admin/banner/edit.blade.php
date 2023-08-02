@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form sửa loại phòng</h6>
</div>
<form action="{{ route('banner.edit',['id' => $type->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
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
        <button class="btn btn-primary mt-2" type="submit">Submit</button>
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

