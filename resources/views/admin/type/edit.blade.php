@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form sửa loại phòng</h6>
</div>
<form action="{{ route('type.edit',['id' => $type->id]) }}" method="POST">
    @csrf
      <div class="mt-3 ">
        <label for="exampleFormControlInput1" class="form-label">Tên loại phòng</label>
        <input type="text" class="form-control border border-dark w-50" name="name" value="{{ $type->name }}">
      </div>
        <button class="btn btn-primary mt-2" type="submit">Submit</button>
    </form>
@endsection
