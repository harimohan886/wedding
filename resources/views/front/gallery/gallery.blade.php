@extends('front.layouts.main')
@section('title', 'Home Page')
@section('meta_description', 'Home Page')
@section('content')
    {{-- {!! $gallery->section_1 !!} --}}
    <div id="family" class="gallery-page-box">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>Our Gallery</h2>
                        <p>Wedding locations represent the mood, vibe, budget, and timing play an essential role. The
                            destination we will help you choose will be based on your shared passion and style, season,
                            weather, and other factors. Our team will ensure to leave nothing behind!</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    @forelse ($weddingPrograms??[] as $weddingProgram)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="single-team-member">
                                <div class="gallery-page-img">
                                    <img class="img-fluid locationimage" src="{{ $weddingProgram->image }}"
                                        alt="{{ $weddingProgram->name }}" />
                                </div>
                                <div class="gallery-page-info">
                                    <a href="{{ route('gallery-detail', ['slug' => $weddingProgram->slug ]) }}">
                                        <h4>{{ $weddingProgram->name }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center">Wedding Program Not Available.</h1>
                    @endforelse



                    {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="gallery-page-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti2.webp" alt="" />
                            </div>
                            <div class="gallery-page-info">
                                <a href="{{ route('gallery-detail') }}">
                                    <h4>Sangeet</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="gallery-page-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti3.jpg" alt="" />
                            </div>
                            <div class="gallery-page-info">
                                <a href="{{ route('gallery-detail') }}">
                                    <h4>Haldi</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="gallery-page-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti4.jpg" alt="" />
                            </div>
                            <div class="gallery-page-info">
                                <a href="{{ route('gallery-detail') }}">
                                    <h4>Sagan</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="gallery-page-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti7.webp" alt="" />
                            </div>
                            <div class="gallery-page-info">
                                <a href="{{ route('gallery-detail') }}">
                                    <h4>Subh Vivah</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="gallery-page-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti6.jpg" alt="" />
                            </div>
                            <div class="gallery-page-info">
                                <a href="{{ route('gallery-detail') }}">
                                    <h4>Pre Wedding</h4>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
