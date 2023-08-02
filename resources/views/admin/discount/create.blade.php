@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form thêm ưu đãi</h6>
</div>
<form action="{{ route('discount.create') }}" method="POST">
    @csrf
      <div class="mt-3 ">
        <label class="form-label">Tên ưu đãi</label>
        <input type="text" class="form-control border border-dark w-50" name="name">
      </div>
      <div class="mt-3 ">
        <label class="form-label">Content</label>
        <input type="text" class="form-control border border-dark w-50" name="content">
      </div
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
