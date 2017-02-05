<?php
    require_once("LoginProcessor.php");
    LoginProcessor::prepare();

    if(isset($_GET['logUserout'])){
        echo "i was set logout";
        LoginProcessor::logout();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <style>
  img{
  	/*img that take U to previous pages*/
  	margin-top: 5px;
  	width: 38px;
  	height: 38px;
  }
  </style>
</head>
<body>
	<div class="cont_container">
		<div class="head">
      <span class="backIcon"><a href="index.php"><img src="book.png"/></a></span>
			digital book borrow
		</div>
		<div class="para_text">
			Who are you?
		<div>
		<div class="left_divider_Sec"><a href="studentRegistration.php">I'm student</a></div>
		<div class="right_divider_Sec"><a href="lecturerRegistration.php">I'm Lecturer</a>
		</div>
		<div class="librarianLink"><a href="adminLogin.php">Librarian</a></div>
	</div>
</body>
</html>
