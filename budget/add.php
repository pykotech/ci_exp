<?php
ini_set('display_errors',1);
ini_set('error_reporting',E_ALL);
date_default_timezone_set("Asia/Taipei");
require('sec.php');
require('db.php');
if($_SESSION['unr']) { $userdetails = explode('|',$_SESSION['unr']);
$uid = $userdetails[0];
$udate = $userdetails[1]; } else { $uid = 0;
exit();
}
$cats = array('Food','Snacks','Drinks','Transpo','Luho','Books/Mags','DVD','Movies','Clothes','Load','Loan','Hotel');
sort($cats);
//if(!isset($_SESSION['unr'])) { exit(); }
?>
<form action="" method="get">
<table>
<tr>
	<td><strong>Amount</strong></td><td> <input name="amt"> </td>
</tr>
<tr>
	
<td>
	<strong>Item</strong> </td>
	<td><input name="item"> </td></tr>
<tr><td>Category</td><td>
<select name="categ">
<?php foreach($cats as $category) {
	echo '<option value="'.$category.'">'.$category.'</option>';
}

 ?>
</select>
</td></tr>


<tr><td><strong>Date</strong></td><td><input type="text" name="gdate" value="<?php echo date('Y-m-d');?>"></tr>

<tr><td colspan="2" align="center">	<input type="submit" name="submit" value="Log"></td></tr>
</table>
<input type="hidden" value="<?php echo $uid; ?>" name="user_id">
	</form>
<?php
if(isset($_GET['amt']) && isset($_GET['item']) && isset($_GET['categ'])) {
	extract($_GET,EXTR_SKIP);
	
	
	 $resulta = $db->query("SELECT * FROM expenses WHERE item='".$item."' AND expensed = '".$gdate."' AND category = '".$categ."'");
	 if($resulta->num_rows > 0)  {
		 echo 'please change your item: '.$item.'if you want to insert this again';
		 exit;
	 }	 else 	 {
		$res = $db->query("INSERT INTO expenses(user_id,category,item,amount,expensed) VALUES ('" . $user_id."','".$categ."','".
$item ."','". $amt. "','".$gdate ."')");
		
		if($res) {	
			echo "Data inserted!" . $res; 
		
		}
	}
}
?>

</div>
</body>
</html>
