@extends('templates.layout')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Promotions</h2>
                    <div class="bt-option">
                        <a href="{{route('client.home')}}">Home</a>
                        <span>Promotions Grid</span>
                    </div>
                    <h3 class="mt-5">Chúng tôi mang đến các khuyến mãi tốt nhất NGAY TẠI ĐÂY</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            @foreach ($discounts as $item)
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{ $item->image ? '' . Storage::url($item->image) : ''}}">
                    <div class="bi-text">
                        <h4><a href="{{ route('client.promotion-detail',['id' => $item->id ]) }}">{{ $item->name}}</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> {{ $item->start_date}} -> {{ $item->end_date}}</div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
    </div>
</section>
@endsection
