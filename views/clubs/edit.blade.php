@extends('layout')


    
 <title>{{$Club->name}} edit</title> 
 

<link rel="stylesheet" type="text/css" href="/css/edit.css">
 
    
 
@section('content')


<div class="container">



<h3 style="color:white;">

{{$Club->name}} edited by:
{{$name = User::where('id', '=', ''.Auth::id().'')->pluck('first_name');}} 
{{$name2 = User::where('id', '=', ''.Auth::id().'')->pluck('last_name');}}
</br>

<div id ="error" style="float:right; width:200px;">
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
</h3>
</br>
</br>
<div class="leftside">
	<div class="col-xs-3 " style=" position:relative; max-width:500px; color:white;">
 {{Form::open(array('url' =>'/'.$Club->cityurl.'/'.$Club->url.'/edit', 'files'=> true))}}
<a href="/{{$Club->cityurl}}/{{$Club->url}}" class="btn btn-info">Back</a>
<button class="btn btn-success btn-sm" type="submit"><span class="glyphicon glyphicon-ok"></span> Save</button>
<a href="" class="btn btn-info" style="background-color:#ff8400!important;" target="_blank">Wowza</a>
</br>
</br>
name:</br>{{Form::text('name',  $Club->name,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br></br>	
url:</br>{{Form::text('url',  $Club->url,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br>	</br>
city:</br>{{Form::text('city',  $Club->city,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br></br>	
cityurl:</br>{{Form::text('cityurl',  $Club->cityurl,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}	</br></br>
</div>

<div class="col-xs-3 " style=" position:relative; max-width:500px; color:white;">
Camera (1 = on, 0 = off):</br>{{Form::text('Camera',  $Club->Camera,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br></br>
Camera stream:</br>{{Form::text('camstream',  $Club->camstream,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br></br>			
</div>				 
</div>
<div class="rightside">
</br>
</br></br>
<div class="col-xs-3 " style=" position:relative; max-width:500px; color:white;">

			latitude:</br>{{Form::text('lat',  $Club->lat,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br></br>
				  longitude:</br>{{Form::text('lng',  $Club->lng,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br></br>

				 twitter handle:</br>{{Form::text('handle',  $Club->handle,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br></br>
phone number:</br>{{Form::text('phone',  $Club->phone,array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}</br></br>
				  

address:</br>{{Form::text('address',  $Club->address, array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}	</br></br>
website:</br>{{Form::text('webaddress',  $Club->webaddress, array('rows'=>'1','id'=>'new-review','class'=>'form-control animated'))}}	</br></br>
{{Form::file('image');}}
</div>	
</div>	

<div class="" style="color:white;">
	
			  </br></br>long description:
                  {{Form::textarea('long_description', $Club->long_description, array('rows'=>'10','id'=>'new-review','class'=>'form-control animated'))}}
                  <br>short description:
				  {{Form::textarea('short_description', $Club->short_description, array('rows'=>'10','id'=>'new-review','class'=>'form-control animated'))}}
				  <div class="text-right">
                    
                    </br>
                    <button class="btn btn-success btn-sm" type="submit"><span class="glyphicon glyphicon-ok"></span> Save</button>
                  </div>
                {{Form::close()}}
                
				
				
	

	

 	<footer style = " color:white; bottom:0px;">
         <p>  &copy; NightSeen, LLC 2015</p>
      </footer> 
	
@stop
