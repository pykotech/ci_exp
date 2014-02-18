<?php 
ini_set('display_errors',1);
ini_set('error_reporting',E_ALL); 
$mime_type = "text/plain";
require('db.php');

//$query = "SELECT * FROM"

 $resulta = $db->query("SELECT * FROM expenses"); // = '".$categ."'");//WHERE item='".$item."' AND expensed = '".$gdate."' AND category 
	 
if(isset($_GET['c']) && $_GET['c'] == 1) {
	header('Content-Type: ' . $mime_type);
	$name= date('Y-m-d') . '_bkp' . time() . ".csv";
	 header('Content-Disposition: attachment; filename="'.$name.'"');
	 //header("Content-Transfer-Encoding: binary");
	 //header('Accept-Ranges: bytes');
	 
	 /* The three lines below basically make the
		download non-cacheable */
	 header("Cache-control: private");
	 header('Pragma: private');
	 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 } else {
	header('Content-Type: ' . $mime_type);
 }
 
 
	if($resulta->num_rows > 0) {
		while($row  = $resulta->fetch_array())
		{
				echo $row['category'] . ",".$row['item']."," .$row['amount'] . ",".$row['expensed'];
				echo "\r\n";
		}
	}  else { 
	
		echo "no, such, data";
	
	}

	
 
 
 
 ?>