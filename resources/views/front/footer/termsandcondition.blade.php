@extends('front.layouts.main')
@section('title', 'Home Page')
@section('meta_description', 'Home Page')
@section('content')
    {!! $termAndConditions->section_1 !!}
    {{-- <div id="family" class="privacy-page-box">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>Term <span>& </span> Conditions</h2>
                        <p>How Is Jimcorbettevents Going To Help You?</p>
                    </div>
                </div>
            </div>

            <div class="dottedborder ">
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Acceptance of Terms </b></h4>
                    <p>By using our website, you have to agree to be bound by the following terms and conditions.</p>
                </div>
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Website Use</b></h4>
                    <p>While using our website, you have to refrain from engaging in any illegal or harmful activities and
                        do not try to attempt, access, or tamper with our website’s systems. Do not give false information.
                    </p>
                </div>
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Venue Information </b></h4>
                    <p>We try to provide accurate and up-to-date information about the venue but we do not guarantee the
                        complete accuracy, reliability, or timeliness of the information. Furthermore, the availability or
                        venue pricing can change without prior notice. If you make any booking from this website for a
                        particular venue then you have to abide by the terms and conditions of that venue.</p>
                </div>
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Payments </b></h4>
                    <p>All the payments that are made for venue booking through our website are done securely. The refunds
                        can depend on the venue, so it is advised to see the venue’s policies for details. </p>
                </div>
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Modification</b></h4>
                    <p>We have the right to change any of these Terms and Conditions at any time without prior notice. If
                        you continue to use this website then you are abiding by the acceptance of the modified terms. </p>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
