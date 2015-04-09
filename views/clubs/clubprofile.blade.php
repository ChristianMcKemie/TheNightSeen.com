@extends('layout')
<title>{{$club->name}}</title>
@section('scripts')
  {{HTML::script('/js/expanding.js')}}
  {{HTML::script('/js/starrr.js')}}
  <script src="/js/responsiveslides.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/favoriteajax.js"></script>
	     



<script>
  $(function() {
    $(".rslides").responsiveSlides(
	{
	timeout:8000, 
	nav:true,
	Namespace:"transparent-btns"
	
	
	
	});
  });
</script>

  <script>
  
  
  $(function metismenu() {

    $('#side-menu').metisMenu();

});


	$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
}) 
</script>
  <script type="text/javascript">
    $(function(){

      // initialize the autosize plugin on the review text area
      $('#new-review').autosize({append: "\n"});

      var reviewBox = $('#post-review-box');
      var newReview = $('#new-review');
      var openReviewBtn = $('#open-review-box');
      var closeReviewBtn = $('#close-review-box');
      var ratingsField = $('#ratings-hidden');

      openReviewBtn.click(function(e)
      {
        reviewBox.slideDown(400, function()
          {
            $('#new-review').trigger('autosize.resize');
            newReview.focus();
          });
        openReviewBtn.fadeOut(100);
        closeReviewBtn.show();
      });

      closeReviewBtn.click(function(e)
      {
        e.preventDefault();
        reviewBox.slideUp(300, function()
          {
            newReview.focus();
            openReviewBtn.fadeIn(200);
          });
        closeReviewBtn.hide();
        
      });

      // If there were validation errors we need to open the comment form programmatically 
      @if($errors->first('comment') || $errors->first('rating'))
        openReviewBtn.click();
      @endif

      // Bind the change event for the star rating - store the rating value in a hidden field
      $('.starrr').on('starrr:change', function(e, value){
        ratingsField.val(value);
      });
    });
  </script>
  
    
  
@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="/css/home.css">
<link href="/css/profile.css" rel="stylesheet">
   <script src="/js/flowplayer-3.2.13.min.js"></script>
    <link rel="stylesheet" href="/css/responsiveslides.css">

@stop

@section('content')
    <div id="from-top" style ="margin-top:60px;">
	

	
	
	<div class="container" style="overflow-y:hidden;  border-radius:0px 0px 10px 10px; background-color:rgba(12, 231, 248, 0.14);">
	
	
	<div class="row">

        <div class="row row-offcanvas row-offcanvas-right" >
            
           <div class="col-xs-12 col-sm-9" style="background:transparent;">   
              
			  </br>
			  




@if($club->Camera == '1')
<div id="playcontain" style="">
   <a id='picToggle' style="cursor:pointer;position:absolute;z-index:4;padding:5px 2px;"><span style="color:rgba(255, 87, 214, 1);" class="fa fa-camera fa-lg"> Streams run 7pm Thursday - 4am Sunday</span></a>	
@if(Agent::isiOS())
 <div id="player" style="width:100%;height:100%;">
<video controls autoplay width="100%" height="100%">
    <source  src="http://71.77.45.223:8081/{{$club->camstream}}/playlist.m3u8"/>
</video>
</div>
@endif

@if(Agent::isAndroidOS())
<div id="player" style="width:100%;height:100%; margin-top:-10px;"><h4 class="pull-right" style=" padding-top:10px; padding-right:5px;color:rgba(255, 87, 214, 1);">Android support coming soon</h4></div>

@else
<div id="player" style="width:100%;height:100%;"></div>
@endif
			 			  
  
 	
			


<a id='vidToggle' style="cursor:pointer;position:absolute;z-index:4;padding:5px 2px;"><span style="color:rgba(255, 87, 214, 1);" class="fa fa-video-camera fa-lg"></span></a>		          
	
          <!-- Slideshow 1 -->
    <ul class="rslides transparent-btns transparent-btns2" id="slider" style="height:100%; width:100%;">
        
<?php



$directory = "/var/www/Seen/public/pictures/{$club->cityurl}/{$club->url}/*";


$filecount = count(glob($directory));




?>
		
	@for ($i=1; $i <= $filecount ; $i++)	
	
      <li><img src="/pictures/{{$club->cityurl}}/{{$club->url}}/banner{{$i}}.jpg" style="width: 100%; height: 100%;">
