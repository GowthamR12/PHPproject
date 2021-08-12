<?php
include "database.php";
session_start();
if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('admin_login.php?mes=Access Denied..','_self');</script>";
	}	

?>
<html>
<body bgcolor="yellow">
<h3><center>SUBJECTS</center></h3><br>
<?php
if(isset($_POST["submit"]))
{
	$sp="select * from codepage where ID='{$_POST["check"]}'";
	$rese=$db->query($sp);
	if($rese->num_rows>0)
	{
		$q="delete from codepage where ID='{$_POST['check']}'";
		$db->query($q);
	}
	else
	{
		echo "NO ENTRY";
	}
}
?>
<?php


if(isset($_POST['add']))
{
	
	
	$code=$_POST['code'];
	$year=$_POST['year'];
	$semester=$_POST['semester'];
	$subject=$_POST['subject'];
	
	$sqla="INSERT INTO codepage(CODE,SEMESTER,YEAR,SUBJECT) VALUES('$code','$semester','$year','$subject')";
	if($db->query($sqla))
	{
		echo "success";	
	}
	else{
		echo "failed";
	}
}
?>

<table>
<tr>
<td>SI</td>
<td>CODE</td>
<td>YEAR</td>
<td>SEMESTER</td>
<td>CHECK</td>
<td>DELETE IT</td>
</tr>
<?php
$sq="select * from codepage";
$re=$db->query($sq);
if($re->num_rows>0)
{
	$i=0;
	while($ro=$re->fetch_assoc())
	{ ?>
		 <form method="post" action="">
		 <tr>
		 
		 <td align="center"><?php echo $i;?></td>
		 <td align="center"><?php echo $ro["CODE"];?></td>
		 <td align="center"><?php echo $ro["YEAR"];?></td>
		 <td align="center"><?php echo $ro["SEMESTER"];?></td>
		 <td align="center"><input type="checkbox" name="check" value="<?php echo $ro["ID"];?>"></td>
		 <td align="center"><input type="submit" name="submit"></td>
		 
		 </tr>
		 </form>
	<?php $i++;
	}
	
}
else
{
	echo "EMPTY";
}

	
?>
</table>
<br>
<br>
<br>
<h4>ADD SUBJECT</h4>
<form method="post" action="">
<label>CODE</label>
<input type="text" name="code">  
<label>YEAR</label>
<input type="text" name="year">
<label>SEMESTER</label>
<input type="text" name="semester">
<label>SUBJECT(CAPS)</label>
<input type="text" name="subject">

<button type="submit" name="add">SUBMIT</button>
</form>

<br>
<br>
<br>
<a href="logout.php">Log Out</a>
</body>
</html>