<?php
	include "database.php";
	session_start();
?>
<html>
<body>
<?php
				if(isset($_POST["login"]))
				{
					$sql="select * from codepage where CODE='{$_POST["codepage"]}'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$_SESSION["ID"]=$ro["ID"];
						$_SESSION["CODE"]=$ro["CODE"];
					    echo "<script>window.open('selection.php','_self');</script>;";
					}
					else
					{
						echo "Invalid code";
					}
					
				}
				if(isset($_GET["mes"]))
				{
					echo "{$_GET["mes"]}";
				}
				
			?>
	
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<label>ENTER CODE</label><br>
<input type="text" name="codepage">

<button type="submit" name="login">Log In</button>
</form>
</html>