</li>

 
@endfor


 </ul>
	
	
	
		  </div>
		  
		  

		 	  		  

@else	


		<div id="playcontain" style="color:white;">  


	
          <!-- Slideshow 1 -->
    <ul class="rslides transparent-btns transparent-btns2" id="slider" style="height:100%; width:100%;">
        
<?php



$directory = "/var/www/Seen/public/pictures/{$club->cityurl}/{$club->url}/*";


$filecount = count(glob($directory));




?>
		
	@for ($i=1; $i <= $filecount ; $i++)	
	
      <li><img src="/pictures/{{$club->cityurl}}/{{$club->url}}/banner{{$i}}.jpg" style="width: 100%; height: 100%;">
</li>

 
@endfor


 </ul>
 

 

</div>		@endif	  
@if (Auth::check())
	<?php $admin = Auth::user()->user_type;?>

			  
@if($admin == 10)
<div class="alert alert-success">
                     <a href="/{{$club->cityurl}}/{{$club->url}}/edit" class="btn btn-info">Edit</a>

					 <a data-toggle="modal"  data-target="#smallModaladd" id="add"  class="btn btn-primary">Add</a>
<a href="/approval" class="btn btn-info">Content Approval</a>					 
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                 
					   </div>
					   
					   
					   
		 <!--add model-->
					   
					   
					   
					   	<div style =""  class="modal fade in" id="smallModaladd" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
      <div style=" width: 310px; margin-top:15%;" class=" modal-dialog modal-sm">
        
          
            
       <button type="button" class="close" style= "size:20px; color:white;" data-dismiss="modal" aria-hidden="true">&times;</button>     
        
        
          
<div style="" id="logform">
 {{Form::open(array('url' => '/addclub', 'class' => 'box login'));}}
 

 
<fieldset style="margin-left:30px; margin-right:30px">
    </br>
   <span style = "color:#3071a9; font-size:20px;">Add a bar or club:</span>
  </br>
  </br>
  
  <input placeholder=" Name" style="width:100%;" class="form-control" type="text" tabindex="1" name="name" required>
  </br>
  
    <input placeholder=" url" style="width:100%;" class="form-control" type="text" tabindex="1" name="url" required>
	</br>

    <input placeholder=" city" style="width:100%;" class="form-control" type="text" tabindex="1" name="city" required>
	</br>

  <input placeholder=" cityurl" style="width:100%;" class="form-control" type="text" tabindex="1" name="cityurl" required>
  </br>

  <input type="submit" class=" btn btn-info btnLogin pull-right" value="Add" tabindex="3">
</br>
  </br>  
  </fieldset>
  </form>
  </div>


 


 



</div>
			

      
 </div><!--end add model-->
     
					   
					   
@endif			  
	
@endif	


	
		  
		  <div style="color:white;">
			  
		<div class="pull-left" style="padding-top: 5px;">
		{{$club->name}}
		<p>
		{{$club->address}}
		</br>
		{{$club->phone}}
		</p>
		</div>
		<div class="pull-right" style="padding-top: 5px;"
                    <p>
					@for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $club->rating_cache) ? '' : '-empty'}}"></span>
                    @endfor
                    {{ number_format($club->rating_cache, 1);}}
					</p>
                  <p class="pull-right">
				   {{$club->rating_count}} {{ Str::plural('review', $club->rating_count);}}
			
				  </p>
				  
				  </br>
				   @if ( Auth::check() === true)  
  <div id="favoritebtn" class="pull-right">
      <?php  
$id = Auth::id(); 
$follow = Follow::where('club_id', '=', ''.$club->id.'')->where('user_id', '=', ''.$id.'')->pluck('id');	  
		
if (!$follow) 
{ 
 echo '

 
 <span onclick="favorite();" id="favorite" data-userid="'.$id.'" data-clubid="'.$club->id.'" data-city="'.$club->city.'" style="float:right; color:white; cursor:pointer;" class=""><i class="fa fa-heart fa-fw"></i> favorite</span>
 
';
 }
else
{
 echo '
 
 <span onclick="unfavorite();" id="unfavorite" data-userid="'.$id.'" data-clubid="'.$club->id.'" data-city="'.$club->city.'" style="float:right; color:white; cursor:pointer;" class=""><i class="fa fa-heart-o fa-fw"></i> unfavorite</span>
 ';
}
?>
  
</div>
@endif			
				  
		</div></div>
		

		
		
