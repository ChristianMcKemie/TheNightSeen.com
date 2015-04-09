function initialize() {
var previousPosition;
  var markers = [];
  var markers2 = [];
  var citymarkers = [];	
  var infowindow = new google.maps.InfoWindow();	
		
var mapOptions = {
          center: new google.maps.LatLng(40.5772096,-94.5376477),
          zoom: 4
		  ,
			styles:[
  { featureType: "all",
    "stylers": [
      { "visibility": "on" },
      { "invert_lightness": true },
      { "hue": "#00eeff" },
      { "saturation": -54 },
      { "lightness": 5 },
      { "gamma": 0.91 }
	  
    ]},{ featureType: "poi",
    elementType: "labels",
    "stylers": [
      { "visibility": "off" }
    ]
  }
]
   };
  
  
    

  

  
  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

   
  

  


 loadMapState();	
	
	
google.maps.event.addListener(map, 'click', function() {
    if (infowindow) {
        infowindow.close();
    }
});
	
google.maps.event.addListener(map, 'tilesloaded', tilesLoaded);



function tilesLoaded() {	
    google.maps.event.addListener(map, 'zoom_changed', saveMapState);
    google.maps.event.addListener(map, 'dragend', saveMapState);			  
   zoom = map.getZoom();
   if (zoom >= 11)
   { 
   
     
   
   
   for( var i = 0, n = citymarkers.length; i < n; ++i ) {
      citymarkers[i].setMap(null);
    }
   
   // First, determine the map bounds
    var bounds2 = map.getBounds();
	document.getElementById('club-select-list').innerHTML="";
	
    // Then the points
    var swPoint = bounds2.getSouthWest();
    var nePoint = bounds2.getNorthEast();

    // Now, each individual coordinate
    var swLat = swPoint.lat();
    var swLng = swPoint.lng();
    var neLat = nePoint.lat();
    var neLng = nePoint.lng();
   
   
   //Load Markers from the XML File, Check (map_process.php)
			$.get("http://thenightseen.com/map/ajax?swLat="+swLat+"&swLng="+swLng+"&neLat="+neLat+"&neLng="+neLng+"", function (data) {
				$(data).find("marker").each(function () {
					  var dot = "";
					  var id 		= $(this).attr('id');
					  var camera	= $(this).attr('Camera');
					  var name 		= $(this).attr('name');
					  var url      =  $(this).attr('url');
					  var city 		= $(this).attr('city')
					  var address 	= '<p>'+ $(this).attr('address') +'</p>';
					  var type 		= $(this).attr('type');
					  var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
					  if (camera == '0')
					  {
					  dot = "/dot.png";
					  }
					  else
					  {
					  dot = "/dot4.png";
					  }
					  
					  
					  create_marker(id, point, name, address, city, url,dot);
					  document.getElementById('club-select-list').innerHTML += '<li><a href="'+city+'/'+url+'" data-toggle="modal" data-title="'+name+'" style="width:400px;">'+name+'</a></li>';
					  
					  
				});
			});	
}
if (zoom < 11)
{
document.getElementById('club-select-list').innerHTML="";
for( var i = 0, n = markers2.length; i < n; ++i ) {
      markers2[i].setMap(null);
    }

	var ny = new google.maps.Marker({
	 icon: "/dot.png",
      position: new google.maps.LatLng(40.7577913,-73.9860123),
      map: map,
      title: 'New York, NY'
	  
  });
  
  var la = new google.maps.Marker({
	 icon: "/dot.png",
      position: new google.maps.LatLng(34.0533906,-118.2449538),
      map: map,
      title: 'Los Angeles, CA'
	  
  });

var vegas = new google.maps.Marker({
	 icon: "/dot.png",
      position: new google.maps.LatLng(36.1174941,-115.1664428),
      map: map,
      title: 'Las Vegas, NV'
	  
  });
	
var dc = new google.maps.Marker({
	 icon: "/dot4.png",
      position: new google.maps.LatLng(38.907222,-77.036566),
      map: map,
      title: 'Washington, D.C.'
	  
  });

var raleigh = new google.maps.Marker({
	 icon: "/dot.png",
      position: new google.maps.LatLng(35.780395,-78.639108),
      map: map,
      title: 'Raleigh, NC'
	  
  });


  
  var chapelhill = new google.maps.Marker({
	 icon: "/dot.png",
      position: new google.maps.LatLng(35.9131356,-79.055801),
      map: map,
      title: 'Chapel Hill, NC'
	  
  });

citymarkers.push(la, ny, vegas, dc, chapelhill, raleigh)
document.getElementById('club-select-list').innerHTML =
'<li><a href="/nyc">New York, NY</a></li>'+
'<li><a href="/lasvegas">Las Vegas, NV</a></li>'+
'<li><a href="/la">Los Angeles, CA</a></li>'+
'<li><a href="/dc">Washington, D.C.</a></li>'+
'<li><a href="/raleigh">Raleigh, NC</a></li>'+
'<li><a href="/chapelhill">Chapel Hill, NC</a></li>';



    google.maps.event.addListener(la, 'click', function() {
    map.panTo(this.getPosition());
    map.setZoom(13);
  });

   google.maps.event.addListener(ny, 'click', function() {
    map.panTo(this.getPosition());
    map.setZoom(13);
  }); 
  
     google.maps.event.addListener(vegas, 'click', function() {
    map.panTo(this.getPosition());
    map.setZoom(13);
  });  

   google.maps.event.addListener(dc, 'click', function() {
    map.panTo(this.getPosition());
    map.setZoom(13);
  });  
  
     google.maps.event.addListener(chapelhill, 'click', function() {
    map.panTo(this.getPosition());
    map.setZoom(13);
  }); 

google.maps.event.addListener(raleigh, 'click', function() {
    map.panTo(this.getPosition());
    map.setZoom(13);
  });  

 

}
		
		}		
			
			


/////////////////////////////////////////////////////////////////////////////////////////////////////
  // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
 
  
  var clubselect = /** @type {HTMLInputElement} */(
      document.getElementById('club-select'));
  map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(clubselect);	

  var copyright = /** @type {HTMLInputElement} */(
      document.getElementById('footer'));
  map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(copyright);	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));

  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    // For each place, get the icon, place name, and location.
    markers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: '/homelink.png',
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(40, 40)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      markers.push(marker);

      bounds.extend(place.geometry.location);
    }
