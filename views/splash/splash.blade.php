@extends('layout')
 <title>Seen</title>

<link rel="stylesheet" type="text/css" href="/css/splash.css">
  

  
  
  @section('content')






<div id ="body">
</br>
</br>
</br>
 <div id="background">
 
 <div id="message">
 Welcome to the Seen Beta</br>




</div>


 <div id="overview">

<div style="" id="logform">
 {{Form::open(array('url' => '/login', 'class' => 'box login'));}}
<fieldset class="logfield">
  </br>
  
  
  <input placeholder=" Email" style="" class="form-email form-control" type="text" tabindex="1" name="email" required>
  
  
  </br>

  
 
  <input placeholder="Password" style="width:170px;" type="password" class="form-email pull-left form-control" name="password" tabindex="2" required>
  <input type="submit" class=" btn btn-info btnLogin pull-right" value="Login" tabindex="3">
  
 
					   
  </br>
  </br>
  <label><input type="checkbox" name="persist" class="pull-left" tabindex="4"> Remember me</label>
  
  
  <a href="#" class="rLink pull-right" tabindex="5">Password Help</a>
 
</fieldset>

 

</form>

</div>
			   
 <div id="signform">

  <a data-toggle="modal"  data-target="#basicModal" id="signup"  class=" btn btn-default btn-lg">
  Sign up
  </a>

</div>

 <div id ="error">
@if(Session::get('errors'))
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       @foreach($errors->all('<li>:message</li>') as $message)
                          {{$message}}
                       @endforeach
					   </div>
					   @endif 
</div> 
</div>
 </div>

	</div>
	
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
 

	
	
@stop