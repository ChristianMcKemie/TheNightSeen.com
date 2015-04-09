<?php
class AdminController extends BaseController {
	
	


	public function approval()
	{
	
if (Auth::check())
{

$admin = Auth::user()->user_type;
if($admin == 10)
{
$reviews = Review::where('approved', '=', '0')->orderBy('created_at','desc')->get();

$view = View::make('users.approval')->with('reviews',$reviews);
}
else
{
$view = Redirect::to('home');
}
}
else
{
$view = Redirect::to('home');
}
return $view;

		
		
	}
	
	
	
	
	public function addclub()
	{
		
$admin = Auth::user()->user_type;
if($admin == 10)
{

    $clubdata = Input::all();
	
     



		$club = new Club;
		
        $club->name = $clubdata['name'];
		$club->url = $clubdata['url'];
        $club->city = $clubdata['city'];
		$club->cityurl = $clubdata['cityurl'];
		$club->save();
		


$view = Redirect::to(''.$clubdata['cityurl'].'/'.$clubdata['url'].'/edit');

    }
	
	else{
	$view = Redirect::to(''.$clubdata['cityurl'].'/'.$clubdata['url'].'');
	}

    return $view;
		
		
		
	}
	
	
	
	
	public function editclub($city, $url, $edit)
	{
	if ($edit == 'edit'){ 
if (Auth::check())
{

$admin = Auth::user()->user_type;
if($admin == 10)
{
$id = Club::where('cityurl', '=', ''.$city.'')->where('url', '=', ''.$url.'')->pluck('id');
$Club = Club::find($id);
$view = View::make('clubs.edit', array('id'=>$id,'Club'=>$Club));
}
else
{
$view = Redirect::to(''.$city.'/'.$url.'');
}
}
else
{
$view = Redirect::to(''.$city.'/'.$url.'');
}
}
else
{
$view = Redirect::to(''.$city.'/'.$url.'');
}
return $view;	
		
		
	}
	
	
	
	public function editclubpost($city, $url, $edit)
	{
		$admin = Auth::user()->user_type;
if($admin == 10)
{





    $clubdata = array(
	
			'name' => Input::get('name'),
            'url' => Input::get('url'),
            'city' => Input::get('city'),
			'cityurl' => Input::get('cityurl'),
			'address' => Input::get('address'),
			'webaddress' => Input::get('webaddress'),
			'camera' => Input::get('Camera'),
			'lat' => Input::get('lat'),
			'lng' => Input::get('lng'),
			'handle' => Input::get('handle'),
			'phone' => Input::get('phone'),
			'long_description' => Input::get('long_description'),
			'short_description' => Input::get('short_description')
        
		
		);
		
		
		
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
	
	$path = public_path('/pictures/'.$clubdata['cityurl'].'/'.$clubdata['url']);
	if (!file_exists($path)) {
	       
				File::makeDirectory($path, $mode = 0777, true, true);
	}
	$filename = $image->getClientOriginalName();
        $upload_success = $image->move($path, $filename);
  		$validator = "Uploaded Image to /pictures/".$clubdata['cityurl']."/".$clubdata['url']."/";	
		
}
	}	
else{
	$validator = "No Image ";
	}			
$id = Club::where('cityurl', '=', ''.$city.'')->where('url', '=', ''.$url.'')->pluck('id');
$Club = Club::find($id);
$Club->name = $clubdata['name'];
$Club->url = $clubdata['url'];
$Club->city = $clubdata['city'];
$Club->cityurl = $clubdata['cityurl'];
$Club->address = $clubdata['address'];
$Club->webaddress = $clubdata['webaddress'];
$Club->camera = $clubdata['camera'];
$Club->lat = $clubdata['lat'];
$Club->lng = $clubdata['lng'];
$Club->handle = $clubdata['handle'];
$Club->phone = $clubdata['phone'];
$Club->long_description = $clubdata['long_description'];
$Club->short_description = $clubdata['short_description'];
$Club->save();   
$city = $clubdata['cityurl'];
$url = $clubdata['url'];

$view = Redirect::to(''.$city.'/'.$url.'/edit')->withErrors($validator);
}
else{

$view = Redirect::to(''.$city.'/'.$url.'');
}
return $view;
	}
	
	
	
	
}?>