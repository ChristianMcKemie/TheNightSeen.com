<?php
class CityClubController extends BaseController {
	
		
		
		
		
		public function city($city)
	{
	
		$citytest = Club::where('cityurl', '=', ''.$city.'')->first();
		$clubs = Club::where('cityurl', '=', ''.$city.'')->orderBy('Name', 'ASC')->get();
		if (!$citytest) 
		{
		if ($citytest == 'app')
		{
		$view = Redirect::to('app');
		}
		else
		{
		$view = Redirect::to('home');
		}}
		else{
		$view = View::make('clubs.city')->with('clubs',$clubs);
		}
		return $view;

	}		
		
		
		
		
		public function club($city, $url)
	{	
	
	    $test = Club::where('cityurl', '=', ''.$city.'')->where('url', '=', ''.$url.'')->first();
	
if (!$test) 
{ 
 $view = Redirect::to($city);
}
else
{	
	$names = Club::where('url', '!=', ''.$url.'')->where('cityurl', '=', ''.$city.'')->orderBy('Name', 'ASC')->get();
	$id = Club::where('cityurl', '=', ''.$city.'')->where('url', '=', ''.$url.'')->pluck('id');
	$club = Club::find($id);
	// Get all reviews that are not spam for the Club and paginate them
	$reviews = $club->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(30);
$view = View::make('clubs.clubprofile', array('id'=>$id,'club'=>$club,'reviews'=>$reviews))->with('names',$names);
}
	
return $view;
	
	
	}
	
	public function postreviewANDrating($city, $url)
	{
		
		
if (Auth::check())
{
  
$id = Club::where('cityurl', '=', ''.$city.'')->where('url', '=', ''.$url.'')->pluck('id');

	$input = array(
		'comment' => Input::get('comment'),
		'rating'  => Input::get('rating')
	);
	// instantiate Rating model
	$review = new Review;

	// Validate that the user's input corresponds to the rules specified in the review model
	$validator = Validator::make( $input, $review->getCreateRules());
if ($validator->fails()) {
$view = Redirect::to(''.$city.'/'.$url.'')->withErrors($validator)->withInput();
}
	// If input passes validation - store the review in DB, otherwise return to Club page with error message 
	if ($validator->passes()) {
		$review->storeReviewForClub($id, $input['comment'], $input['rating']);
		return Redirect::to(''.$city.'/'.$url.'')->with('review_posted',true);
	}

	
}
else{
$validator = "Please login or create an account";
$view = Redirect::to(''.$city.'/'.$url.'')->withErrors($validator);
}
return $view;
		
		
		
	}
	
	
	
}?>