@extends('searchpagelayout')
<title>Search</title>
@section('scripts')
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script>
  $(function metismenu() {

    $('#side-menu').metisMenu();

});
</script>

@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/city.css">


@stop


 @section('content')    




    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">  
  </head>
  
  
  
 


  
 <div id="background">
 <div class="container" style="border-radius:10px 10px 10px 10px; background-color:rgba(12, 231, 248, 0.14);">

 <div class="row" style="margin:10px;">
 <h2 style="color:white; text-align:center;">Search Results: {{$key}}</h2>
 @for ($i=0; $i < count($clubs); $i++)
 
  
    <div class="col-lg-4 col-sm-6 col-xs-12" >
        <a style="
		border-radius:7px;
border-right:1px solid #fff;
border-left:1px solid #fff;
border-top:1px solid #fff;
border-bottom:1px solid #fff;
padding: 0px;
		color:white; height:150px; background:url(/pictures/{{$clubs[$i]['cityurl']}}/{{$clubs[$i]['url']}}/banner1.jpg); -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;" href="/{{$clubs[$i]['cityurl']}}/{{$clubs[$i]['url']}}" class="list-group-item">
		
		<div style="background-color:rgba(8, 126, 136, .77); padding:8px; border-radius:6px 6px 0px 0px;">
		@if($clubs[$i]['Camera'] == '1')
		
		<span style="color:rgba(255, 87, 214, 1);" class="fa fa-video-camera fa-lg"></span>
		
		@endif
		{{$clubs[$i]['name']}}
			
		<div class="pull-right">
		@for ($s=1; $s <= 5 ; $s++)
                      <span class="glyphicon glyphicon-star{{ ($s <= $clubs[$i]['rating_cache']) ? '' : '-empty'}}"></span>
                    @endfor
		</div>
		<div class="pull-bottom">
		
		
		{{$clubs[$i]['city']}}
		</div>
</div>		
		</a>
		
		</br>
    </div>
	
  
   @endfor
 </div>

 </div>
 </div>
	<div class ="footer">
		<hr>
	<footer style = "color:white;">
          <p>&copy; NightSeen, LLC 2015</p>
      </footer>
	  </div>		

	
@stop