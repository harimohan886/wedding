 <!-- Start Footer -->
 @php
     $contactDetails = App\Models\Setting::where('type', 'contact')->select('value')->first();
     $latestNews = App\Models\Setting::where('type', 'news')->value('value');
 @endphp
 <footer>
     <div class="footer-box">
         <div class="container">
             <div class="row border_bo1 ">
                 <div class="col-md-4">
                     <a class="logof" href="{{ route('home') }}">
                         <img src="{{ asset('/front/assets/img/logo.png') }}" alt="#" />
                     </a>
                     <form class="form_subscri">
                         <div class="row">
                             <div class="col-md-12">
                                 <h3>Subscribe Now</h3>
                             </div>
                             <div class="col-md-12">
                                 <input class="subsrib" placeholder="Enter your email" type="text"
                                     name="Enter your email">
                             </div>
                             <div class="col-md-12">
                                 <button class="subsci_btn">Subscribe</button>
                             </div>
                         </div>
                     </form>
                 </div>
                 <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                         <h3 style="color: var(--primary)">Information</h3>
                         <ul>
                             <a href="{{ route('privacy-policy') }}">
                                 <li>Privacy Policy </li>
                             </a>
                             <a href="{{ route('terms-and-conditions') }}">
                                 <li>
                                     Terms & Condition
                                 </li>
                             </a>
                             <a href="{{ route('about') }}">
                                 <li>
                                     About Us
                                 </li>
                             </a>
                             <a href="{{ route('contact') }}">
                                 <li>
                                     Contact us
                                 </li>
                             </a>
                             <a href="{{ route('faq') }}">
                                 <li>
                                     Faq
                                 </li>
                             </a>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="infoma">
                         <h3 style="color: var(--primary)">Contact Us</h3>
                         <ul class="conta">
                             <li>
                                 <i class="fa fa-map-marker" aria-hidden="true"></i>
                                 {{ $contactDetails->value['address'] }}
                             </li>
                             <li>
                                 <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                 <a class="text-decoration-none" href="tel:{{ $contactDetails->value['phone'] }}">
                                     {{ $contactDetails->value['phone'] }}
                                 </a>,&nbsp;
                                 <a class="text-decoration-none" href="tel:{{ $contactDetails->value['alt_phone'] }}">
                                     {{ $contactDetails->value['alt_phone'] }}
                                 </a>
                             </li>
                             <li>
                                 <i class="fa fa-envelope" aria-hidden="true"></i>
                                 <a class="text-decoration-none" href="mailto:{{ $contactDetails->value['email'] }}">
                                     {{ $contactDetails->value['email'] }}
                                 </a>
                             </li>
                         </ul>
                         <ul class="social_icon">
                             <li>
                                 <a href="Javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                             </li>
                             <li>
                                 <a href="Javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                             </li>
                             <li>
                                 <a href="Javascript:void(0)"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="infoma">
                         <h3 style="color: var(--primary)">Destination Wedding</h3>
                         <p>
                             {{ $latestNews['news'] }}
                         </p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="copyright">
             <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <p class="footer-company-name">All Rights Reserved. &copy; 2024
                             <a href="{{ route('home') }}">Jim Corbett Wedding</a>
                             Design By :
                             <a href="https://junglesafariindia.in/">Jungle Safari India</a>
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
