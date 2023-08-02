@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form thêm loại phòng</h6>
</div>
<form action="{{ route('type.create') }}" method="POST">
    @csrf
      <div class="mt-3 ">
        <label for="exampleFormControlInput1" class="form-label">Tên loại phòng</label>
        <input type="text" class="form-control border border-dark w-50" name="name">
      </div>
        <button class="btn btn-primary mt-3" type="submit">Submit</button>
    </form>
@endsection
