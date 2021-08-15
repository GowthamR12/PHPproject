<?php
include "database.php";
session_start();

?>

<html>
<body>
<h3><?php echo $_SESSION["SUBJECT"];?></h3>
<a href="stud_video.php">VIDEOS</html><br>
<a href="stud_assign.php">ASSIGNMENT</html><br>
<a href="stud_quiz.php">QUIZ</html><br>
<a href="http://localhost:9966">VIDEO CONFERENCE</a>
<br>
 <a href="student_home.php">GO HOME</a>
<a href="logout.php">LOGOUT</a>
</body>
</html>
