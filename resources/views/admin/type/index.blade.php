@extends('templates.admin')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Danh sách loại phòng</h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
              <a href="{{ route('type.create') }}" class="btn btn-primary">Thêm loại phòng</a>
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">STT</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tên loại phòng</th>
                  <th class="text-secondary opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($type as $item)
                <tr>
                  <td>{{ $item->id }} </td>
                  <td>{{ $item->name }}</td>
                  <td class="align-middle">
                      <a href="{{ route('type.edit', $item->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                        <a href="{{ route('type.delete', $item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $item->name }} không?')" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
