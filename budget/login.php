<?php
date_default_timezone_set('Asia/Manila');
session_start();
if(isset($_SESSION['unr'])) { echo "<a href='logout.php'>Logout</a>";
echo "Go to<a href='index.php'> main</a>";
}
/*ini_set('display_errors',1);
ini_set('error_reporting',E_ALL); */
require_once('db.php');
if(isset($_POST['uname'])) 
{
	$q = "SELECT * FROM users WHERE password ='". $_POST['password']."' AND username ='". $_POST['uname']."'";
	$res = $db->query($q);
	if($res && $res->num_rows == 1)
	{
		$row = $res->fetch_row();
		$_SESSION['unr'] = $row[2]."|".date('Y-m-d H:i:s').'|' . $row[2]; //uid | timein	
		$user_name = $row[0];
		$vals ='\'' . $user_name .  '\',\'' .date("Y-m-d H:i:s") . '\',1';
		$db->query('INSERT INTO logs(`username`,`time_in`,`active`) VALUES ('.$vals.')');
				header('Location: index.php');
	}
	else
	{
		$err =  "WRONG!.. try again";
	}
} else {
?>
<!doctype html>
<html>
<body>
<?php //if(isset($err)) { echo $err; } ?>
<form action="" method="post">
Username<input name="uname" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>"> Password
<input name="password" type="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>" ><br /><br />
<input type="submit" name="sub" value="Login">
</form>
</body>
</html> <?php } ?>
