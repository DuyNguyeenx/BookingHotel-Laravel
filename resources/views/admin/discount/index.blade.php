@extends('templates.admin')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Danh sách khuyến mãi,ưu đãi</h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
              <a href="{{ route('discount.create') }}" class="btn btn-primary">Thêm ưu đãi</a>
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                    <th class="text-secondary opacity-7">Action</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">STT</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tên</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Content</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Ảnh</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Ngày bắt đầu</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Ngày kết thúc</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($discount as $item)
                <tr>
                    <td class="align-middle">
                        <a href="{{ route('discount.edit', $item->id) }}" class="ps-2 text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                          <a href="{{ route('discount.delete', $item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $item->name }} không?')" class="ps-1 text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                              Delete
                          </a>
                      </td>
                  <td>{{ $item->id }} </td>
                  <td>{{ $item->name }} </td>
                  <td>{{ $item->content }}</td>
                  <td><img src="{{ $item->image ? '' . Storage::url($item->image) : ''}}" style="width:200px" /></td>
                  <td>{{ $item->start_date }}</td>
                  <td>{{ $item->end_date }}</td>
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
