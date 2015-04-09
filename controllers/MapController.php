<?php
class AjaxController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function mapajax()
    {

$db_username = 'root';
$db_password = 'Rocka12!';
$db_name = 'seen';
$db_host = 'localhost';

//mysqli
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

if (mysqli_connect_errno()) 
{
	header('HTTP/1.1 500 Error: Could not connect to db!'); 
	exit();
}

$swLat = $_GET['swLat'];
$swLng = $_GET['swLng'];
$neLat = $_GET['neLat'];
$neLng = $_GET['neLng'];

################ Continue generating Map XML #################

//Create a new DOMDocument object
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers"); //Create new element node
$parnode = $dom->appendChild($node); //make the node show up 

// Select all the rows in the markers table
$results = $mysqli->query("SELECT * FROM clubs WHERE lat BETWEEN ".$swLat." AND ".$neLat." AND lng BETWEEN ".$swLng." AND ".$neLng." LIMIT 0, 100");
if (!$results) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
} 


// Iterate through the rows, adding XML nodes for each
while($obj = $results->fetch_object())
{
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$obj->id);
  $newnode->setAttribute("Camera",$obj->Camera);
  $newnode->setAttribute("name",$obj->name);
  $newnode->setAttribute("url",$obj->url);
  $newnode->setAttribute("city",$obj->cityurl);
  $newnode->setAttribute("address", $obj->address);  
  $newnode->setAttribute("lat", $obj->lat);  
  $newnode->setAttribute("lng", $obj->lng);  
  $newnode->setAttribute("type", $obj->type);	
}

  return Response::make($dom->saveXML(), '200')->header('Content-Type', 'text/xml');


}
}
?>