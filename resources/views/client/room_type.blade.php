
@extends('templates.layout')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Our Rooms</h2>
                    <div class="bt-option">
                        <a href="{{route('client.home')}}">Type</a>
                        <span>{{ $type->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            @foreach ($room as $item)
            <div class="col-lg-4 col-md-6">

                <div class="room-item">
                    <img src="{{ $item->image ? '' . Storage::url($item->image) : ''}}" >
                    <div class="ri-text">
                        <h4>{{ $item->name }}</h4>
                        {{-- <h3>{{ $item->price }}$<span>/Pernight</span></h3> --}}
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>{{ $item->capacity }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Type:</td>
                                    <td>{{ $item->type->name }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>{{ $item->services}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('client.detail', $item->id) }}" class="primary-btn">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
@endsection


