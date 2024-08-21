@extends('front.layouts.main')
@section('title', 'Home Page')
@section('meta_description', 'Home Page')
@section('content')
    <div id="wedding" class="gallery-page-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>Connect <span>with</span> us</h2>
                        <p>When you are trying to select a venue for your wedding, Following are the key questions to
                            ask before you decide to book your wedding venues. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="contactusBox">
                        <div class="contactus-icon">
                            <img src="{{ asset('/front/assets/img/mail.png') }}" alt="">
                        </div>
                        <a class="text-decoration-none title" href="mailto:{{ $contactDetails->value['email'] }}">
                            {{ $contactDetails->value['email'] }}
                        </a>
                        <h3><b>Connect By Email</b></h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="contactusBox">
                        <div class="contactus-icon">
                            <img src="{{ asset('/front/assets/img/Phone call.png') }}" alt="">
                        </div>
                        <a class="text-decoration-none title" href="tel:{{ $contactDetails->value['phone'] }}">
                            {{ $contactDetails->value['phone'] }}
                        </a>,
                        <a class="text-decoration-none title" href="tel:{{ $contactDetails->value['alt_phone'] }}">
                            {{ $contactDetails->value['alt_phone'] }}
                        </a>
                        <h3><b>Connect By Phone</b></h3>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="contactusBox">
                        <div class="contactus-icon"><img src="{{ asset('/front/assets/img/Location.png') }}" alt="">
                        </div>
                        <h3 class="title">{{ $contactDetails->value['address'] }}</h3>
                        <h3><b>Come To See Us</b></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="contact-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="contact-block">
                        <h2 class="text-center"><img src="{{ asset('/front/assets/img/client.png') }}" alt=""
                                style="height: 50px; width: 50px;"> Get In Touch With Us</h2>
                        <form action="{{ route('enquiry_general') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" id="type" value="general">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Name" required data-error="Please enter your name"
                                            value="{{ old('name') }}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" placeholder="Your Phone" id="phone" class="form-control"
                                            name="mobile_no" required data-error="Please enter your Phone" minlength="10"
                                            maxlength="10" pattern="[0-9]{10,15}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Email" id="email" class="form-control"
                                            name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Your Message" rows="8" data-error="Write your message"
                                            required name="message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-1">
            <div class="col-lg-12 mt-4">
                <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    id="gmap_canvas"
                    src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=JUNGLE%20SAFARI%20INDIA%20Delhi+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                <a href='https://www.acadoo.de/fachrichtungen/ghostwriter-medizin/'>Medizin Abschlussarbeit</a>
                <script type='text/javascript'
                    src='https://embedmaps.com/google-maps-authorization/script.js?id=73640d3f1b688f00f93c6ae6bd98e968e99c8687'>
                </script>
            </div>
        </div>
    </div>
    <!-- End Contact -->


@endsection
