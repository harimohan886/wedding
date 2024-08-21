<!DOCTYPE html>
<html lang="en"><!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>Jim Corbett Wedding</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('/front/assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('/front/assets/img/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/front/assets/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('/front/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('/front/assets/css/responsive.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/front/assets/css/custom.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
    @php
        $contact = App\Models\Setting::where('type', 'contact')->select('value')->first();
        $whatsappNumber = $contact->value['phone'];
        $whatsappMessage = 'Hello, I would like to know more about your services.';
    @endphp

    <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode($whatsappMessage) }}" class="whatsapp-float"
        target="_blank">
        <img src="{{ asset('/front/assets/img/whatsapp.png') }}" alt="WhatsApp">
    </a>

    @include('front.layouts.header')
    @yield('content')
    @include('front.layouts.footer')
    @include('front.layouts.footer-script')
    @stack('scripts')
    <script>
        $(document).ready(function() {
            $("#mobile_no").keyup(function() {
                if ($("#mobile_no").val().length == 10 && $('#name').val() != '') {

                    var type = $('#type').val();
                    var name = $('#name').val();

                    switch (type) {
                        case 'general':
                            var formData = {
                                type: type,
                                name: name,
                                mobile_no: mobile_no
                            };
                            break;
                        case 'package':
                            var formData = {
                                type: type,
                                name: name,
                                mobile_no: mobile_no,
                                package_name: package_name
                            };
                            break;
                        case 'hotel':
                            var formData = {
                                type: type,
                                name: name,
                                mobile_no: mobile_no,
                                hotel_name: hotel_name
                            };
                            break;
                        case 'chambal_package':
                            var formData = {
                                type: type,
                                mode: mode,
                                name: name,
                                email: email,
                                booking_date: booking_date,
                                mobile_no: mobile_no
                            };
                            break;
                        case 'safari':
                            var formData = {
                                type: type,
                                booking_date: booking_date,
                                mode: mode,
                                zone: zone,
                                timeslot: timeslot,
                                name: name,
                                mobile_no: mobile_no
                            };
                            break;
                        default:
                            break;
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: '{{ route('save-enquiry') }}',
                        data: JSON.stringify(formData),
                        contentType: 'application/json',
                        dataType: "json",
                        success: function(data) {
                            console.table("Success:", data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error:", textStatus, errorThrown);
                        }
                    });

                }
            });
        });
    </script>
</body>

</html>
