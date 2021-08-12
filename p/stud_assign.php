<?php
include "database.php";
session_start();
?>
<html>
<body>
<?php
if(isset($_POST["submitview"]))
{
	$_SESSION["AID"]=$_POST["check"];
	header('Location:stud_assign_view.php');
}
?>
  
<?php

if(isset($_POST['submit']))
{
    $_SESSION["AID"]=$_POST["check"];
	$file=$_FILES['img'];
	$img_name=$_FILES['img']['name'];
	$tmp_name=$_FILES['img']['tmp_name'];
	$filerror=$_FILES['img']['error'];
	$filetype=$_FILES['img']['type'];
	
	$file_ext=explode('.',$img_name);
	$fileac=strtolower(end($file_ext));
	$allowed=array('jpg','jpeg', 'png','jfif');
		if(in_array($fileac,$allowed))
		{
			if($filerror==0)
			{
				$new_img_name = uniqid('', true). '.'.$fileac;
				$img_upload_path = 'stud_uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
					$sql = "INSERT INTO images(ID,IMAGES,UPRN,CODE,AID) 
				        VALUES('".$_SESSION["ID"]."','$new_img_name','".$_SESSION["UPRN"]."','".$_SESSION["CODE"]."','".$_POST["check"]."')";
				$db->query($sql);
				echo "success";
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
<?php
$sql="select * from assign where ID='{$_SESSION["SID"]}'";
$re=$db->query($sql);
if($re->num_rows>0)
{
			
	while($ro=$re->fetch_assoc())
	{?>  
		
		 <form method="post" action="" enctype="multipart/form-data">
		 <table border="2px">
		 <tr>
		 
		 <td align="center" rowspan="3"><?php echo $ro["ASSIGNMENT"];?></td>
		 <td align="center"><?php echo $ro["DATE"];?></td>
		 </tr>
		 <tr>
		 <td align="center"><input type="file" name="img" ></td>
		 <td align="center"><input type="checkbox" name="check" value="<?php echo $ro["SI"];?>"></td>
		 <td align="center"><input type="submit" name="submit"></td>
		 
		 </tr>
		 <tr>
		 <td align="center">CLICK ON CHECK BOX TO VIEW</td>
		 <td align="center"><input type="checkbox" name="check" value="<?php echo $ro["SI"];?>"></td>
		 <td align="center"><input type="submit" name="submitview"></td>
		 </tr>
		 </table><br><br>
		  </form>
		
	<?php 
	}
	
	
	 
}
else
{
	echo "EMPTY";
}

	
	?>
	 <a href="stud_choose.php">GO HOME</a>
	<a href="logout.php">Log Out</a>
</body>
</html>
