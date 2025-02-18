<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausis Accommodation</title>
    <link rel="shortcut icon" href="{{ URL::asset('/assets/img/favicon.png') }}" type="image/x-icon">

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ url('frontend/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/plugins/fontawesome/css/all.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ url('frontend/css/feather.css') }}">

    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ url('frontend/plugins/boxicons/css/boxicons.min.css') }}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}">

    <!-- Animation CSS -->
    {{-- <link rel="stylesheet" href="{{ url('frontend/css/aos.css') }}"> --}}

    <!-- Slider Range CSS -->
    <link rel="stylesheet" href="{{ url('frontend/plugins/range-slider/slider-range.css') }}">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ url('frontend/plugins/fancybox/jquery.fancybox.min.css') }}">

    <!-- Bootstrap Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ url('frontend/plugins/select2/css/select2.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/frontend/css/custome.css') }}">


    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>
<body>
    @inertia
    <!-- jQuery -->
    <script src="{{ URL::asset('/frontend/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="{{ URL::asset('/frontend/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ URL::asset('/frontend/js/feather.min.js') }}"></script>

    <!-- Owl Carousel JS -->
    <script src="{{ URL::asset('/frontend/js/owl.carousel.min.js') }}"></script>

    <!-- Animation JS -->
    <script src="{{ URL::asset('/frontend/js/aos.js') }}"></script>

    <!-- Counter JS -->
    <script src="{{ URL::asset('/frontend/js/waypoints.js') }}"></script>
    <script src="{{ URL::asset('/frontend/js/jquery.counterup.min.js') }}"></script>

    <!-- Slider Range JS -->
    <script src="{{ URL::asset('/frontend/plugins/range-slider/slider-range.js') }}"></script>

    <!-- Sticky Sidebar JS -->
    <script src="{{ URL::asset('/frontend/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ URL::asset('/frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Slick JS -->
    <script src="{{ URL::asset('/frontend/plugins/slick/slick.js') }}"></script>

    <!-- Fancybox JS -->
    <script src="{{ URL::asset('/frontend/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- Bootstrap Datetimepicker JS -->
    <script src="{{ URL::asset('/frontend/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('/frontend/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ URL::asset('/frontend/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ URL::asset('/frontend/js/script.js') }}"></script>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
    <script src="{{ URL::asset('/frontend/js/map-grid.js') }}"></script>

    <script>
    function scrollToAvailableRooms() {
        const targetSection = document.getElementById('available-room');
        targetSection.scrollIntoView({ behavior: 'smooth' });
    }
    </script>

</body>
</html>