<br><br><br><br><br> 

	
				
			  
			  <div class="row" style=" width:100%; display:inline;">
            	<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#Reviews" data-toggle="tab" >Reviews</a></li>
  <li> <a href="#Overview" data-toggle="tab">Overview</a></li>
  <li><a href="#Info" data-toggle="tab">Info</a></li>
  <li><a href="#Tweets" data-toggle="tab"><i class="fa fa-twitter fa-fw"></i> Tweets</a></li>
 
</ul>
</br>
<!-- Tab panes -->
<div class="tab-content">

  <div class="tab-pane fade" id="Overview" style="color:height:400px;border:5px solid white; background-color: rgba(255, 255, 255, 0.7); border-radius:4px;">
  
  <div class="caption-full" style="padding:5px 20px 5px 20px;">
                  
				  
				  </br>
				  
				 <p style=" font-weight: bold; color:#087E88;">{{$club->long_description}}
					</br></br>
				  <a class="" href="{{$club->webaddress}}" target="_blank">-{{$club->webaddress}}</a>	</p>		  
              </div>
  
  
  </div>
  <div class="tab-pane fade" id="Tweets">
  
    
  <a class="twitter-timeline" data-theme="light"
		  data-link-color="#0099ff" 
		  
		  data-show-replies="false"
		  data-screen-name="{{$club->handle}}" href="https://twitter.com/{{$club->handle}}"
		  data-widget-id="534874550077759488">Tweets by {{$club->handle}}</a>
		  
		  
		  <script>
		  !function(d,s,id){
		  var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
		  
		  if(!d.getElementById(id)){js=d.createElement(s);
		  
		  js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		  
		  </script>
  
  
  </div>
  <div class="tab-pane fade" id="Info" style="height:400px;border:5px solid white; background-color: rgba(255, 255, 255, 0.7); border-radius:4px;"></div>
  
  
  @if ( Auth::check() === true)
  
  <div class="tab-pane fade in active" id="Reviews" style="">
  <div  class="well">
              <div class="row">
                <div class="col-md-12">
                  @if(Session::get('errors'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5>There were errors while submitting this review:</h5>
                       @foreach($errors->all('<li>:message</li>') as $message)
                          {{$message}}
                       @endforeach
                    </div>
                  @endif
                  @if(Session::has('review_posted'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been posted!</h5>
                    </div>
                  @endif
                  @if(Session::has('review_removed'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been removed!</h5>
                    </div>
                  @endif
                </div>
              </div>
              <div class="text-right">
                <a  id="open-review-box" class="btn btn-info">Leave a Review</a>
              </div>
              <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                  {{Form::open()}}
                  {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
                  {{Form::textarea('comment', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','style'=>'height:200px;','placeholder'=>'Enter your review here...'))}}
                  <div class="text-right">
                    <div class="stars starrr" data-rating="{{Input::old('rating',0)}}"></div>
                    <a href="#" class="btn btn-default btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span> Cancel</a>
                    <button class="btn btn-info btn-sm" type="submit"><span class="glyphicon glyphicon-ok"></span> Save</button>
                  </div>
                {{Form::close()}}
                </div>
              </div>

              @foreach($reviews as $review)
              
			  
			  <hr>
                <div class="row"style="padding-top:10px;border-top:1px solid #5bc0de;">
                  
			<div class="col-md-6 pull-left" style="width: 20%; padding: 0px, 20px;">
				<div>
                                       {{$name = User::where('id', '=', ''.$review->user_id.'')->pluck('first_name');}}
					{{$name2 = User::where('id', '=', ''.$review->user_id.'')->pluck('last_name');}}
<img id="userprofimg"


@if (($pic = User::where('id', '=', ''.$review->user_id.'')->pluck('profpic') == 'NULL') || ($pic2 = User::where('id', '=', ''.$review->user_id.'')->pluck('picverified') == '0')) 
 src="/noimage.png"

@else
src ="/pictures/userprofpics/{{$review->user_id}}/{{$pic = User::where('id', '=', ''.$review->user_id.'')->pluck('profpic')}}" 

@endif
 />

 			</br>
			</div>	
			</div>
					<div class="col-md-12 pull-left" style="width: 80%;padding-left: 10px; border-left:1px solid #5bc0de;">
@for ($i=1; $i <= 5 ; $i++)
                        <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    	@endfor	
{{$review->timeago}}

</br>
</br>

<p>{{{$review->comment}}}</p>
</div> 
                    
                    
                  
                </div>
              @endforeach
              {{ $reviews->links(); }}
            </div>
  
  
  </div>
  
  @else
<div class="tab-pane fade in active" id="Reviews" style="">
  <div  class="well">
              <div class="row">
                <div class="col-md-12">
                  @if(Session::get('errors'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5>There were errors while submitting this review:</h5>
                       @foreach($errors->all('<li>:message</li>') as $message)
                          {{$message}}
                       @endforeach
                    </div>
                  @endif
                  @if(Session::has('review_posted'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been posted!</h5>
                    </div>
                  @endif
                  @if(Session::has('review_removed'))
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5>Your review has been removed!</h5>
                    </div>
                  @endif
                </div>
              </div>
              <div class="text-left">
               
			     <a data-toggle="modal"  data-target="#basicModal" id="signup"  class=" btn btn-info">
  Sign up
  </a>
   or
  <a data-toggle="modal"  data-target="#smallModal" id="Log in"  class="btn btn-info">
  Log in
  </a> to leave a review
			   
			   
			   
              </div>
              <div class="row" id="post-review-box" style="display:none;">
                
              </div>

              @foreach($reviews as $review)
              
			  
			  <hr>
                <div class="row"style="padding-top:10px;border-top:1px solid #5bc0de;">
                  
			<div class="col-md-6 pull-left" style="width: 20%; padding: 0px, 20px;">
				<div>
                                       {{$name = User::where('id', '=', ''.$review->user_id.'')->pluck('first_name');}}
					{{$name2 = User::where('id', '=', ''.$review->user_id.'')->pluck('last_name');}}

<img id="userprofimg"

@if (($pic = User::where('id', '=', ''.$review->user_id.'')->pluck('profpic') == 'NULL') || ($pic2 = User::where('id', '=', ''.$review->user_id.'')->pluck('picverified') == '0')) 
 src="/noimage.png"

@else
src ="/pictures/userprofpics/{{$review->user_id}}/{{$pic = User::where('id', '=', ''.$review->user_id.'')->pluck('profpic')}}" 

@endif
 />


 			</br>
			</div>	
			</div>
					<div class="col-md-12 pull-left" style="width: 80%;padding-left: 10px; border-left:1px solid #5bc0de;">
@for ($i=1; $i <= 5 ; $i++)
                        <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    	@endfor	
{{$review->timeago}}

</br>
</br>

<p>{{{$review->comment}}}</p>
</div> 
                    
                    
                  
                </div>
              @endforeach
              {{ $reviews->links(); }}
            </div>
  
  
  </div>
  
  @endif
  
</div>
          
			  
			  
			  
			  
			  
			
			</br>
  
			  
              
            
            
      </div><!--/row-->
	 </div><!--/span-->

	 
	 
	 
	 </br>
	 
	 
		<!--NAVIGATION SIDEBAR-->
	 
	 
	 <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

          		  
		  
@if($club->url == 'ESL' || $club->url == 'PublicBarDupont' || $club->url == 'SaufHaus')
<div id="advert">
		<img src="/ads/psychicshopdc.jpg" style="width: 100%; height: 100%;">
</div>
@endif		

		 <div class="city"  style="margin-top: 10px;">
            <a 
			href="/{{$club->cityurl}}";>{{$club->city}}</a>
			</div>
			<div id="navscroll" class="nano has-scrollbar">
	 
			<div  class="nano-content" >
			
			 		 <div class="row" style="margin:10px;">
 @for ($i=0; $i < count($names); $i++)
 
  
    
        
		
		
		<a style="
		border-radius:7px;
border:1px solid #fff;

padding: 0px !important;
		color:white; height:120px; background:url(/pictures/{{$names[$i]['cityurl']}}/{{$names[$i]['url']}}/banner1.jpg); -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;" href="/{{$names[$i]['cityurl']}}/{{$names[$i]['url']}}" class="list-group-item">
		
		
		
		<div class="pull-left;" style="
		
		@if (strlen($names[$i]['name']) > 18)
		font-size:11px;
		@endif
		
		background-color:rgba(8, 126, 136, .77); padding:8px; border-radius:6px 6px 0px 0px;">
		@if($names[$i]['Camera'] == '1')
		
		<span style="color:rgba(255, 87, 214, 1);" class="fa fa-video-camera fa-lg"></span>
		
		@endif
			
			{{$names[$i]['name']}}
			
		<div class="pull-right">
		@for ($s=1; $s <= 5 ; $s++)
                      <span class="glyphicon glyphicon-star{{ ($s <= $names[$i]['rating_cache']) ? '' : '-empty'}}"></span>
                    @endfor
		</div>

</div>		
		</a>
		
		</br>
  
	
  
   @endfor


 </div>	
			
			
			</div></div>
        		
			

			 
			
			
			
   
		  
		  
		  
		  
		 
		  		  
		  </div><!--/span-->        </div><!--/row-->

	 
	 
	 
	 
	 
	 
	 
	 
    </div><!--/container-->
	</div><!--/from-top-->

	@if($club->Camera == '1')

@if(!Agent::isAndroidOS()||!Agent::isiOS())

	<script src="/js/flowplayer-3.2.13.min.js"></script> 
    <script language="JavaScript">
      flowplayer("player", { src:"/js/flowplayer-3.2.18.swf", wmode:"transparent" },
	{
	showErrors:false,
	plugins: {
 	controls: null,
         // the F4M plugin is here
        f4m: { url: "/js/flowplayer.f4m-3.2.10.swf" },
	httpstreaming: { url: "/js/flowplayer.httpstreaming-3.2.11.swf" }},
	
	clip: {
        url: "manifest.f4m",
        autoPlay: true,
        urlResolvers: ['f4m'],
        provider: 'httpstreaming',
        baseUrl: "http://71.77.45.223:8081/{{$club->camstream}}/"}});
    </script>		
	@endif
 <script type="text/javascript">
   $(function() {
$('#slider').hide();
$('#vidToggle').hide();
$('.rslides_nav').hide();

$('#picToggle').on('click',
                          function() 
                       {
                           $('.rslides_nav, #vidToggle, #picToggle, #slider, #player').toggle()
                       }
                       );
					   
$('#vidToggle').on('click',
                          function() 
                       {
                           $('.rslides_nav, #vidToggle, #picToggle, #slider, #player').toggle()
                       }
                       );
					    });
					   
 </script>	
	@endif
<div style =""  class="modal fade" id="basicModal" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog" style="width:350px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 style = "text-align:center; class="modal-title" id="myModalLabel">Sign up</h4>
          </div>
          <div class="modal-body" style = "text-align:center;">
          
		   <?php echo Form::open(array('url' => '/register', 'class' => 'box login')); ?>
<fieldset style="width:100%; margin-left:0px;">
  
  <input class="form-email form-control" style="width:100%; max-width:315px;" placeholder=" First Name" type="text" tabindex="6" name="first_name" required></br>
  <input class="form-email form-control" style="width:100%; max-width:315px;" placeholder=" Last Name" type="text" name="last_name" tabindex="7" required>
  <br>
  <input class="form-email form-control" style="width:100%; max-width:315px;" placeholder=" Email" type="text" tabindex="8" name="email" required>
  
   </br>
 
  <input class="form-email form-control" style="width:100%; max-width:315px;" placeholder=" Password" type="password" name="password" tabindex="9" required>
     </br>
 <input class="form-email form-control" style="width:100%; max-width:315px;" placeholder="Confirm Password" type="password" name="password_confirmation" tabindex="10" required>
</fieldset>
			
    </div>
          <div style ="" class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Submit" tabindex="11">
            </form>
          </div>
        </div>
      </div>
    </div>



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	<div style =""  class="modal fade in" id="smallModal" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
      <div style=" width: 310px; margin-top:15%;" class=" modal-dialog modal-sm">
        
          
            
       <button type="button" class="close" style= "size:20px; color:white;" data-dismiss="modal" aria-hidden="true">&times;</button>     
        
        
          
<div style="" id="logform">
 {{Form::open(array('url' => '/login', 'class' => 'box login'));}}
<fieldset class="logfield">
  </br>
  
  
  <input placeholder=" Email" style="" class="form-email form-control" type="text" tabindex="1" name="email" required>
  
  
  </br>

  
 
  <input placeholder="Password" style="width:170px;" type="password" class=" form-email pull-left form-control" name="password" tabindex="2" required>
  <input type="submit" class=" btn btn-info btnLogin pull-right" value="Login" tabindex="3">
  
 
					   
  </br>
  </br>
  <label><input type="checkbox" name="persist" class="pull-left" tabindex="4"> Remember me</label>
  
  
  <a href="#" class="rLink pull-right" tabindex="5">Password Help</a>
 
</fieldset>

 

</form>

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

