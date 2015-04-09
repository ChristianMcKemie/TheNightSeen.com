@extends('layout')
 <title>Map</title>
@section('scripts')
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

  <script>
  $(function metismenu() {

    $('#side-menu').metisMenu();

});
</script>

@stop




<link rel="stylesheet" type="text/css" href="/css/map.css">

<body>  
 @section('content')      
<div id="map-and-select-container">
<div id="map-canvas"></div>


	 
			
  <div id="club-select" class="nano has-scrollbar"><div class="nano-content"><ul id = "club-select-list"></ul></div></div>
  <input id="pac-input" class="controls" type="text" placeholder="Where are you now?">
  </div>
 
<div id="footer" class ="footer">
	<footer style = "color:white;">
          <p>&copy; NightSeen, LLC 2015</p>
      </footer>
	  </div>
 
	

 
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
   <script type="text/javascript" src="/js/map.js"></script>
 <script type="text/javascript" src="/js/bootstrap.min.js"></script>
      @section('scripts')  
        <script src="/js/ekko-lightbox.js"></script>

        <script type="text/javascript">
            $(document).ready(function ($) {
				$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
					event.preventDefault();
					return $(this).ekkoLightbox();
				});
			});
 </script>
</body>	
	
@stop