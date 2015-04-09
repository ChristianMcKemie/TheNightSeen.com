@extends('layout')
<title>Home</title>
@section('scripts')


<script type="text/javascript" src="/js/bootstrap.min.js"></script>





 
<link rel="stylesheet" type="text/css" href="/css/home.css">

@stop

@section('styles')



@stop


 @section('content')    




    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">  
  </head>
  <body>
  
  

 <div class="container homecontainer" style="">

 <div class="row homebackground" style="margin:20px 10px 10px 10px;">
 <h2 style="color:white; text-align:center;">Cities</h2>
  <!--LA-->
 <div class="col-lg-4 col-sm-6 col-xs-12" >
         <h4 style="color:white; text-align:center;">California</h4>
		<div class="city-list list-group-item">
		
		<div class="city">
		<a href="/LA">
		Los Angeles
			</a>
			</div>
		</div>
		</br>
    </div>
	
<!--DC-->
 <div class="col-lg-4 col-sm-6 col-xs-12" >
         <h4 style="color:white; text-align:center;">District of Columbia</h4>
		<div class="city-list list-group-item">
		
		<div class="city">
		<a href="/DC">
		<span style="color:rgba(255, 87, 214, 1);" class="fa fa-video-camera fa-lg"></span> Washington
			</a>
			</div>
		</div>
		</br>
    </div>
	
<!--NYC-->
 <div class="col-lg-4 col-sm-6 col-xs-12" >
         <h4 style="color:white; text-align:center;">New York</h4>
		<div class="city-list list-group-item">
		
		<div class="city">
		<a href="/NYC">
		New York
			</a>
			</div>
		</div>
		</br>
    </div>




<!--NC-->
 <div align="center" class="col-lg-4 col-sm-6 col-xs-12" style="" >
         <h4 style="color:white; text-align:center;">North Carolina</h4>
		<div class="city-list list-group-item">
		
		<div class="city">
		<a href="/ChapelHill">
		Chapel Hill
			</a>
			</div>
		
		

		
		<div class="city">
		<a href="/Raleigh">
		Raleigh
			</a>
			</div>
		
		<div class="city">
		<a href="/WilmingtonNC">
		Wilmington
			</a>
			</div>


		
		</div>

    
	
 </div><!--NC-->

<!--NV-->
 <div align="center" class="col-lg-4 col-sm-6 col-xs-12" style="" >
         <h4 style="color:white; text-align:center;">Nevada</h4>
		<div class="city-list list-group-item">
		
		<div class="city">
		<a href="/LasVegas">
		Las Vegas
			</a>
			</div>
		</div>

		
		</br>

    
	
 </div><!--NV-->

	
 </div>
 </div>



 

 </div>
	<div class ="footer">
		<hr>
	<footer style = "color:white;">
          <p>&copy; NightSeen, LLC 2015</p>
      </footer>
	  </div>
</body>
	
@stop