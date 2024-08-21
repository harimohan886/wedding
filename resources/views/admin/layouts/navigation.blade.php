<style>
    a.nav-link {
        color: white !important;
    }

    a.nav-link span {
        color: white !important;
    }
</style>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse sidebar-rows mt-4"
    style="padding-top: 1.25rem;">
    <div class="position-sticky sidebar-sticky">
        <ul class="nav flex-column mb-auto" style="background-color: #394e6d;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('showFormFields') }}">
                    <span data-feather="home"></span>
                    Form Fields
                </a>
            </li>
            {{-- <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span data-feather="file"></span><span> Booking Management</span><i
                        class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('customers-list') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Customer</a>
                            </li>
                            <li>
                                <a href="{{ route('safari-booking', ['type' => 'safari']) }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Safari Booking</a>
                            </li>
                            <li>
                                <a href="{{ route('safari-booking', ['type' => 'package']) }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Package Booking</a>
                            </li>
                            <li>
                                <a href="{{ route('safari-booking', ['type' => 'hotel']) }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Hotel Booking</a>
                            </li>
                            <li>
                                <a href="{{ route('safari-booking', ['type' => 'chambal_safari']) }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Chambal Safari
                                    Booking</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li> --}}

            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseEnq" aria-expanded="false" aria-controls="collapseEnq"><span
                        data-feather="message-square"></span><span> Enquiries</span><i
                        class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseEnq" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('general-enquiry-list') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Contact Enquiries</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage"> <span
                        data-feather="layers"></span>
                    <span>Page Management</span><i class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapsePage" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('page.mangement.home.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.about.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">About Us Page</a>
                            </li>

                            <li>
                                <a href="{{ route('wedding-programs-list') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Gallery Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.jungle.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">
                                    About Jim Corbett Page
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.faq.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">FAQ Page</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('page.mangement.devalia.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Chambal Safari</a>
                            </li> --}}


                            {{-- <li>
                                <a href="{{ route('page.mangement.kankai.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Kankai Safari</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.girnar.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Girnar Safari</a>
                            </li> --}}

                            {{-- <li>
                                <a href="{{ route('page.mangement.hotel.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Hotel Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.package.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Package Page</a>
                            </li> --}}

                            <li>
                                <a href="{{ route('page.mangement.contact.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Contact Page</a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.privacy.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Privacy Page</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('page.mangement.cancellation.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Cancellation Policy
                                    Page</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('page.mangement.term.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Terms & Condtion
                                    Page</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('page.mangement.reach.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">How To Reach</a>
                            </li> --}}

                            {{-- <li>
                                <a href="{{ route('page.mangement.history.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Near By Attraction</a>
                            </li> --}}


                            {{-- <li>
                                <a href="{{ route('page.mangement.doDoNot.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Do & Don't Page</a>
                            </li>



                            <li>
                                <a href="{{ route('page.mangement.permit.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Best Time To
                                    Visite</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.pricing.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Safari Pricing</a>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </li>

            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseSet" aria-expanded="false" aria-controls="collapseSet"> <span
                        data-feather="settings"></span>
                    <span>Settings</span><i class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseSet" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            {{-- <li>
                                <a href="{{ route('razorpay-setting-view') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">razor Pay</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('contact-setting-view') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Contact Details</a>
                            </li>
                            <li>
                                <a href="{{ route('news-setting-view') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Latest News</a>
                            </li>
                            <li>
                                <a href="{{ route('account-setting-view') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('password-setting-view') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">change Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="nav-link link-dark"><span data-feather="log-out"></span>
                    Logout </a>
            </li>
        </ul>
    </div>
</nav>
