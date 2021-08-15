<?php
include("database.php");
session_start();

?>
<html>
<body>
<?php


if(isset($_POST['reg']))
{
	
	
	$name=$_POST['username'];
	$year=$_POST['year'];
	$email=$_POST['email'];
	$uprn=$_POST['uprn'];
	$semester=$_POST['semester'];
	
	$sqla="INSERT INTO student(NAME,EMAIL,UPRN,YEAR,SEMESTER) VALUES('$name','$email','$uprn','$year','$semester')";
	if($db->query($sqla))
	{
		echo "success";	
	}
	else{
		echo "failed";
	}
}
?>
<?php

					if(isset($_POST["submit"]))
					{
						$sql="select * from student where UPRN='{$_POST["upr"]}' ";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["ID"]=$ro["ID"];
							$_SESSION["UPRN"]=$ro["UPRN"];
							$_SESSION["NAME"]=$ro["NAME"];
							$_SESSION["YEAR"]=$ro["YEAR"];
							$_SESSION["SEMESTER"]=$ro["SEMESTER"];
							echo "<script>window.open('student_home.php','_self');</script>";
						}
						
								
						else
						{
							echo "INVALID MATCHING...!";
						}
					}
				
				?>

<fieldset>
<legend>LOGIN</legend>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<label>ENTER UPRN</label><br>
<input type="number" name="upr"><br>

<label>SELECT YEAR</label>
<select name="yea">
<option type="number" value="1">1</option>
<option type="number" value="2">2</option>
</select>
<br>
<label>SELECT SEMESTER</label>
<select name="semeste">
<option type="number" value="1">1</option>
<option type="number" value="2">2</option>
<option type="number" value="3">3</option>
<option type="number" value="4">4</option>
<option type="number" value="5">5</option>
<option type="number" value="6">6</option>
</select>
<br>
<input type="submit" name="submit" value="submit">
</form>
</fieldset>

<fieldset>
<legend>REGISTRATION</legend>
<form action="" method="post">
<label>ENTER NAME:</label>
<input type="text" name="username"><br>
<label>ENTER EMAIL</label>
<input type="text" name="email"><br>
<label>ENTER UPRN</label>
<input type="number" name="uprn"><br>
<label>ENTER YEAR<label>
<input type="number" name="year"><br>
<label>ENTER SEMESTER</label>
<input type="number" name="semester"><br>
<br>
<input type="submit" name="reg" value="REGISTER">
</form>
</fieldset>
</body>
</html>
