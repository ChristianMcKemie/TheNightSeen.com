@extends('layout')
<title>Approval</title>
@section('scripts')


<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/userprofile.js"></script>
<script type="text/javascript" src="/js/approve.js"></script>
<link rel="stylesheet" type="text/css" href="/css/userprofile.css">



@stop

@section('styles')



@stop


 @section('content')    

 {{$id = Auth::id();}}


    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">  
  </head>
  <body>
  
 

 <div class="container">

 <div class="row userbackground">
<div class="leftside">


 </div>

<div class="rightside">
 
 <div class="well" style="margin-top:70px; margin-right:15px;">
 
 @if($reviews->isEmpty())
 
	 <h4>No Reviews to approve </h4>
	@else 

<h4>Reviews to approve</h4>
 
 @endif
 @foreach($reviews as $review)
              
			  
			 
                <div id ="{{$review->id}}" class="row" style="padding-top:5px;border-top:1px solid #5bc0de;">
                  <div  class="col-md-12">
                   

          				
					<span class="">
 {{$username1 = User::where('id', '=', ''.$review->user_id.'')->pluck('first_name');}}
		 {{$username2 = User::where('id', '=', ''.$review->user_id.'')->pluck('last_name');}}	for
<a href="{{$name = Club::where('id', '=', ''.$review->club_id.'')->pluck('cityurl');}}/{{$name = Club::where('id', '=', ''.$review->club_id.'')->pluck('url');}}/">

	  {{$name = Club::where('id', '=', ''.$review->club_id.'')->pluck('name');}} </a> in {{$name = Club::where('id', '=', ''.$review->club_id.'')->pluck('city');}}
</br>

					@for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    @endfor
					{{$review->timeago}}</span> 
                     
                    <p style="margin-top:10px;">{{{$review->comment}}}</p>
                  </div>
                
<?php echo '<!--span onclick="" id="edit" userid="'.$review->user_id.'" reviewid="'.$review->id.'" style="float:left; cursor:pointer;" class=""><i class="fa fa-pencil-square-o"></i></span-->
                
<div id ="approvebox-'.$review->id.'" style="float:left;"><span onclick="changetoapprovedialog('.$review->id.');" id="approve-'.$review->id.'" data-uid="'.$review->user_id.'" data-reviewid="'.$review->id.'"  style="cursor:pointer;" class="">     <i class="fa fa fa-check"></i></span></div>

<div id ="deletebox-'.$review->id.'" style="float:right;"><span onclick="changetodeletedialog('.$review->id.');" id="delete-'.$review->id.'" data-uid="'.$review->user_id.'" data-reviewid="'.$review->id.'"  style="cursor:pointer;" class="">     <i class="fa fa-times"></i></span></div>'?>
</div> <hr>
              @endforeach
              
            </div></div>

	
 </div>
 



 

 </div>
</body>
	
@stop