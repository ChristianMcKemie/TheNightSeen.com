<!doctype html>
<html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

   <head>
   
   
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Core CSS - Include with every page -->
    <link rel="stylesheet" href="/css/nanoscroller.css">
	<link href="/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="/css2/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/search.css">

    <!-- SB Admin CSS - Include with every page -->
    <link href="/css2/sb-admin.css" rel="stylesheet">  
   <link rel="stylesheet" href="/css/nav-and-sidebar.css">


  @yield('styles')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/searchajax.js"></script>
	<script type="text/javascript" src="/js/jquery.nanoscroller.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/respond.min.js"></script>
<script type="text/javascript" src="/js/html5shiv.js"></script>
    <!-- Core Scripts - Include with every page -->

    <script src="/js2/plugins/metisMenu/jquery.metisMenu.js"></script>
<script type="text/javascript">
$(function(){

  $('.nano').nanoScroller({
    preventPageScrolling: true
  });



});
 </script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="/js2/sb-admin.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
  var submitIcon = $('.searchbox-icon');
  var inputBox = $('.searchbox-input');
  var searchBox = $('.searchbox');
  var isOpen = false;
  submitIcon.click(function(){
   if(isOpen === false){
   searchBox.removeClass('searchname-closed');
   searchBox.removeClass('searchbox-closed');
    searchBox.addClass('searchbox-open');
    inputBox.focus();
	
    isOpen = true;
   } else {
   searchBox.addClass('searchname-open');
   searchBox.addClass('searchname-closed');
    searchBox.removeClass('searchbox-open');
	searchBox.addClass('searchbox-closed');
    inputBox.focusout();
    isOpen = false;
   }
  }); 
 });
 </script>	 

  
<script type="text/javascript">
 $(document).ready(function(){
  var submitIcon = $('.searchbox-icon');
  var inputBox = $('.searchbox-input');
  var searchBox = $('.searchbox');
  var isOpen = false;
  submitIcon.click(function(){
   if(isOpen === false){
   searchBox.removeClass('searchname-closed');
   searchBox.removeClass('searchbox-closed');
    searchBox.addClass('searchbox-open');
    inputBox.focus();
	
    isOpen = true;
   } else {
   searchBox.addClass('searchname-open');
   searchBox.addClass('searchname-closed');
    searchBox.removeClass('searchbox-open');
	searchBox.addClass('searchbox-closed');
    inputBox.focusout();
    isOpen = false;
   }
  }); 
 });
 </script>	 

 
  <script type="text/javascript">
   $(function() {

$('.menu-open').hide();
$('.menu-icon').on('click',
                          function() 
                       {
                           $('.menu-open').toggle()
                       }
                       );
					  
					    });
					   
 </script>	
 
 
 
 <script type="text/javascript">
 $(document).ready(function(){
  var MenuIcon = $('.menu-icon');
  var Open = false;
  
  MenuIcon.click(function(){
   if(Open === false){
      
   MenuIcon.addClass('menu-icon-open');

  
    Open = true;
   } 
   
   else {
   MenuIcon.removeClass('menu-icon-open');
   Open = false;
   }
  }); 
 });
 </script>


 
 
 
@yield('scripts')


 

</head>
<body>
     <div id="Menu" class="nano has-scrollbar Menu menu-open">
	 <div class="nano-content">
	 
<ul class="nav" id="side-menu">
            <div class="nav navbar-sidemenu-left">
			
			<li class="nav nav-second-level" title="Search">

<div class="search">

    {{ Form::open(array('url' =>'/Search','class'=>'searchbox-left searchname-open-left searchname-open-left searchbox-open-left' )) }}

    {{ Form::text('query', null, array('class'=>'searchbox-input-left' )) }}

	<span class="searchbox-icon-left"><div class="searchname-left" style="color:rgba(153, 153, 153, 0); margin:left:auto; margin-top:8px;">Search</div><img src="/magsmall.png" alt="Map"></span>
		
    {{ Form::submit('Search',array('class'=>'searchbox-submit' )) }}

    {{ Form::close() }}

</div>
			
					
				
