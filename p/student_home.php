<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('student_logreg.php?mes=Access Denied..','_self');</script>";
	}	

?>

<html>
<body>

<?php
if(isset($_POST["submit"]))
{
	$sql="select * from codepage where CODE='{$_POST["subject"]}'";
	$re=$db->query($sql);
	if($re->num_rows>0)
	{
		$ro=$re->fetch_assoc();
		$_SESSION["CODE"]=$ro["CODE"];
		$_SESSION["SUBJECT"]=$ro["SUBJECT"];
		$_SESSION["SID"]=$ro["ID"];
		echo $_SESSION["SID"];
		echo "<script>window.open('stud_choose.php','_self');</script>";
	}
}
		
?>
<?php
$sqla = "select * from codepage where YEAR='{$_SESSION["YEAR"]}' and SEMESTER='{$_SESSION["SEMESTER"]}'";
$res=$db->query($sqla);
if($res->num_rows>0)
{  ?> <form method="post" action=""> <?php
	while($ro=$res->fetch_assoc())
	{ ?>
		
		<input type="radio" name="subject" value="<?php echo $ro["CODE"];?>">
		<?php echo $ro["SUBJECT"]; ?>
		<input type="submit" name="submit">
		
	<?php 
	}?>
	</form>
	<?php
}
else
{
	echo "empty";
}
	
?>
<a href="logout.php">Log Out</a>
</body>
</html>