<?php
include"database.php";
if(isset($_POST['submit']))
{
	$sqla="select * from student where UPRN='{$_POST["upr"]}' and SEMESTER='{$_POST["semeste"]}' and YEAR='{$_POST["yea"]}'";
	$resa=$db->query($sqla);
	if($resa->num_rows>0)
	{
		$rot=$resa->fetch_assoc();
		$_SESSION["ID"]=$rot["ID"];
		$_SESSION["UPRN"]=$rot["UPRN"];
		$_SESSION["YEAR"]=$rot["YEAR"];
		$_SESSION["SEMESTER"]=$rot["SEMESTER"];
		$_SESSION["NAME"]=$rot["NAME"];
		
		echo "<script>window.open('student_home.php','_self')</script>";
	}
	else
	{
		echo "INVALID USERNAME or PASSWORD";
	}
}
?>
