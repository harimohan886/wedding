@extends('front.layouts.main')
@section('title', 'Home Page')
@section('meta_description', 'Home Page')
@section('content')
    {!! $privacyPolicy->section_1 !!}
    {{-- <div id="family" class="privacy-page-box">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>Our <span>Privacy </span> Policy</h2>
                        <p>How Is Jimcorbettevents Going To Help You?</p>
                    </div>
                </div>
            </div>

            <div class="dottedborder ">
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Collection Of Information</b></h4>
                    <p>Our website may collect personal information such as name, contact details, email address, phone
                        number, payment information, and other which is necessary for booking and planning a destination
                        event. </p>
                </div>
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Usage of Information</b></h4>
                    <p>The information that we take, can be used to process bookings, communicate with you, and assist with
                        wedding planning. We can also use it to enhance our services. We can also sometimes send you
                        promotional emails or offers related to our services. </p>
                </div>
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Sharing of Information </b></h4>
                    <p>We may share your information with the third-party service provider so that they can assist with our
                        services, such as payment processing, email delivery, and data analytics. We can also share it with
                        wedding venues and vendors to facilitate bookings and inquiries. </p>
                </div>
                <div class="ms-3 me-3">
                    <h4><b><i class="fa-solid fa-building-lock"></i> Customers Rights </b></h4>
                    <p>Our dear customers have the right to access their personal information and update or correct it. You
                        can tell us to delete your information for future use. </p>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
