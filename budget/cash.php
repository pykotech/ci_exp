<?php
session_start();
if(!isset($_SESSION['unr'])) { header('Location: index.php'); exit(); }
?>
<!doctype html>
<?php

include('db.php');

$rs = $db->query("SELECT * FROM cash_on_hand ORDER BY modified DESC LIMIT 1"); 

if($rs)
{
	while($rows = $rs->fetch_object())
	{
        echo "<h1>on hand" .$rows->modified . "</h1>";
        echo "<strong>" . $rows->amount . "</strong>";
	}
}
else 
{
	echo "No Records"; 

} 

$rs->free_result();

$rs = $db->query("SELECT * FROM cash_bank ORDER BY modified DESC"); 

if($rs)
{
	echo '<table>';
	$i=0;
	while($rows = $rs->fetch_object())
	{
		if($i % 2 == 0 ) {
			echo "<tr style=\"background:grey;\">";
		}
		else {
			echo "<tr style=\"background:#fff\">";
		}
        echo "<td><strong style=\"font-size:14px;\">" .$rows->bank   . "</strong> </td>";
        echo "<td>" . $rows->amount . "</td></tr>";
		
	}
	echo '</table>';
}
else 
{
	echo "No Records"; 
}

$rs->free_result();



$conn->close();
echo '<a href="budget.html">Budget</a> | <a href="b.php">Budget App</a>';
include('foot.php');
?>
