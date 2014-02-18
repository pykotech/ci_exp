<!doctype html>
<html>
<head>
<title>Current Cash</title>
</head>
<body>
<?php
require('db.php');
$rs = $db->query("INSERT INTO cash_on_hand SET amount = '".$_POST['ccash']."'"); 

if($rs)
{
	echo "cash on hand inserted!";
}
else 
{
	$cash .= "No Records"; 

} 

$rs->free_result();

$rs = $db->query("UPDATE cash_bank  SET amount = '".$_POST['bdo']."' WHERE bank = 'BDO'"); 

if($rs)
{
	echo 'BDO updated: ' . $_POST['bdo'];
		
	
}
$res = $db->query("UPDATE cash_bank SET amount = '".$_POST['bpi']."' WHERE bank = 'BPI'"); 

if($res)
{
	echo 'BPI updated: ' . $_POST['bpi'];
		
	
}
?>
