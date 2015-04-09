<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
  	
	public function splash()
	{
	$view = View::make('splash.splash');
   	return $view;
	}
	
	public function home()
	{	
    $view = View::make('users.home');
	return $view;
	}

	public function map()
	{
	$view = View::make('map.map');
   	return $view;
	}
	
	public function login()
	{
	$view = View::make('splash.splash');
    return $view;
	}

	public function logout()
	{
    Auth::logout();
    return Redirect::to('/');
	}
 
	public function loginpost()
	{
    $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
 
    if(Auth::attempt($userdata))
    {
        // we are now logged in, go to admin
        return Redirect::to('home');
    }
    else
    {
	$error ="Incorrect Email or Password";
        return Redirect::to('/')->withErrors($error);
    }
	}

	public function registerpost()
	{

    $userdata = Input::all();

	 $rules = array(
        'email'      => 'unique:users,email|required|email',
        'password'   => 'required|confirmed|min:7'
    );
	
	$validator = Validator::make($userdata, $rules);
	    
	
	
	    if ($validator->passes()) {
     
$view = Redirect::to('home')->withErrors($validator);

	 $password = Hash::make($userdata['password']);
		$user = new User;
		$user->user_type = '0';
        $user->first_name = $userdata['first_name'];
		$user->last_name = $userdata['last_name'];
        $user->email = $userdata['email'];
		$user->password = $password;
		$user->save();
		
		
		
		Auth::login($user);
       
    }
	else{
	$view = Redirect::to('/')->withErrors($validator);
	}

    return $view;

	}

		public function profile()
		{  	
	$uid = Auth::id();
	
	$reviews = Review::where('user_id', '=', ''.$uid.'')->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(30);
	
    $view = View::make('users.userprofile')->with('reviews',$reviews);

	return $view;
	
		}

		public function profilepost()
		{
			$id = Auth::id();
$image = Input::file('image');

if(is_object($image))
    {
	
	$input = array('image' => $image);
	$rules = array(
        'image' => 'image'
    );
$validator = Validator::make($input, $rules);
if ($validator->fails())
    {
        $validator = "file type not image ";
		}
	else{
	$ext = $image->getClientOriginalExtension();
	$path = public_path('pictures/userprofpics/'.$id.'/');
	if (!file_exists($path)) {
	       
				File::makeDirectory($path, $mode = 0777, true, true);
	}
	
	$filename = ''.$id.'.'.$ext.'';
        $upload_success = $image->move($path, $filename);
  		$validator = "Uploaded Image";	
	

$User = User::find($id);
$User->profpic = $filename;
$User->save(); 
}
	}	
else{
	$validator = "No Image ";
	}			

$view = Redirect::to('profile')->withErrors($validator);
return $view;
		}

 public function Search()
{
	
	   $key = Input::get('query');
   
    $clubs = Club::where('name', 'LIKE', '%'.$key.'%')->get();
 
$view = View::make('clubs.searchresults')->with('clubs',$clubs)->with('key',$key);
   
   
   return $view;
	
}

}?>