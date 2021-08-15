<?php
	include"database.php";
	session_start();		
?>
<html>
<body>
<?php
					if(isset($_POST["submit"]))
					{
						$sql="select * from codepage where CODE='{$_POST["codepage"]}' and SEMESTER='{$_POST["semester"]}' and YEAR='{$_POST["year"]}' ";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["ID"]=$ro["ID"];
							$_SESSION["CODE"]=$ro["CODE"];
							$_SESSION["SUBJECT"]=$ro["SUBJECT"];
							$_SESSION["YEAR"]=$ro["YEAR"];
							$_SESSION["SEMESTER"]=$ro["SEMESTER"];
							echo "<script>window.open('subject.php','_self');</script>";
						}
						
								
						else
						{
							echo "INVALID MATCHING...!";
						}
					}
				
				?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<label>ENTER CODE</label><br>
<input type="text" name="codepage"><br>

<label>SELECT YEAR</label>
<select name="year">
<option type="number" value="1">1</option>
<option type="number" value="2">2</option>
</select>
<br>
<label>SELECT SEMESTER</label>
<select name="semester">
<option type="text" value="1">1</option>
<option type="text" value="2">2</option>
<option type="text" value="3">3</option>
<option type="text" value="4">4</option>
<option type="text" value="5">5</option>
<option type="text" value="6">6</option>
</select>
<br>
<input type="submit" name="submit" value="submit">
</form>
</body>
</html>