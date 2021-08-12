<?php
include "database.php";
session_start();
?>
<html>
<body>
<?php

if(isset($_POST['keybutton']))
{
	$check="select * from images where SI='{$_POST['keydelete']}'";
	$re=$db->query($check);
	if($re->num_rows>0)
	{
		$q="delete from images where SI='{$_POST['keydelete']}'";
		$db->query($q);
	}
	else{
		echo "no record was found";
	}
}
	?>
<a href="stud_assign.php">UPLOAD</a><br>
		<?php 
		 
		 $sql = "SELECT * from images where AID='{$_SESSION["AID"]}' order by SI desc";
		 $res = $db->query($sql);

		 if ($res->num_rows> 0) {
		 	while ($img = $res->fetch_assoc()) {
		 ?>
		 	
				<img src="stud_uploads/<?=$img['IMAGES']?>" height="400px" width="400px">
				  
				 <form action="" method="post">
				   <input type="checkbox" name="keydelete" value="<?php echo $img['SI'];?>">
				   <input type="submit" name="keybutton" value="delete">
				   </form>
<?php 
}
	    }else {
		 	echo "<h1>Empty</h1>";
		 }
		 ?>
		 <br>
		 <br>
		 <br>
		 <a href="stud_choose.php">GO HOME</a>
		 <a href="logout.php">Log Out</a>
		 
</body>
</html>