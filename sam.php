<?php

if(isset($_POST['submit']))
{
	$file=$_FILES['file'];
	$img_name=$_FILES['file']['name'];
	$tmp_name=$_FILES['file']['tmp_name'];
	$filerror=$_FILES['file']['error'];
	$filetype=$_FILES['file']['type'];
	
	$file_ext=explode('.',$img_name);
	$fileac=strtolower(end($file_ext));
	$allowed=array('jpg','jpeg', 'png');
		if(in_array($fileac,$allowed))
		{
			if($filerror==0)
			{
				$new_img_name = uniqid('', true). '.'.$fileac;
				$img_upload_path = 'stud_uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
					$sql = "INSERT INTO images(ID,IMAGES,UPRN,CODE,AID) 
				        VALUES('".$_SESSION["ID"]."','$new_img_name','".$_SESSION["UPRN"]."','".$_SESSION["CODE"]."','".$_SESSION["AID"]."')";
				$db->query($sql);
				header("Location: stud_assign_view.php");
			}
			else
			{
				echo "error";
			}
		}
		else
		{
			echo"<script>window.open('stud_assign.php?mes=invalid file','_self');</script>";
		}
}
?>