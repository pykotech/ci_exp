<?php
date_default_timezone_set('Asia/Manila');
/**
 *
 * @package expenses
 */
require_once('sec.php');
require_once('db.php');//has session_start()
echo "<!doctype html>";
echo "<head>";
echo "<title>budgetting</title>";
echo "<script src=\"jquery.js\"></script>";
echo "<script src=\"ready.js\"></script>";

echo "</head>";
echo "<body>";
if(isset($_SESSION['unr']))
{

	$u = $_SESSION['unr']; 

	$usets = explode("|",$_SESSION['unr']);
	$uid = $usets[0];
	$timein = $usets[1];

	$d = date('Y-m-d'); /*date*/

	$res = $db->query("SELECT * FROM budget");
	
	if($res) { 
		echo "<table>";
		
		while($row  = $res->fetch_array())
		{
				echo "<tr><td>" .$row['budget_type'] . "</td><td>".$row['amount']."</td><td><a href=\"view.php?id=".$row['id']."\" class=\"tog\">" . substr($row['notes'],0,10) ." ..</a>";
				echo "<div class=\"showhide\" id=\"show".$row['id']."\">";
				echo $row['notes'] . "</div></td><td>".$row['modified']."</td><td><a href=\"edit.php?id=".$row['id']."\">Edit</a></td></tr>";
		}
		
		echo "</table>";
	
	} 	else {
		echo '<table>';
		echo "<tr><td>no records</td></tr></table>";
		
	}
	

}
?>

</body></html>
