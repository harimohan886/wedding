<!-- ALL JS FILES -->
<script src="{{ asset('/front/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/front/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('/front/assets/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<!-- ALL PLUGINS -->
<script src="{{ asset('/front/assets/js/jquery.magnific-popup.min.js') }}"></script>
{{-- <script src="{{ asset('/front/assets/js/slider-index.js') }}"></script>
<script src="{{ asset('/front/assets/js/smoothscroll.js') }}"></script> --}}
<script src="{{ asset('/front/assets/js/responsiveslides.min.js') }}"></script>
<script src="{{ asset('/front/assets/js/timeLine.min.js') }}"></script>
<script src="{{ asset('/front/assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('/front/assets/js/contact-form-script.js') }}"></script>
<script src="{{ asset('/front/assets/js/custom.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        var showChar = 125; // How many characters are shown by default
        var ellipsestext = "...";
        var moretext = "Read More";
        var lesstext = "Read Less";

        $('.readmore').each(function() {
            var content = $(this).text();
            if (content.length > showChar) {
                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);
                var html = c + '<span class="moreellipses">' + ellipsestext +
                    '&nbsp;</span><span class="morecontent">' + h +
                    '</span>&nbsp;&nbsp;<a href="#" class="morelink">' + moretext + '</a>';
                $(this).html(html);
            }
        });

        $(document).on("click", ".morelink", function(e) {
            e.preventDefault();
            var $this = $(this);
            if ($this.hasClass("less")) {
                $this.removeClass("less");
                $this.text(moretext);
            } else {
                $this.addClass("less");
                $this.text(lesstext);
            }
            $this.prev(".morecontent").toggle();
            $this.prev().prev(".moreellipses").toggle();
        });

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "1000", // Animation speed for showing the toast (300ms)
            "hideDuration": "1000", // Animation speed for hiding the toast (300ms)
            "timeOut": "1000", // Time the toast is displayed (5000ms)
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Check if success message is present
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        // Check if error message is present
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    });
</script>
