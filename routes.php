<?php

Route::get('/', 'HomeController@splash');



/************************************************

 AdminController

************************************************/

Route::get('approval', array('before' => 'auth',
            'uses' => 'AdminController@approval'));

Route::post('addclub', 'AdminController@addclub');

Route::get('{city}/{url}/{edit}', 'AdminController@editclub');

Route::post('{city}/{url}/{edit}', 'AdminController@editclubpost');

/*

 //AdminController

*/



/*

 AjaxController

*/

 //review approve/remove function ajax
Route::get( 'review/delete', 'AjaxController@deletereview');

Route::get( 'review/approve', 'AjaxController@approvereview');

 //review approve/remove function ajax


 //favorite function ajax

Route::get( 'favorite/add', 'AjaxController@favoriteadd');

Route::get( 'favorite/remove', 'AjaxController@favoriteremove');
 //favorite function ajax


Route::get( 'map/ajax', 'AjaxController@mapajax');


/*

 //AjaxController

*/




/*

 HomeController

*/

Route::get('home', array('before' => 'auth',
            'uses' => 'HomeController@home'));

Route::get('profile', array('before' => 'auth',
            'uses' => 'HomeController@profile'));
			
Route::post('profile', array('before' => 'auth',
            'uses' => 'HomeController@profilepost'));
			
Route::post( 'Search', 'HomeController@Search');
 
Route::get( 'login', 'HomeController@login');

Route::post( 'logout', 'HomeController@logout');
 
Route::post( 'login', 'HomeController@loginpost');

Route::post( 'register', 'HomeController@registerpost');

Route::get( 'map', 'HomeController@map');	

/*

 //HomeController

*/


/*

 cityclubController

*/
Route::get('{city}/{url}', 'cityclubController@club');	

Route::get('{city}', 'cityclubController@city');

// Route that handles submission of review - rating/comment
Route::post('{city}/{url}', array('before'=>'csrf',
            'uses' => 'cityclubController@postreviewANDrating'));

/*

 //cityclubController

*/
?>