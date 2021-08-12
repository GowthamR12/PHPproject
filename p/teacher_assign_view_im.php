<?php
include "database.php";
session_start();
?>
<html>
<body>
<?php
$sql="select * from images where AID='{$_SESSION["SID"]}'";
$re=$db->query($sql);
if($re->num_rows>0)
{
			 	while ($img = $re->fetch_assoc()) {
		 ?>
		 	
				<img src="stud_uploads/<?=$img['IMAGES']?>" height="500px" width="500px">
				  
<?php 
}
	    }else {
		 	echo "<h1>Empty</h1>";
		 }
		 ?>
		 <br>
		 <br>
		 <a href="logout.php">Log Out</a>
		 </body>
		 </html>