if (bounds.getNorthEast().equals(bounds.getSouthWest())) {
       var extendPoint1 = new google.maps.LatLng(bounds.getNorthEast().lat() + 0.02, bounds.getNorthEast().lng() + 0.01);
       var extendPoint2 = new google.maps.LatLng(bounds.getNorthEast().lat() - 0.02, bounds.getNorthEast().lng() - 0.01);
       bounds.extend(extendPoint1);
       bounds.extend(extendPoint2);
    }
    map.fitBounds(bounds);
  });

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });

  
 ////////////////////////////////////////////////////////////////////////////////functions 
function saveMapState() { 
    var mapZoom=map.getZoom(); 
    var mapCentre=map.getCenter(); 
    var mapLat=mapCentre.lat(); 
    var mapLng=mapCentre.lng(); 
    var cookiestring=mapLat+"_"+mapLng+"_"+mapZoom; 
    setCookie("myMapCookie",cookiestring, 30); 
} 

function loadMapState() { 
    var gotCookieString=getCookie("myMapCookie"); 
    var splitStr = gotCookieString.split("_");
    var savedMapLat = parseFloat(splitStr[0]);
    var savedMapLng = parseFloat(splitStr[1]);
    var savedMapZoom = parseFloat(splitStr[2]);
    if ((!isNaN(savedMapLat)) && (!isNaN(savedMapLng)) && (!isNaN(savedMapZoom))) {
        map.setCenter(new google.maps.LatLng(savedMapLat,savedMapLng));
        map.setZoom(savedMapZoom);
    }
	else{
	// Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

  

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
	
	}
}

function setCookie(c_name,value,exdays) {
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name) {
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++)
    {
      x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
      y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
      x=x.replace(/^\s+|\s+$/g,"");
      if (x==c_name)
        {
        return unescape(y);
        }
      }
    return "";
}

		
//############### Create Marker Function ##############
	function create_marker(id, MapPos, MapTitle, Mapaddress, city, url, iconPath)
	{	  	  		  
		
		//new marker
		var marker = new google.maps.Marker({
			position: MapPos,
			map: map,
			icon: iconPath,
			title: MapTitle
		});
		markers2.push(marker);
		



		//Content structure of info Window for the Markers
		var contentString = $('<div class="marker-info-win">'+
		'<div class="marker-inner-win"><span class="info-content">'+
		'<h1 class="marker-heading"><a href="/'+city+'/'+url+'" style="width:400px;">'+MapTitle+'</a></h1>'+
		

		Mapaddress+'</span></div>');	

		
		

		
		
google.maps.event.addListener(marker, 'click', function() {
				//Create an infoWindow
		
		//set the content of infoWindow
		infowindow.setContent(contentString[0]);
				infowindow.open(map,marker); // click on marker opens info window 
	    });
		
	}
			




 
}




google.maps.event.addDomListener(window, 'load', initialize);
