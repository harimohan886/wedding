@extends('front.layouts.main')
@section('title', 'Home Page')
@section('meta_description', 'Home Page')
@section('content')
    {!! $frequentlyAskedQuestions->section_1 !!}
    {{-- <div id="family" class="faq">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>Frequently <span>Ask</span> Questions</h2>
                        <p>Common Queries that are asked by most of our guests</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="content">
                    <div class="center">
                        <details open>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">1. How can I plan a
                                            wedding on a budget in Jim Corbett? </span></p>
                                </h6>
                            </summary>
                            <p class="description">You can arrange a wedding on a low budget by arranging all your functions
                                in a maximum of 2,3 days. You can also lower your budget by only inviting your close ones.
                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">2. Which venue should
                                            I choose in Jim Corbett and which one is the best?</span> </p>
                                </h6>
                            </summary>
                            <p class="description">It is advised to choose a venue that can easily accommodate all of your
                                guests. The best one depends on your decor and food liking.</span> </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">3. What is the cost
                                            of a nice and dreamy wedding in Jim Corbett?</span> </p>
                                </h6>
                            </summary>
                            <p class="description">For a nice dreamy wedding in Jim Corbett the cost can be different based
                                on your requirements of hotel/ resort, seasons, location, indoor and outdoor designs, food
                                menu, service staff, light and sound, and many more that you choose. </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">4. How many venues
                                            are available in Jim Corbett for weddings?</span> </p>
                                </h6>
                            </summary>
                            <p class="description">A number of hotels and resorts are there for a wedding in Jim Corbett.
                                However, the availability of a venue depends on the date of the wedding and other
                                requirements. </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">5. Can I marry inside
                                            Jim Corbett National Park?</span></p>
                                </h6>
                            </summary>
                            <p class="description">You cannot get married inside Jim Corbett National Park because of safety
                                reasons, the government does not allow it. However, you can find various hotels and resorts
                                near the park to get married. You can even choose a theme-based wedding or you can choose a
                                Jungle theme resort or hotel for your wedding, </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">6. How can I spend my
                                            time in Jim Corbett?</span></p>
                                </h6>
                            </summary>
                            <p class="description">You can spend your time enjoying a safari inside the wild park (make sure
                                to book your safari in advance). You can also enjoy activities like games, a swimming pool
                                relaxation, and other complimentary activities inside your resort. One can go rafting or do
                                other adventurous activities near Jim Corbett.
                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">7. Are non-veg and
                                            veg both available in Jim Corbett Resorts?</span> </p>
                                </h6>
                            </summary>
                            <p class="description">Yes, both non-veg and veg are available in Jim Corbett Resorts. You can
                                even decide your wedding menu according to your liking. However, in some resorts, non-veg
                                may not be available so it is advised to ask them before booking.
                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">8. Is Jim Corbett a
                                            good location for a destination wedding?</span> </p>
                                </h6>
                            </summary>
                            <p class="description">Jim Corbett is the finest place to organize a destination wedding as this
                                place has natural beauty so you can take nice photographs. Furthermore, it has world-class
                                accommodation options for a comfortable and memorable wedding, and also the resorts and
                                hotels provide impeccable service to make your special day a memorable one.
                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">9. Can we get drinks
                                            inside the resorts?</span> </p>
                                </h6>
                            </summary>
                            <p class="description">Yes, almost all resorts provide drinks for celebration.
                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">10. For how long,
                                            loud music is allowed in Jim Corbett? </span></p>
                                </h6>
                            </summary>
                            <p class="description">It depends on the resort that you choose and also the type of wedding
                                you’re organizing. Some resorts have permissions because they are not open-space weddings
                                and some have permissions till particular times.</p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">11. Is a destination
                                            wedding a good idea?</span> </p>
                                </h6>
                            </summary>
                            <p class="description">It’s definitely a nice idea because if you choose a resort in a
                                particular destination for the wedding then you can also book other functions in the same
                                resort. The planner will take care of everything and you will be able to enjoy your big day
                                to the fullest. You can arrange all the functions one after another at a particular place
                                without wasting any time choosing different venues. </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">12. Which is the best
                                            place to get married in the mountains?</span> </p>
                                </h6>
                            </summary>
                            <p class="description">The best place to get married in the mountains is Jim Corbett. Here you
                                can find various resorts and hotels that provide the perfect space for your wedding. These
                                hotels and resorts offer different beautiful decor and delicious food options to make your
                                special day memorable for you and your loved ones.
                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">13. What are the
                                            advantages of a destination wedding?</span> </p>
                                </h6>
                            </summary>
                            <p class="description"> You can take nice pictures with a stunning background. You can choose
                                the decor according to location. You can enjoy sightseeing at different places in your free
                                time. You can gain knowledge about different places and their traditions. You can enjoy
                                delicious food from a different destination. You can enjoy the fun activities of that place
                                and with all these, you can make your wedding day memorable for you and your guests.
                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">14. Who should be
                                            invited to a destination wedding? </span></p>
                                </h6>
                            </summary>
                            <p class="description">Family and your closest friends should definitely be invited. Other than
                                them, try to invite your relatives and other who belongs to the family. If you have business
                                partners or people with whom you don’t talk much, you can just invite them to your
                                reception.

                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">15. How far in
                                            advance it is needed to book a venue? </span></p>
                                </h6>
                            </summary>
                            <p class="description"> Venues remain booked all round the year and it is required to book and
                                choose one at least 10 to 12 months in advance.
                            </p>
                        </details>
                        <details>
                            <summary>
                                <h6>
                                    <p class="title"><i class="fa fa-sun"></i><span class="text-dark">16. How many days
                                            before the wedding you need to arrive at the booked resort or hotel? </span></p>
                                </h6>
                            </summary>
                            <p class="description">It is advised to come 2 days before the wedding so that you can
                                thoroughly check the arrangements and changes can be made (if any).
                            </p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
