<?php
include "database.php";
session_start();
?>
<html>
<body>
<?php
$sq="select distinct UPRN from images where AID='{$_SESSION["SID"]}' ";
$res=$db->query($sq);
if($res->num_rows>0)
{
	
	while($ro=$res->fetch_assoc())
	{?>
		<table border="2px">
		<tr>
		<td><a href="teacher_assign_view_im.php"><?php echo $ro["UPRN"];?></td>
		</tr>
		</table>
	<?php
	}
	
}
else{
		echo "no entry";
		
	}
?>

 <a href="subject.php">GO HOME</a>
<a href="logout.php">Log Out</a>
</body>
</html>
