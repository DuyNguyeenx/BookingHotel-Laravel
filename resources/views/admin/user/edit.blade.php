@extends('templates.admin')
@section('content')
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Form sửa loại phòng</h6>
</div>
<form action="{{ route('user.edit',['id' => $users->id]) }}" method="POST">
    @csrf
      <div class="mt-3 ">
        <label for="exampleFormControlInput1" class="form-label">Tên</label>
        <input type="text" class="form-control border border-dark w-50" name="name" value="{{$users->name}}">
      </div>
      <div class="mt-3 ">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control border border-dark w-50" name="email" value="{{$users->email}}">
      </div>
      <div class="mt-3 ">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input type="password" class="form-control border border-dark w-50" name="password" value="{{$users->password}}">
      </div>
      <div class="mt-3 ">
        <label for="exampleFormControlInput1" class="form-label">Vai trò</label>
        <select class="form-select mt-3 w-50 border-1 border-black ps-1" name="role">
            <option selected value="{{$users->role}}">{{ $users->role == 0 ? 'Admin' : 'Nhân viên'}}</option>
            <option value="{{$users->role == 0 ? 1 : 0}}">{{ $users->role == 0 ? 'Nhân viên' : 'Admin'}}</option>
          </select>
      </div>
        <button class="btn btn-primary mt-3" type="submit">Submit</button>
    </form>
@endsection
