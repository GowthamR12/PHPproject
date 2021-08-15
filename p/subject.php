<?php
	include"database.php";
	session_start();	
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('selection.php?mes=Access Denied..','_self');</script>";
	}		
?>
<?php
if(isset($_POST["submit"]))
{
	$sql="select * from student where ID='{$_POST["check"]}'";
	$re=$db->query($sql);
	if($re->num_rows>0)
	{
		$handler="delete from student where ID='{$_POST["check"]}'";
		$res=$db->query($handler);
		}
	else
	{
		echo "NO ENTRY";
	}
}
?>
<html>
<body>

<h3><?php echo $_SESSION["SUBJECT"];?></h3>
<ul>
<li><a href="video.php">MATERIALS</a></li>
<li><a href="assignment.php">ASSIGNMENT</a></li>
<li><a href="quiz.php">Quiz</a></li>
<li><a href="http://localhost:9966/#init">VIDEO CONFERENCE</a></li>
<br>
<br>
<?php
$sq="select * from student where SEMESTER='{$_SESSION["SEMESTER"]}'";
$res=$db->query($sq);
if($res->num_rows>0)
{
	while($ro=$res->fetch_assoc())
	{?> 
			<form method="post" action="">
			<table border="2px">
			<tr>
			<td><?php echo $ro["NAME"];?></td>
			<td><?php echo $ro["UPRN"];?></td>
			<td><input type="checkbox" name="check" value="<?php echo $ro["ID"];?>"></td>
			<td><input type="submit" name="submit">
			</tr>
			</table>
			</form>
	<?php
	}
}

?>	
<a href="logout.php">Log Out</a>
</body>
</html>
