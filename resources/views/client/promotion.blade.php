@extends('templates.layout')
@section('content')
<section class="blog-details-hero set-bg" data-setbg="{{ $promotion->image ? '' . Storage::url($promotion->image) : ''}}">
</section>
<h2 class="text-black m-5">{{ $promotion->name }}</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="bd-hero-text">

                <ul>
                    <li class="b-time text-2xl"><i class="icon_clock_alt"></i> {{$promotion->start_date}} - {{$promotion->end_date}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog-details-text">
                    <div class="bd-title">
                        <p>{{ $promotion->content}}</p>
                        <p>In Nepal your overseas adventure travel is going to be fascinating. You will get to see
                            the Himalayan Mountains and experience all that the rich Nepalese culture has to offer.
                            They are an amazing people who have managed to hang on to their own culture and beliefs
                            longer than most other countries. When overseas adventure travel takes you to Nepal you
                            will have the chance to see all of the fantastic and one of a kind lakes and forests and
                            you can even spend days or weeks camping out in their forests with a specialized guide.
                            And the waterfalls in Nepal are to die for, you will never see anything more gorgeous in
                            your life as their waterfalls! This should be at the top of your overseas adventure
                            travel destination list for sure!</p>
                    </div>
                    <div class="tag-share">
                        <div class="tags">
                            <a href="#">Travel Trip</a>
                            <a href="#">Camping</a>
                            <a href="#">Event</a>
                        </div>
                        <div class="social-share">
                            <span>Share:</span>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                    {{-- <div class="leave-comment">
                        <form action="#" class="comment-form">
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
