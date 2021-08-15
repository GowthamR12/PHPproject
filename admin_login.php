<?php
include "database.php";
session_start();
?>
<html>
<body>
<?php
if(isset($_POST["register"]))
{
	$name=$_POST['aname'];
	$password=$_POST['pname'];
	$dept=$_POST['department'];
	$sql="insert into admin(USERNAME,PASSWORD,DEPT) values('$name','$password','$dept')";
	if($db->query($sql))
	{
		echo "success";
	}
	else{
		echo "failed";
	}
}
?>
<?php
if(isset($_POST["login"]))
{
	$sql="select * from admin where USERNAME='{$_POST["aname"]}' and PASSWORD='{$_POST["pname"]}'";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		$ro=$res->fetch_assoc();
		$_SESSION["ID"]=$ro["ID"];
		$_SESSION["USERNAME"]=$ro["USERNAME"];
		echo "<script>window.open('admin_home.php','_self')</script>";
	}
	else
	{
		echo "INVALID USERNAME or PASSWORD";
	}
}
?><h2>LogIN</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<label>USERNAME</label><br>
<input type="text" name="aname"><br>
<label>PASSWORD</label><br>
<input type="password" name="pname" ><br>
<button type="submit" name="login">LogIN</button>
</form>
<h2>Register</h2>
<form method="post" action="">
<label>USERNAME</label><br>
<input type="text" name="aname"><br>
<label>PASSWORD</label><br>
<input type="password" name="pname" ><br>
<label>DEPARTMENT</label><br>
<input type="text" name="department"><br>
<button type="submit" name="register">Register</button>

</body>
</html>