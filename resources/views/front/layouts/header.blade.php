 <!-- Start header -->
 <header class="top-header">
     <div class="top-bar">
         <ul class="menu">
             <li>
                 <a class="text-decoration-none" href="tel:{{ $contact->value['alt_phone'] }}">
                     <i class="fa-solid fa-phone-volume"></i>
                     {{ $contact->value['alt_phone'] }}
                 </a>
             </li>
             <li>
                 <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode($whatsappMessage) }}" target="_blank">
                     <i class="fa-brands fa-whatsapp"></i>
                     {{ $whatsappNumber }}
                 </a>
             </li>
             <li>
                 <a class="text-decoration-none" href="mailto:{{ $contact->value['email'] }}">
                     <i class="fa-solid fa-envelope"></i>
                     {{ $contact->value['email'] }}
                 </a>
             </li>
         </ul>
     </div>
     <nav class="navbar header-nav navbar-expand-lg">
         <div class="container">
             <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('/front/assets/img/logo.png') }}"
                     alt="image"></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd"
                 aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                 <span></span>
                 <span></span>
                 <span></span>
             </button>
             <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                 <ul class="navbar-nav">
                     <li><a class="nav-link active " href="{{ route('home') }}">Home</a></li>
                     <li><a class="nav-link " href="{{ route('about') }}">About Us</a></li>
                     <li><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                     <li><a class="nav-link" href="{{ route('aboutjimcorbett') }}">About Jim Corbett</a></li>
                     <li><a class="nav-link" href="{{ route('faq') }}">Faq's</a></li>
                     <li><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                 </ul>
             </div>
         </div>
     </nav>
 </header>