</li>
  	  
                <li class="nav nav-second-level"><a title="Home" href="/home"><img src="/homelink.png" alt="Home"> Home</a></li>
						<li class="nav nav-second-level" ><a title="Map" href="/map"><img src="/dot.png" alt="Map"> Map</a></li> 
                
 
                <!-- /.dropdown -->
            </div>
				   
                        
							  <?php		$id = Auth::id();  	
	$cities = Follow:: where('user_id', '=', ''.$id.'')->distinct()->get(array('city'));
	     	?>
					@if ( Auth::check() === true)           
     
	   <li class="active">
                            <a href="#">
								
							 {{$name = User::where('id', '=', ''.$id.'')->pluck('first_name');}}
					{{$name2 = User::where('id', '=', ''.$id.'')->pluck('last_name');}}  
							
						<span class="fa arrow"></span>
							</a>
                    
                       
                    
					
					
					
                    <ul class="nav nav-second-level">
                        <li><a href="/profile"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <!--li><a href="#"><i class="fa fa-gear fa-fw fa-spin"></i> Settings</a>
                        </li-->
                        <li>
						<?php echo Form::open(array('name' => 'logout', 'url' => '/logout')); ?>
						<a href="#" onclick="document.logout.submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </form>
						</li>
                    </ul>
						
                    <!-- /.dropdown-user -->
                </li> 
			
     
	  @endif
	  

	  
	  
                        @for ($i=0; $i < count($cities); $i++)
                    
            
	  	  
	 
                        <li>
                            <a href="#">
							<i class="fa fa-heart fa-fw"></i>
							
							{{$cities[$i]['city']}}
							
						<span class="fa arrow"></span>
							</a>
                            
							
							
							<ul class="nav nav-second-level">
                                
								<?php $follow2 = Follow::where('city', '=', ''.$cities[$i]["city"].'')->where('user_id', '=', ''.$id.'')->get() ?>
								@for ($s=0; $s < count($follow2); $s++)
								
								
								
								
								
								
								<li>
                                    <a href="/{{$followedclub = Club::where('id', '=', ''.$follow2[$s]["club_id"].'')->pluck('cityurl');}}/{{$followedclub = Club::where('id', '=', ''.$follow2[$s]["club_id"].'')->pluck('url');}} ">
									
									
									
									{{$followedclub = Club::where('id', '=', ''.$follow2[$s]["club_id"].'')->pluck('name');}}
									
									
									
									</a>
                                </li>
                               
							   
							   @endfor
						
							   
							   
							   
							   
							   
                            </ul>
                            <!-- /.nav-second-level -->
                        
						
						
						
						</li>
						
						
						@endfor
						
						
						
						
						
						
						
						
						
                    </ul>
                    <!-- /#side-menu -->

	 
	 </div> </div> 


 <div class="size">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

<div id="main-nav" class="size">

<div id="nav-logo-left" class="nav navbar-nav navbar-top-links navbar-left">
<span class="menu-icon" title="Menu">
<i class="fa fa-bars"></i><span class="logo-container" style="outline:0;"><img src="/tinySeen.png"></span></span>beta
</div> <!--nav-logo-left-->
<ul class="nav navbar-nav navbar-top-links navbar-right">
                <li><a title="Home" href="/home">Home <img src="/homelink.png" alt="Home"></a></li>
						<li><a title="Map" href="/map">Map<img src="/dot.png" alt="Map"></a></li> 
              
          <li title="Search">

<div class="search">

    {{ Form::open(array('url' =>'/Search','class'=>'searchbox searchname-open searchname-closed searchbox-closed' )) }}

    {{ Form::text('query', null, array('class'=>'searchbox-input' )) }}

	<span class="searchbox-icon"><div class="searchname" style=" margin:left:auto; margin-top:8px;">Search</div><img src="/magsmall.png" alt="Search"></span>
		
    {{ Form::submit('Search',array('class'=>'searchbox-submit' )) }}

    {{ Form::close() }}

</div>
		  
 <!--form class="searchbox searchname-open searchname-closed searchbox-closed">  
 <input id="searchbox2" type="text" name="search" class="searchbox-input">
 <input type="submit" class="searchbox-submit">
 <span class="searchbox-icon"><div class="searchname" style=" margin:left:auto; margin-top:8px;">Search</div><img src="/magsmall.png" alt="Map"></span>
 </form>
<ul id="results" style="background: #000000;

overflow: auto;
border: 1px solid red;
position: absolute;
top:48px;
width: 200px;
z-index: 99;">
</ul-->
					
				
</li> 
                <!-- /.dropdown -->
            </ul>

</div>


</nav>
 </div>

        
		@yield('content')
      
       
        <!-- /#page-wrapper -->



</body>
</html>