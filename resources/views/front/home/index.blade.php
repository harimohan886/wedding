@extends('front.layouts.main')
@section('title', 'Home Page')
@section('meta_description', 'Home Page')
@section('content')
    <link rel="stylesheet" href="{{ asset('/front/assets/css/quiryform.css') }}">
    <link rel="stylesheet" href="{{ asset('/front/assets/css/testonomial.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <!-- Header Start -->
    <style>
        .herosection {
            position: relative;
            height: 810px;
            color: white;
            padding: 50px 0;
            background-image: url('/front/assets/img/Image 1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }

        .herosection::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Adjust the opacity as needed */
            z-index: -1;
        }

        @media screen and (max-width:576px) {
            .herosection .head {
                font-size: 55px !important;
                margin-top: -14px !important;

            }

            .herosection .subhead {
                font-size: 63px !important;
            }
        }

        .herosection .head {
            font-size: 76px;
            font-family: 'Engagement', cursive;
            color: var(--white);
            position: relative;
            z-index: 3;
            margin-top: 192px;
            text-align: center;
        }

        .herosection .subhead {
            font-size: 76px;
            font-family: 'Engagement', cursive;
            color: var(--primary);
            position: relative;
            text-align: center;
            z-index: 3;
        }

        .herosection p {
            color: var(--white);
            position: relative;
            text-align: center;
            z-index: 3;
        }

        .herosection p strong {
            color: var(--primary);
            font-size: 40px;
            font-family: 'Engagement', cursive;
        }

        .herosection a.btn {
            background: #63c7bd;
            padding: 10px 20px;
            font-size: 20px;
            text-transform: uppercase;
            color: var(--white);
            border-radius: 0px;
            position: relative;
            z-index: 3;
        }

        .herosection a.btn:hover {
            background: var(--primary);
        }

        @media screen and (max-width: 321px) {
            .herosection {
                height: 1460px !important;
                /* Ensure the query form can be positioned relative to the section */
            }

            .quiryform {
                width: 299px;
                margin: 0px 0px;
            }
        }


        @media screen and (min-width: 321px) and (max-width:376px) {
            .quiryform {
                width: 336px;
                margin: 0px 0px;
            }

            .herosection {
                height: 1470px !important;

            }
        }

        @media screen and (min-width: 376px) and (max-width:429px) {
            .quiryform {
                width: 390px;
                margin: 0px 0px;
            }

            .herosection {
                height: 1400px !important;

            }
        }

        @media screen and (min-width: 429px) and (max-width:576px) {
            .quiryform {
                width: 490px;
                margin: 0px 0px;
            }

            .herosection {
                height: 1470px !important;

            }
        }

        @media screen and (min-width: 576px) and (max-width:992px) {

            .herosection .head {
                font-size: 57px !important;
                margin-top: 74px !important;

            }

            .herosection .subhead {
                font-size: 63px !important;
            }

        }

        @media screen and (min-width: 576px) and (max-width:767px) {

            .herosection {
                height: 1300px !important;

            }
        }

        @media screen and (min-width: 576px) and (max-width:768px) {
            .quiryform {
                width: 495px;
                margin: 0px 0px;
            }


        }

        @media screen and (min-width: 768px) and (max-width: 992px) {
            .quiryform {
                width: 380px;
                margin: -34px -24px;
            }
        }

        @media screen and (min-width: 992px) and (max-width:1199px) {

            .quiryform {
                width: 455px;
                margin: 62px -65px;
            }

        }

        @media screen and (min-width: 1199px) {
            .quiryform {
                width: 455px;
                margin: 62px 0px;
            }

        }

        .magenta-slider {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, rgba(255, 0, 255, 1) 0%, rgba(255, 255, 255, 1) 0%);
            outline: none;
            /* This removes the default outline */
            border: 2px solid magenta;
            /* Add a border to make the outline visible */
            border-radius: 5px;
            /* Slight rounding of the corners */
            transition: background .15s ease-in-out, border-color .15s ease-in-out;
        }

        .magenta-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 24px;
            height: 24px;
            background: #ff00ff;
            /* Magenta color */
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid magenta;
            /* Add a border to the thumb */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            /* Optional: add a shadow for better visibility */
        }

        .magenta-slider::-moz-range-thumb {
            width: 24px;
            height: 24px;
            background: #ff00ff;
            /* Magenta color */
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid magenta;
            /* Add a border to the thumb */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            /* Optional: add a shadow for better visibility */
        }
    </style>
    @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ Session::get('success') }}',
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ Session::get('error') }}',
            });
        </script>
    @endif
    <div class="herosection">
        <div class="container">
            <div class="row">
                {!! $homepage->section_1 !!}
                {{-- <div class="col-lg-7 col-md-6">
                    <h1 class="head">Premium destination weddings in</h1>
                    <h2 class="subhead">Jim Corbett</h2>
                    <p>17 best destination wedding resorts in Jim Corbett</p>
                </div> --}}

                <div class="col-lg-5 col-md-6">
                    <div class="quiryform">
                        <h1 class="title">Request Quote</h1>
                        <form action="{{ route('enquiry_general') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="general">
                            <fieldset>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="heading" for="name">Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter your name..">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="heading" for="mobile_no">Mobile No.</label>
                                        <input type="number" id="mobile_no" name="mobile_no"
                                            placeholder="Enter your phone..">
                                        @error('mobile_no')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="heading" for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                            placeholder="Enter your email..">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="heading">Venue</label>
                                        <select id="venue" name="venue">
                                            <option value="">..Choose Venue..</option>
                                            @foreach ($vanues as $key => $vanue)
                                                <option value="{{ $vanue['name'] }}"
                                                    @if (old('venue') == $vanue['name']) selected @endif>{{ $vanue['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('venue')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="heading" for="event_date">Event Date</label>
                                        <input type="date" id="event_date" name="event_date">
                                        @error('event_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php
                                            $budgetMinPrice = 100000;
                                        @endphp
                                        <div class="budget-container">
                                            <label class="heading" for="budget">Budget:</label>
                                            <span id="budget_price_input" class="budget-value">{{ $budgetMinPrice }}</span>
                                        </div>
                                        <input type="range" class="range magenta-slider" min="100000"
                                            max="{{ $maximum_budget }}" step="10000" id="budget" name="budget"
                                            style="width: -webkit-fill-available;" value="{{ $budgetMinPrice }}">
                                        @error('budget')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php
                                            $guestMinPrice = 0;
                                        @endphp
                                        <div class="budget-container">
                                            <label class="heading" for="guests">Guests:</label>
                                            <span id="guest_price_input" class="budget-value">{{ $guestMinPrice }}</span>
                                        </div>
                                        <input type="range" class="range magenta-slider" min="50"
                                            max="{{ $maximum_guest }}" step="50" id="guests" name="guests"
                                            style="width: -webkit-fill-available;" value="{{ $guestMinPrice }}">
                                        @error('guests')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        @php
                                            $roomMin = 0;
                                        @endphp
                                        <div class="room-container">
                                            <label class="heading" for="rooms">Rooms:</label>
                                            <span id="room_input" class="room-value">{{ $roomMin }}</span>
                                        </div>
                                        <input type="range" class="range magenta-slider" min="0"
                                            max="{{ $maximum_rooms }}" step="1" id="rooms" name="rooms"
                                            style="width: -webkit-fill-available;" value="{{ $roomMin }}">
                                        @error('rooms')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="rating-container">
                                            <label class="heading">Choose Rating:</label>
                                            <div class="rating">
                                                @for ($i = $maximum_ratings; $i >= 1; $i--)
                                                    <input type="radio" id="star{{ $i }}" name="rating"
                                                        value="{{ $i }}"
                                                        {{ old('rating') == $i ? 'checked' : '' }} />
                                                    <label class="full" for="star{{ $i }}"
                                                        title="{{ $i }} star{{ $i > 1 ? 's' : '' }}"></label>
                                                @endfor
                                            </div>
                                            @error('rating')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="heading">Function:</label>
                                        @foreach ($weddingFunctions as $index => $function)
                                            <input type="checkbox" id="function{{ $index }}"
                                                value="{{ $function['name'] }}" name="functions[]">
                                            <label class="light"
                                                for="function{{ $index }}">{{ $function['name'] }}</label><br>
                                        @endforeach
                                        @error('functions')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label class="heading">Services:</label>
                                        @foreach ($weddingServices as $index => $service)
                                            <input type="checkbox" id="service{{ $index }}"
                                                value="{{ $service['name'] }}" name="services[]">
                                            <label class="light"
                                                for="service{{ $index }}">{{ $service['name'] }}</label><br>
                                        @endforeach
                                        @error('services')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                            <button class="submitbutton" type="submit">Enquiry Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div id="wedding" class="wedding-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-box">
                            <h2>Services</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="serviceBox">
                            <div class="service-icon"><img src="{{ asset('/front/assets/img/party.png') }}"
                                    alt=""></div>
                            <h3 class="title">Wedding Band</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur, deleniti
                                eaque excepturi.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="serviceBox">
                            <div class="service-icon"><img src="{{ asset('/front/assets/img/Makeup Artrist.png') }}"
                                    alt=""></div>
                            <h3 class="title"> Bridal Makeup</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur, deleniti
                                eaque excepturi.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="serviceBox">
                            <div class="service-icon"><img src="{{ asset('/front/assets/img/Mehndi.png') }}"
                                    alt=""></div>
                            <h3 class="title"> Mehandi Artists </h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur, deleniti
                                eaque excepturi.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="serviceBox">
                            <div class="service-icon"><img src="{{ asset('/front/assets/img/Transportation.png') }}"
                                    alt=""></div>
                            <h3 class="title">Transportation</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur, deleniti
                                eaque excepturi.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="serviceBox">
                            <div class="service-icon"><img src="{{ asset('/front/assets/img/Tiger.png') }}"
                                    alt=""></div>
                            <h3 class="title">Jungle Safari</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur, deleniti
                                eaque excepturi.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="serviceBox">
                            <div class="service-icon"><img src="{{ asset('/front/assets/img/chariots.png') }}"
                                    alt=""></div>
                            <h3 class="title"> Wedding Chariots </h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur, deleniti
                                eaque excepturi.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {!! $homepage->section_3 !!}
    {{-- <section>
        <div id="about" class="about-box">
            <div class="about-a1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="title-box">
                                <h2>What is a <span>Destination</span> Wedding</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row align-items-center about-main-info">
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <div class="me-lg-3">
                                        <div class="about-img">
                                            <img class="img-fluid" src="/front/assets/img/dest-1.jpg" alt="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-12 col-sm-12">
                                    <div>
                                        <p>A destination wedding basically means a ceremony or reception that is organized
                                            outside of the couple’s hometown.
                                            A destination wedding requires traveling from the hometown to some outside area
                                            (it’s not necessary to take
                                            place in another country). Destination weddings are mostly done in nice
                                            surroundings so that people can enjoy a
                                            magical experience. Most people choose mountains or scenic countries for their
                                            weddings as they provide the
                                            perfect backdrop for nice photographs and the environment. These weddings also
                                            provide the perfect getaway for
                                            guests. </p>
                                        <p>If you’re someone who wants to plan a perfect destination wedding in the
                                            mountains then you’re on the right
                                            platform. Jim Corbett is the nicest place to plan a magical dreamy wedding. This
                                            place has luxurious resorts and
                                            great ambiance which makes it chosen by most couples. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {!! $homepage->section_4 !!}
    {{-- <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>Wedding In <span>Jim Corbett - the magical</span> experience </h2>
                    </div>
                    <p>When people dream of a perfect fairy-tale destination wedding, they choose Jim Corbett. This
                        destination offers the best natural setting for a perfect wedding. It’s a stunning place to plan a
                        wedding and offers the perfect backdrop for the wedding of your dreams. </p>
                    <p>Getting married in a resort near the wild Jim Corbett National Park is like making your wishes of a
                        fairytale wedding come true. Imagine that you’ll marry the love of your life against a backdrop of
                        towering peaks, with the gentle background sounds of the Ramganga River, it will be a magical
                        experience</p>
                    <p>This place is a true paradise! If you’re a nature lover like us, then this place is best for hosting
                        your exquisite wedding. This place provides the perfect ambiance for a wedding, as written in
                        romance novels. </p>
                    <p>One can find a list of hotels and resorts near this park that cater to the needs of weddings. Here,
                        one can see from the grand opulent venues to the intimate settings for a perfect wedding. Every
                        couple can find a place for a wedding according to their vision. With its natural beauty,
                        world-class accommodation options, and impeccable service, it’s a magical destination that will
                        surely make your wedding day unforgettable for you and your loved ones. </p>
                </div>
            </div>
        </div>
    </section> --}}

    {!! $homepage->section_5 !!}
    {{-- <section class="whycorbetbackground">
        <div class="container whycorbetbox">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box" style="margin-bottom: 10px;">
                        <h2>Why <span>Jim</span> Corbett?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="whycorbet">
                        <img src="/front/assets/img/gallery-01.jpg" class="img-fluid whycorbetimage"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <p>You might be thinking why should you choose this place over any other? Well, Jim Corbett National
                        Park is the perfect place to create memories that will last forever. This place has the perfect
                        setting for a nice wedding with natural surroundings, birds chirping, and river sounds. This place
                        is perfect for couples who are looking to tie a knot in pleasant surroundings. Also, this place
                        offers a wedding under a clear sky with stars that would add to the magical experience. </p>
                    <p>Despite being a wild place, the resorts near the park offer the utmost luxury. You will have the
                        opportunity to host a wedding with all the amenities that are required for a memorable experience.
                        The resorts in this wild place are built on themes and will provide the perfect background for
                        pictures, also they come with spacious rooms, elegant decor, and top-notch service. Your guests will
                        always remember your perfect wedding. After or before the wedding, people can also enjoy the
                        complimentary activities at the resorts or they can go for a thrilling safari ride inside this wild
                        park. </p>
                </div>
            </div>
            <div class="description">
                <p style="margin-bottom: 0px;">One of the major highlights of choosing this place is the unique venues it
                    offers. Different resorts
                    offer different venues, one can choose from open lawns, poolside areas, or even jungle settings. Each
                    venue offers a different charm and people can choose the one that suits their dream wedding. And think
                    what’s more, you don’t have to book decoration, catering and other vendors separately. You can get it
                    all just by choosing a resort. </p>
                <p>A wedding at this natural place is not just about tying the knot, it’s a memorable experience. This place
                    offers plenty of activities to enjoy for you and your guests. People can go on thrilling safaris, they
                    can do rafting or even they can indulge in nature walks. This place offers the perfect things for
                    enjoyment. This place is also well connected to different cities so it will be easily accessible for
                    your guests. </p>
            </div>
        </div>
    </section> --}}

    {!! $homepage->section_6 !!}
    {{-- <section class="besttime">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box" style="margin-bottom: 10px;">
                        <h2>Best Time <span>To Host</span> In Jim Corbett </h2>
                    </div>
                    <div class="description">
                        <P style="margin-bottom: 0px;">Jim Corbett is a natural wonder and it remains pleasant throughout
                            the year. The best time to
                            come here for a memorable wedding would be from December to March. During this time, most of the
                            weddings take place at this destination. The reason behind choosing these months as the best
                            time is that during this time, the weather in this scenic place is pleasant and also one can
                            easily beat the heat of summer.
                        </P>
                        <P>Moreover, it’s a good time to organize a wedding here because the sky remains clear and one can
                            easily spot stars at night. Imagine having a grand celebration at night under beautiful stars,
                            it will add to the overall experience of your wedding.
                        </P>
                    </div>
                </div>
            </div>
            <div class="text-dsg">
                <h2><b>Approx Cost For Wedding</b></h2>
                <p>One of the most asked questions that strikes every couple is how much a destination wedding in Jim
                    Corbett costs. So, the answer to this question is, that a wedding in Jim Corbett varies on the basis of
                    hotel/ resort, seasons, location, indoor and outdoor designs, food menu, service staff, light and sound,
                    and many more. With these, several other factors affect the price of a wedding in Jim Corbett. However,
                    If you want to know about the minimum budget then 10 Lac is sufficient for a wedding event of 100- 150
                    guests. This budget can go up to INRs 15-25 LAC and more depending on the requirements of your dream
                    wedding of 200- 300 guests. </p>

            </div>


            <div class="text-dsg1 mt-4">
                <h2><b>Why Choose Us as Your Planner? </b></h2>
                <p style="margin-bottom: 0px;">We have a great deal for couples who are looking for a dream wedding in Jim
                    Corbett. Just tell us about your needs and we will give you the best options to choose for your wedding
                    day. Through our website, you can choose from a wide range of resorts and hotels and after that, you can
                    choose the decor that you like. If you want a particular theme for your functions then you can choose
                    that also. After that, you can choose the mehendi and makeup artists along with other requirements. This
                    way, you can make your magical dreamy wedding come true. </p>
                <p>Not only for Weddings, but we also assist our guests and provide them best budget for Haldi, Mahendi,
                    Sangeet, Ring Ceremony, Sagan, and Cocktails. If you choose us as your planner then you can be rest
                    assured that your special day will be counted as the best in your memories. Contact us for more details.
                </p>

            </div>
        </div>
    </section> --}}

    {!! $homepage->section_7 !!}
    {{-- <section>
        <div id="family" class="family-box">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="title-box">
                            <h2>Venues <span>In Jim</span> Corbett</h2>
                            <p>Wedding locations represent the mood, vibe, budget, and timing play an essential role. The
                                destination we will help you choose will be based on your shared passion and style, season,
                                weather, and other factors. Our team will ensure to leave nothing behind!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="family-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/dest-1.jpg"
                                    alt="" />
                            </div>
                            <div class="family-info">
                                <h4>Jim Corbett</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="family-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti2.webp"
                                    alt="" />
                            </div>
                            <div class="family-info">
                                <h4>Nainital </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="family-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti3.jpg"
                                    alt="" />
                            </div>
                            <div class="family-info">
                                <h4>Dehradun</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="family-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti4.jpg"
                                    alt="" />
                            </div>
                            <div class="family-info">
                                <h4>Rishikesh</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="family-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti7.webp"
                                    alt="" />
                            </div>
                            <div class="family-info">
                                <h4>Mussoorie</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-team-member">
                            <div class="family-img">
                                <img class="img-fluid locationimage" src="/front/assets/img/desti6.jpg"
                                    alt="" />
                            </div>
                            <div class="family-info">
                                <h4>Haridwar </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="tips">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box" style="margin-bottom: 10px;">
                        <h2>Tips for <span>Planning Perfect</span> Wedding </h2>
                        <p>To plan a perfect wedding, use this checklist and go step-wise so that you won’t miss anything to
                            make your dreamy wedding come true. </p>
                    </div>
                    <div class="description">
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                Make a Budget, this one is the most important thing so that you can make arrangements
                                according to the expenses.
                            </p>
                        </div>
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                Choose a location, it can be any resort or hotel that you like and it is capable of
                                accommodating all your guests. Choose one that suits your budget and also provides a decor
                                that suits your dreams.
                            </p>
                        </div>
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                Hire a professional planner who has good knowledge about that area or try to choose a resort
                                that takes care of all your requirements so that you can enjoy your wedding instead of
                                worrying about the last-minute details or arrangements.
                            </p>
                        </div>
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                After finalizing the sight and details, mail your guests to attend your special day.
                            </p>
                        </div>
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                Book your tickets and transportation before your big day.
                            </p>
                        </div>
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                Then, you will have plenty of time to do other things like purchasing your wedding dress and
                                jewelry.
                            </p>
                        </div>
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                If you’re worrying about short details like wedding bands, chariots, bridal makeup, and
                                mehandi artists, then let me tell you, you can get it all if you choose from our venues. We
                                have a range of venues that provide all these services so that you can enjoy your wedding to
                                the fullest.
                            </p>
                        </div>
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                Last but not least, pack your stuff and come to your wedding location one day before and
                                check all the arrangements one last time.
                            </p>
                        </div>
                        <div class="d-flex">
                            <img class=" me-3 ms-3 hg-wg" src="{{ asset('/front/assets/img/butterfly.png') }}"
                                style="height: 30px; width: 40px;" alt="">
                            <p style="font-size: 18px;">
                                Make a Budget, this one is the most important thing so that you can make arrangements
                                according to the expenses.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {!! $homepage->section_9 !!}
    {{-- <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>What <span>Our Guest's</span> Say </h2>
                        <p>Wedding locations represent the mood, vibe, budget, and timing play an essential role. The
                            destination we will help you choose will be based on your shared passion and style, season,
                            weather, and other factors. Our team will ensure to leave nothing behind!</p>
                    </div>
                </div>
            </div>
            <div class="slider-container">
                <button class="prev">&#10094;</button>
                <div class="figure-container">
                    <figure class="snip1390">
                        <img src="/front/assets/img/family-01.jpg" alt="profile-sample3" class="profile" />
                        <figcaption>
                            <h2>Eleanor Crisp</h2>
                            <h4>Ring Ceremony</h4>
                            <blockquote>Dad buried in landslide! Jubilant throngs fill streets! Stunned father inconsolable
                                - demands recount!</blockquote>
                        </figcaption>
                    </figure>
                    <figure class="snip1390 hover">
                        <img src="/front/assets/img/family-02.jpg" alt="profile-sample5" class="profile" />
                        <figcaption>
                            <h2>Gordon Norman</h2>
                            <h4>Ring Ceremony</h4>
                            <blockquote>Wormwood : Calvin, how about you? Calvin : Hard to say ma'am. I think my cerebellum
                                has just fused.</blockquote>
                        </figcaption>
                    </figure>
                    <figure class="snip1390">
                        <img src="/front/assets/img/family-03.jpg" alt="profile-sample6" class="profile" />
                        <figcaption>
                            <h2>Sue Shei</h2>
                            <h4>Ring Ceremony</h4>
                            <blockquote>The strength to change what I can, the inability to accept what I can't and the
                                incapacity to tell the difference.</blockquote>
                        </figcaption>
                    </figure>
                    <figure class="snip1390">
                        <img src="/front/assets/img/family-04.jpg" alt="profile-sample6" class="profile" />
                        <figcaption>
                            <h2>Sue Shei</h2>
                            <h4>Ring Ceremony</h4>
                            <blockquote>The strength to change what I can, the inability to accept what I can't and the
                                incapacity to tell the difference.</blockquote>
                        </figcaption>
                    </figure>
                    <figure class="snip1390">
                        <img src="/front/assets/img/family-05.jpg" alt="profile-sample6" class="profile" />
                        <figcaption>
                            <h2>Sue Shei</h2>
                            <h4>Ring Ceremony</h4>
                            <blockquote>The strength to change what I can, the inability to accept what I can't and the
                                incapacity to tell the difference.</blockquote>
                        </figcaption>
                    </figure>
                    <figure class="snip1390">
                        <img src="/front/assets/img/family-06.jpg" alt="profile-sample6" class="profile" />
                        <figcaption>
                            <h2>Sue Shei</h2>
                            <h4>Ring Ceremony</h4>
                            <blockquote>The strength to change what I can, the inability to accept what I can't and the
                                incapacity to tell the difference.</blockquote>
                        </figcaption>
                    </figure>
                    <figure class="snip1390">
                        <img src="/front/assets/img/family-01.jpg" alt="profile-sample6" class="profile" />
                        <figcaption>
                            <h2>Sue Shei</h2>
                            <h4>Ring Ceremony</h4>
                            <blockquote>The strength to change what I can, the inability to accept what I can't and the
                                incapacity to tell the difference.</blockquote>
                        </figcaption>
                    </figure>
                </div>
                <button class="next">&#10095;</button>
            </div>
        </div>
    </section> --}}

    <section>
        <div id="events" class="events-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-box">
                            <h2>Blogs</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="event-inner">
                            <div class="event-img">
                                <img class="img-fluid locationimage" src="{{ asset('/front/assets/img/dest-1.jpg') }}"
                                    alt="" />
                            </div>
                            <h2> <i class="fa fa-heart-o" aria-hidden="true"></i> <b>wedding Carmony </b><i
                                    class="fa fa-heart-o" aria-hidden="true"></i></h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard </p>
                            <a href="#">Explore <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="event-inner">
                            <div class="event-img">
                                <img class="img-fluid locationimage" src="{{ asset('/front/assets/img/desti2.webp') }}"
                                    alt="" />
                            </div>
                            <h2> <i class="fa fa-heart-o" aria-hidden="true"></i> <b>Ring Ceremony</b> <i
                                    class="fa fa-heart-o" aria-hidden="true"></i></h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard </p>
                            <a href="#">Exolore <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="event-inner">
                            <div class="event-img">
                                <img class="img-fluid locationimage" src="{{ asset('/front/assets/img/desti3.jpg') }}"
                                    alt="" />
                            </div>
                            <h2> <i class="fa fa-heart-o" aria-hidden="true"></i> <b>Reception Ceremony</b> <i
                                    class="fa fa-heart-o" aria-hidden="true"></i></h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard </p>
                            <a href="#">Explore <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                function updateSliderBackground(slider) {
                    const value = slider.val();
                    const min = slider.attr('min');
                    const max = slider.attr('max');
                    const percentage = ((value - min) / (max - min)) * 100;
                    slider.css('background',
                        `linear-gradient(90deg, rgba(255, 0, 255, 1) ${percentage}%,
                         rgba(255, 255, 255, 1) ${percentage}%)`
                    );
                }

                $('#budget').on('input', function() {
                    $('#budget_price_input').text($(this).val());
                    updateSliderBackground($(this));
                });

                $('#guests').on('input', function() {
                    $('#guest_price_input').text($(this).val());
                    updateSliderBackground($(this));
                });

                $('#rooms').on('input', function() {
                    $('#room_input').text($(this).val());
                    updateSliderBackground($(this));
                });

                updateSliderBackground($('#budget'));
                updateSliderBackground($('#guests'));
                updateSliderBackground($('#rooms'));
            });
        </script>
    @endpush
@endsection
