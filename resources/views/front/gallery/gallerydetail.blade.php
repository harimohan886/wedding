@extends('front.layouts.main')
@section('title', 'Home Page')
@section('meta_description', 'Home Page')
@section('content')
    <div id="gallery" class="gallery-page-detail-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>{{ $weddingProgram->name }}</h2>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}
                    </div>
                </div>
            </div>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i
                            class="fa-solid fa-image"></i> Images</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i
                            class="fa-solid fa-video"></i> Videos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><i
                            class="fa-solid fa-message"></i> Review</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="row">
                        @forelse ($weddingProgramImages??[] as $weddingProgramImage)
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="popup-gallery clearfix">
                                    <div class="image">
                                        <a href="{{ asset($weddingProgramImage->image_url) }}">
                                            <img class="img-fluid" src="{{ asset($weddingProgramImage->image_url) }}"
                                                alt="{{ $weddingProgramImage->image }}">
                                            <span class="overlay"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1 class="text-center">
                                Images not available in this wedding program.
                            </h1>
                        @endforelse
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="row">
                        @forelse ($weddingProgramVideos??[] as $weddingProgramVideo)
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <video width="320" height="240" controls>
                                    <source src="{{ asset($weddingProgramVideo['video_url']) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @empty
                            <h1 class="text-center">
                                Videos not available in this wedding program.
                            </h1>
                        @endforelse
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="reviewbody">
                        <div class="wrapper">
                            @forelse ($weddingProgramReviews??[] as $review)
                                <div class="box">
                                    <i class="fas fa-quote-left quote"></i>
                                    <p>{{ $review->description }}</p>
                                    <div class="content">
                                        <div class="info">
                                            <div class="name">{{ $review->name }}</div>
                                            <div class="job">{{ $review->city }}</div>
                                            <div class="stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="image">
                                            <img src="{{ asset($review->image_url) }}" alt="{{ $review->name }}">
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h1 class="text-center">
                                    Reviews not available in this wedding program.
                                </h1>
                            @endforelse
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination mt-4 justify-content-center">
                                @if ($weddingProgramReviews->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $weddingProgramReviews->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @for ($page = 1; $page <= $weddingProgramReviews->lastPage(); $page++)
                                    <li
                                        class="page-item {{ $weddingProgramReviews->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="{{ $weddingProgramReviews->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endfor

                                @if ($weddingProgramReviews->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $weddingProgramReviews->nextPageUrl() }}"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">&raquo;</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
