<?php
include "database.php";
session_start();
?>
<html>
<body>
<?php
$sql="select * from quiz where CID='{$_SESSION["SID"]}'";
$re=$db->query($sql);
if($re->num_rows>0)
{
			
	while($ro=$re->fetch_assoc())
	{?>  
		 <table border="2px">
		 <tr>
		 
		 <td align="center"><a href="<?php echo $ro["LINK"];?>"><?php echo $ro["LINK"];?></a></td>
		 <td align="center"><?php echo $ro["DATE"];?></td>
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
	<h5>CLICK THIS LINK TO CREATE QUIZ</h5>
	
	 <a href="stud_choose.php">GO HOME</a><br>
	<a href="logout.php">Log Out</a>
</body>
</html>
