@extends('layout')
<title>Profile</title>
@section('scripts')


<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/userprofile.js"></script>
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

<div class="profile-settings">
<div class="profilesettinghead">


					<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
<div id="image_preview"><img id="previewing"

@if (User::where('id', '=', ''.$id.'')->pluck('profpic') != '0')
src ="/pictures/userprofpics/{{$id}}/{{$pic = User::where('id', '=', ''.$id.'')->pluck('profpic')}}" 
@else
 src="/noimage.png"
@endif
 /></div>
					<div class="name"><h4>
					{{$name = User::where('id', '=', ''.$id.'')->pluck('first_name');}}
					{{$name2 = User::where('id', '=', ''.$id.'')->pluck('last_name');}}</h4></div>
</div>
<hr id="line">
<div id="selectImage">
<label>Profile Picture</label><br/>
{{Form::file('image',array('id'=> 'file', 'class'=>'btn btn-info'));}}	

</div>
<hr id="line">
<input id="uploadimage" class="Savebutton btn btn-info" type="submit" value="Save" class="submit" />
</form>

 <div id ="error">
@if(Session::get('errors'))

                    <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5>
					   @foreach($errors->all('<li>:message</li>') as $message)
                          {{$message}}
                       @endforeach
					   </h5>
					   </div>
					   @endif 
</div>				
</div>


 </div>

<div class="rightside">
 
 <div class="well" style="margin-top:70px; margin-right:15px;">
 
 @if($reviews->isEmpty())
 
	 <h4>You have no Reviews </h4>
	@else 

<h4>Reviews</h4>
 
 @endif
 @foreach($reviews as $review)
              
			  
			 
                <div id ="{{$review->id}}" class="row" style="padding-top:5px;border-top:1px solid #5bc0de;">
                  <div  class="col-md-12">
				<a href="{{$name = Club::where('id', '=', ''.$review->club_id.'')->pluck('cityurl');}}/{{$name = Club::where('id', '=', ''.$review->club_id.'')->pluck('url');}}/">

	  {{$name = Club::where('id', '=', ''.$review->club_id.'')->pluck('name');}} </a>
                   

          				
					<span class="pull-right">
					@for ($i=1; $i <= 5 ; $i++)
                      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                    @endfor
					{{$review->timeago}}</span> 
                     
                    <p style="margin-top:10px;">{{{$review->comment}}}</p>
                  </div>
                
<?php echo '<!--span onclick="" id="edit" userid="'.$id.'" reviewid="'.$review->id.'" style="float:left; cursor:pointer;" class=""><i class="fa fa-pencil-square-o"></i></span-->

                <div id ="deletebox-'.$review->id.'" style="float:right;"><span onclick="changetodeletedialog('.$review->id.');" id="delete-'.$review->id.'" data-uid="'.$id.'" data-reviewid="'.$review->id.'"  style="cursor:pointer;" class="">     <i class="fa fa-times"></i></span></div>'?>
</div> <hr>
              @endforeach
              
            </div></div>

	
 </div>
 



 

 </div>
</body>
	
@stop