<?php
include"database.php";
session_start();
?>
<html>
<body>
<?php
$sql="select * from videos where ID='{$_SESSION["SID"]}' order by si desc";
$res=$db->query($sql);
if($res->num_rows>0)
{
	while($video=$res->fetch_assoc())
	{
			 ?>
		 	<div>
				<video src="uploads/<?=$video['VIDEO']?>" height="500px" width="500px" controls>
				  
	            </video>
				</div>
				<?php 
}
	    }else {
		 	echo "<h1>NO videos</h1>";
		 }
		 ?>
		 <br>
		 <br>
		 <br>
		  <a href="stud_choose.php">GO HOME</a>
		 <a href="logout.php">Log Out</a>
		 
</body>
</html>