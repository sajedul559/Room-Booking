  <!-- jQuery -->
  <script src="{{ URL::asset('/frontend/js/jquery-3.7.1.min.js') }}"></script>

  <!-- Bootstrap Bundle JS -->
  <script src="{{ URL::asset('/frontend/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Feather Icon JS -->
  <script src="{{ URL::asset('/frontend/js/feather.min.js') }}"></script>

  {{-- @if (Route::is(['index', 'rent-property-grid-sidebar', 'rent-property-list-sidebar', 'rent-details','buy-details','blog-details'])) --}}
      <!-- Owl Carousel JS -->
      <script src="{{ URL::asset('/frontend/js/owl.carousel.min.js') }}"></script>
  {{-- @endif --}}
  {{-- @if (Route::is(['index','blog-grid'])) --}}
      <!-- Animation JS -->
      <script src="{{ URL::asset('/frontend/js/aos.js') }}"></script>

      <!-- Counter JS -->
      <script src="{{ URL::asset('/frontend/js/waypoints.js') }}"></script>
      <script src="{{ URL::asset('/frontend/js/jquery.counterup.min.js') }}"></script>
  {{-- @endif --}}
  {{-- @if (Route::is(['agent-details','buy-detail-view'])) --}}
  <!-- Owl Carousel JS -->
  <script src="{{ URL::asset('/frontend/js/owl.carousel.min.js') }}"></script>
  {{-- @endif --}}

  {{-- @if (Route::is(['rent-property-grid-sidebar', 'rent-property-list-sidebar','buy-property-grid-sidebar','buy-property-list-sidebar'])) --}}
      <!-- Slider Rrange  JS -->
      <script src="frontend/plugins/range-slider/slider-range.js"></script>
  {{-- @endif --}}

  <!-- Sticky Sidebar JS -->
  <script src="frontend/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
  <script src="frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

  {{-- @if (Route::is(['rent-details','buy-details','buy-detail-view'])) --}}
      <!-- Slick JS -->
      <script src="frontend/plugins/slick/slick.js"></script>

      <!-- Fancybox JS -->
      <script src="frontend/plugins/fancybox/jquery.fancybox.min.js"></script>
    {{-- @endif --}}
  {{-- @if (Route::is([
          'index',
          'rent-property-grid-sidebar',
          'rent-property-list-sidebar',
          'rent-details',
          'buy-details',
          'agency-details',
          'about-us',
      ])) --}}
      <!-- Owl Carousel JS -->
      <script src="{{ URL::asset('/frontend/js/owl.carousel.min.js') }}"></script>
  {{-- @endif --}}
  {{-- @if (Route::is(['index', 'pricing','faq','gallery','our-team','testimonial','terms-condition','privacy-policy'])) --}}
      <!-- Animation JS -->
      <script src="{{ URL::asset('/frontend/js/aos.js') }}"></script>
  {{-- @endif --}}
  {{-- @if (Route::is(['index', 'about-us'])) --}}
      <!-- Counter JS -->
      <script src="{{ URL::asset('/frontend/js/waypoints.js') }}"></script>
      <script src="{{ URL::asset('/frontend/js/jquery.counterup.min.js') }}"></script>
  {{-- @endif --}}

  {{-- @if (Route::is([
          'rent-property-grid-sidebar',
          'rent-property-list-sidebar',
          'buy-property-grid-sidebar',
          'buy-property-list-sidebar',
      ])) --}}
      <!-- Slider Rrange  JS -->
      <script src="{{ URL::asset('/frontend/plugins/range-slider/slider-range.js') }}"></script>
  {{-- @endif --}}

  <!-- Sticky Sidebar JS -->
  <script src="{{ URL::asset('/frontend/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
  <script src="{{ URL::asset('/frontend/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

  {{-- @if (Route::is(['rent-details', 'buy-details', 'gallery'])) --}}
      <!-- Slick JS -->
      <script src="{{ URL::asset('/frontend/plugins/slick/slick.js') }}"></script>

      <!-- Fancybox JS -->
      <script src="{{ URL::asset('/frontend/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
  {{-- @endif --}}

  {{-- @if (Route::is(['rental-order-step3'])) --}}
      <!-- Bootstrap Datetimepicker JS -->
      <script src="{{ URL::asset('/frontend/js/moment.min.js') }}"></script>
      <script src="{{ URL::asset('/frontend/js/bootstrap-datetimepicker.min.js') }}"></script>
  {{-- @endif --}}

  <!-- Select2 JS -->
  <script src="{{ URL::asset('/frontend/plugins/select2/js/select2.min.js') }}"></script>

  <!-- Custom JS -->
  <script src="{{ URL::asset('/frontend/js/script.js') }}"></script>

  @if (Route::is(['rooming-houses', 'rent-grid-map', 'rent-list-map', 'buy-grid-map', 'buy-list-map']))
      <!-- map JS -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
      <script src="{{ URL::asset('/frontend/js/map-grid.js') }}"></script>
      <script>
        function scrollToAvailableRooms() {
            const targetSection = document.getElementById('available-room');
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    </script>
    
  @endif
  
