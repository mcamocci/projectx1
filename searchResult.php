<?php

    require_once("Database.php");
    require_once("LoginProcessor.php");
    require_once("Book.php");

    $database=new Database();

    if(isset($_GET['id_to_borrow'])){
        $book_id=$_GET['id_to_borrow'];     
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<style type="text/css">
.indexcont_container{
	width:55%;
	height: 400px;
	margin: 0 auto;
	background-color: #f8f9f9;
	box-shadow: 0 0px 5px 0px rgba(0,0,0,0.1);
	border-radius: 3px;
	position: relative;
	}
	#bigTitle{
		font-family: 'source sans pro' sans-serif;
		font-size: 14pt;
		color:#FFF;
		text-shadow: 0 0px 1px rgba(0,0,0,.3),
								 0 0 1px #ccc,
								 0 1px 1px rgba(0,0,0,.3);
	}
.head{
	border-bottom:1px solid #F5F4F1;
	background-color:#FFF;
	box-shadow: inset 0 0 10px #F5F4F1;

}
* input:focus {
	outline: none;
  box-shadow:none;
}
.backIcon{
	/*container hold img that take U to previous pages*/
	position: absolute;
	background-color:;
	width: 30px
	height:30px;
	left: 35%;
	top:-60px;
}
img{
	position: absolute;
	top: 0px;
	width: 50px;
	height: 50px;
}
.brand{
	background-color:;
	width: 200px;
	height: 40px;
	line-height: 35px;
	margin: 10vh auto 0px;
	text-align: center;
	text-transform: capitalize;
	font-size: 13pt;
	font-weight: 600;
	font-family:tahoma;
	color: #adaeab;
	position: relative;
}
.searchIcon{
	height: 28.5px;
	width: 25px;
	border:1px solid #E0DFE2;
	border-left: none;
	border-radius: 0 3px 3px 0px;
	text-align: center;
	position: relative;
	top:-4px;
	left: -5px;
	margin-left: -5px;
	background-image: url('searchicon.png');
	background-size:15px 15px;
	background-repeat: no-repeat;
	background-position:center;
	color: #fff;
	font-size: 0pt;
	background-color: transparent;
}
#resultContainer{
background: red;
width: 100%;
height: 348px;
overflow-y: auto;
}
</style>
</head>
<body>

	<br/>
<div class="brand">
   <span class="backIcon"><a href="index.php"><img src="book.png"/></a></span>
	<h3 id="bigTitle">digital book borrow</h3></div>
	<div class="indexcont_container">
    <div id="resultContainer">
     <table border="1" width="100%">
     <tr ><td>#</td ><td>Book title</td><td>Date borrowed</td><td>Date return</td></tr>
    <?php  
            foreach(Book::getTheThree($book_id) as $book){ 
             
               echo "<tr ><td>".$book['id']."</td><td>".$book['title']."</td><td>"
               .$book['date_borrowed']."</td><td>".$book['date_return']."</td></tr>";
               
           } 
                
      ?>
    </div>
</body>
</html>
