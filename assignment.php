<?php
include "database.php";
session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('subject.php?mes=Access Denied..','_self');</script>";
	}	
	?>
	<?php
	if(isset($_POST["view"]))
	{
		$_SESSION["SID"]=$_POST["check"];
		header("Location:teacher_assign_view.php");
	}
	?>
	<?php
if(isset($_POST["kill"]))
{
	
	$sp="select * from assign where SI='{$_POST["check"]}'";
	$rese=$db->query($sp);
	if($rese->num_rows>0)
	{
		$q="delete from assign where SI='{$_POST['check']}'";
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
		if(!empty($_POST['assignment']))
		{
			$DATE=date("M/d/Y");
			$TIME=date("G:i:s");
			$DATA=$TIME.''.$DATE;
			$ASSI=$_POST['assignment'];
			$sqla="INSERT INTO assign(ID,ASSIGNMENT,DATE) VALUES('".$_SESSION["ID"]."','$ASSI','$DATA')";
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
	<td colspan="2">ASSIGNMENT</td>
	<td>DATE</td>
	
	</tr>
	</table>
	<?php
	$sql="select * from assign where ID='{$_SESSION["ID"]}' ORDER BY SI DESC";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		
			$i=0;
	while($ro=$res->fetch_assoc())
	{ ?>
		
		 <form method="post" action="">
		 <table border="2px">
		 <tr>
		 
		 <td align="center" rowspan="3"><?php echo $ro["ASSIGNMENT"];?></td>
		 <td align="center"><?php echo $ro["DATE"];?></td>
		 <td align="center"><input type="checkbox" name="check" value="<?php echo $ro["SI"];?>"></td>
		 <td align="center"><input type="submit" name="kill" value="delete"></td>
		 
		 </tr>
		 <tr>
		 <td align="center">Click On Check Box to View The Students</td>
		 <td align="center"><input type="checkbox" name="check" value="<?php echo $ro["SI"];?>"></td>
		 <td align="center"><input type="submit" name="view" value="view"></td>
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
	<h3>ASSIGNMENNTS</h3>
	<form action="" method="post">
	<label>ENTER COMMENT</label>
	<input type="text" name="assignment">
	<button type="submit" name="add" >SUBMIT</button>
	</form>
	<br>
	<br>
	 <a href="subject.php">GO HOME</a>
	<a href="logout.php">Log Out</a>
	</html>
	