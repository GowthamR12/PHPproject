<?php
include "database.php";
session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('selection.php?mes=Access Denied..','_self');</script>";
	}	

?>
<!DOCTYPE html>
<body>

<?php

if(isset($_POST['keybutton']))
{
	$check="select * from videos where SI='{$_POST['keydelete']}'";
	$re=$db->query($check);
	if($re->num_rows>0)
	{
		$q="delete from videos where SI='{$_POST['keydelete']}'";
		$db->query($q);
	}
	else{
		echo "no record was found";
	}
}
	?>
<a href="video.php">UPLOAD</a><br>
		<?php 
		 
		 $sql = "SELECT * FROM videos where ID='{$_SESSION["ID"]}' and YEAR='{$_SESSION["YEAR"]}' ORDER BY SI DESC";
		 $res = $db->query($sql);

		 if ($res->num_rows> 0) {
		 	while ($video = $res->fetch_assoc()) {
		 ?>
		 	
				<video src="uploads/<?=$video['VIDEO']?>" height="500px" width="500px" controls>
				  
	            </video>
				 <form action="" method="post">
				   <input type="checkbox" name="keydelete" value="<?php echo $video['SI'];?>">
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
		 <a href="logout.php">Log Out</a>
		 
</body>
</html>