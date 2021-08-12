<?php
include "database.php";
session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('selection.php?mes=Access Denied..','_self');</script>";
	}	
?>
<html>
<body>
<?php

if(isset($_POST['submit']))
{
	$file=$_FILES['file'];
	$video_name=$_FILES['file']['name'];
	$tmp_name=$_FILES['file']['tmp_name'];
	$filerror=$_FILES['file']['error'];
	$filetype=$_FILES['file']['type'];
	
	$file_ext=explode('.',$video_name);
	$fileac=strtolower(end($file_ext));
	$allowed=array('mp4','wav', 'avi', 'flv');
		if(in_array($fileac,$allowed))
		{
			if($filerror==0)
			{
				$new_video_name = uniqid('', true). '.'.$fileac;
				$video_upload_path = 'uploads/'.$new_video_name;
				move_uploaded_file($tmp_name, $video_upload_path);
				$sql="INSERT INTO videos(ID,VIDEO,YEAR,SEMESTER) VALUES('".$_SESSION["ID"]."','$new_video_name','".$_SESSION["YEAR"]."','".$_SESSION["SEMESTER"]."');";
				$db->query($sql);
				header("Location: view.php");
			}
			else
			{
				echo "error";
			}
		}
		else
		{
			echo"<script>window.open('video.php?mes=invalid file','_self');</script>";
		}
}
?>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<button type="submit" name="submit">UPLOAD</button><br>
<label>POSTED MATERIALS</label>
<a href="view.php"><input type="button" value="view"></a>
</form>
<br>
<br>
<a href="logout.php">Log Out</a>
</body>
</html>