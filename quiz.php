<?php
include "database.php";
session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('subject.php?mes=Access Denied..','_self');</script>";
	}	
	?>
	
	<?php
if(isset($_POST["kill"]))
{
	
	$sp="select * from quiz where QID='{$_POST["check"]}'";
	$rese=$db->query($sp);
	if($rese->num_rows>0)
	{
		$q="delete from quiz where QID='{$_POST['check']}'";
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
		if(!empty($_POST['quiz']))
		{
			$DATE=date("M/d/Y");
			$TIME=date("G:i:s");
			$DATA=$TIME.'/'.$DATE;
			$ASSI=$_POST['quiz'];
			$sqla="INSERT INTO quiz(CID,LINK,DATE) VALUES('".$_SESSION["ID"]."','$ASSI','$DATA')";
			if($db->query($sqla))
			{
				echo "success";
			}
			else
			{
				echo "failed";
			}
		}
		else
		{
			echo "unoccupied field";
		}
	}
	?>
	<table >
	<tr >
	<td colspan="2">QUIZ LINK</td>
	<td>DATE</td>
	
	</tr>
	</table>
	<?php
	$sql="select * from quiz where CID='{$_SESSION["ID"]}' ORDER BY QID DESC";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		
			$i=0;
	while($ro=$res->fetch_assoc())
	{ ?>
		
		 <form method="post" action="">
		 <table border="2px">
		 <tr>
		 
		 <td align="center" rowspan="3"><?php echo "<a href=".$ro["LINK"].">".$ro["LINK"]."</a>";?></td>
		 <td align="center"><?php echo $ro["DATE"];?></td>
		 <td align="center"><input type="checkbox" name="check" value="<?php echo $ro["QID"];?>"></td>
		 <td align="center"><input type="submit" name="kill" value="delete"></td>
		 
		 </tr>
		 </table>
		 </form>
	<?php $i++;
	}
	
}
else
{
	echo "EMPTY";
}

	
	?>


	
	<html>
	<body>
	<h3>QUIZ</h3>
	<form action="" method="post">
	<label>ENTER LINK</label>
	<input type="text" name="quiz">
	<button type="submit" name="add" >SUBMIT</button>
	</form>
	<br>
	<br>
	<a href="https://docs.google.com/forms/d/1F8F-1tUGf_V5Bbj3gcKy6Y7W9tkrnQDLWpRoIq9qcGY/edit" target="_blank">GOOGLE FORM</a><br>
	<a href="logout.php">Log Out</a>
	</html>
	