<?php
session_start();
require_once('db.php');
?>
<!doctype html>
<html>
<body>
<?php
$d = date('Y-m-d'); /*date*/

	$res = $db->query("SELECT * FROM budget WHERE id = " . $_GET['id']);
	
	
	if($res->num_rows > 0) { 
		echo "<form action=\"save.php\" method=\"post\">";
		echo "<table>";
		
		while($row  = $res->fetch_array())
		{
				echo "<tr><td>" .$row['budget_type'] . "</td></tr>";
				echo "<tr><td><input type=\"text\" name=\"amount\" value=\"".$row['amount']."\"></td></tr>";
				echo "<tr><td>Notes<br /><textarea name=\"notes\">" . $row['notes']. "</textarea></td>";
				echo "<tr><td>".$row['modified']."</td>/tr>";
				$id = $row['id'];
		}
		
		echo "</table>";
		echo "<input type=\"text\" name=\"id\" value=\"".$id."\">";
		echo "</form>";
	}
	
?>
</body>
</html>