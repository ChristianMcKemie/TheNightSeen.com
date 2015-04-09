@extends('layout')

 <title>Seen</title>
@section ('script')
<script src="https://code.jquery.com/jquery.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
   <script type="text/javascript" src="/js/map.js"></script>
@stop   

 @section('content')       
        


		<link rel="stylesheet" type="text/css" href="/css/map.css">
        <link href="/css/ekko-lightbox.css" rel="stylesheet">
        <link href="/css/dark.css" rel="stylesheet">


  
<body>  
       
<div id="map-and-select-container">
<div id="map-canvas"></div>
  <div id="club-select"><ul id = "club-select-list"></ul></div>
  <input id="pac-input" class="controls" type="text" placeholder="Where are you now?">
  </div>
 

<div class="modal fade mapmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>
 
 	<div id="footer" class ="footer">
	<footer style = "color:white;">
          <p>&copy; NightSeen, LLC 2015</p>
      </footer>
	  </div>



 </body>

 
 
 @stop