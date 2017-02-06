<?php

require_once("Database.php");
require_once("Book.php");
require_once("Author.php");

$database=new Database();
$con=new Database();
$connection=$con->connection;
$authorObject=new Author();


if(isset($_POST['author_name'])){  
  
    $author=new Author();
    $name=mysqli_real_escape_string($connection,$_POST['author_name']);
    
    $author::insertAuthor($name);
    
}else if(isset($_POST['category'])&&

        isset($_POST['title'])&&
        
            isset($_POST['counts'])&&
            
             isset($_POST['author_id'])){
                             
                    if($_POST['author_id']!="Select Author Name"){
                    
                        $title=mysqli_real_escape_string($connection,$_POST['title']);
                        $category=mysqli_real_escape_string($connection,$_POST['category']);
                        $author_id=mysqli_real_escape_string($connection,$_POST['author_id']);
                        $counts=mysqli_real_escape_string($connection,$_POST['counts']);
                        $book=new Book();                    
                        $book::insertBook($title,$category,$author_id,$counts);
                        
                    }
             
                    

    }


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<style type="text/css">

	* input:focus {
		outline: none;
	  box-shadow:none;
	}
	.indexcont_container{
	width:60%;
	min-height: 450px;
	margin: 0 auto;
	background-color: #f8f9f9;
	box-shadow: 0 0px 10px 1px rgba(0,0,0,.1);
	border-radius: 3px 3px  3px 3px;
	position: relative;
	}
	.head{
		border-bottom:1px solid #F5F4F1;
		background-color:#FFF;
	height: 50px;
	width: 100% !important;
	line-height: 50px;
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
.brand{
	position: relative;
width: 200px;
height: 40px;
line-height: 40px;
margin: 10vh auto 5px;
text-align: center;
text-transform: capitalize;
	font-size: 13pt;
	font-weight: 600;
	font-family:tahoma;
	color: #adaeab;
}
.navbar{
background-color:;
position:absolute;
width: 260px;
height: 50px;
left: 0px;
}
#textBoxHrz{
	width: 90%;
	height: 25px;
	margin-top: 10px;
	border:1px solid #E0DFE2;
	font-family: monospace;
}
.left_Dashboard{
	background-color:#FFF;
	width:16%;
	height: 395px;
	overflow-y: auto;
	margin-top: 0px;
	border-radius:0px 0px 3px 3px;
	box-shadow: 1px 0px 5px 0px rgba(0,0,0,0.1);
	position: fixed;
	top:25.6%;
	}
	.left_Dashboard a{
 		text-decoration: none;
		}
	.dashboardBox {
	    width:170px;
	    height:30px;
	    line-height: 30px;
	    background:;
	    box-shadow: inset 0 0 30px #fff;
	    color:#737373;
	    font-size: 10pt;
			border: 1px solid  rgba(224, 230, 235, 1);
	    font-family:'source sans pro',sans-serif;
			font-weight: lighter;
	    margin:-10px 15px;
	    border-radius: 4px;
	    position: relative;
	  }
		.dashboardBox:first-child {
		    margin-top:20px;
		  }
	.counter{
			position: absolute;
			min-width: 20px;height: 20px;
			right:-8px;
			top:-8px;
			background-color:#00D25D ; /*#53d769;*/
			box-shadow: 0 0 0 3px #fff;
			border-radius: 50%;
			z-index: 4;
			color: #fff;
			font-size: 12px;
			text-align: center;
			text-shadow: 0 0px 1px rgba(0,0,0,.3),
									 0 0 1px #ccc,
									 0 1px 1px rgba(0,0,0,.3);
			line-height: 20px;
		}
.parentbox2 {
    width:170px;
    height:30px;
    line-height: 30px;
    background:#6CC7FB;
    font-size: 10pt;
    font-family: monospace;
    word-spacing: -5px;
    text-indent: 8px;
    margin:10px 15px 5px;
    border-radius: 4px;
    position: relative;
  }
  a.not_intended_links{
    color:#FFF;
    text-decoration:none;
  }

  a.not_intended_links:hover{
    cursor:pointer;
		text-shadow: 0 0px 1px rgba(0,0,0,.3),
		             0 0 1px #ccc,
								 0 1px 1px rgba(0,0,0,.3);
		transition: 100ms cubic-bezier(.86,.01,.01,.99);
  }
	.searchIcon{
		background-image: url('searchicon.png');
		background-color: #fff;
		background-size:13px 13px;
		background-repeat: no-repeat;
		background-position:center;
		height:28.7px;
		width: 25px;
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
	#content_col{
	width:67.6%;
	height: 393px;
	background:#fff;
	overflow-y: auto;
	position: absolute;
	right:0;
	top: 53px;
	padding: 0 20px;
	z-index:;
	box-shadow: -1px 0px 5px 0px rgba(0,0,0,0.1);
	}
	#heading{
		font-family: 'source sans pro',sans-serif;
		font-size: 11pt;
		font-weight: normal;
		text-transform: capitalize;
		color: #999;
	}
	#hrzLine{
		height: 1px;
		background: rgba(224, 230, 235, .81);
		border:none;
		margin: -8px 0 10px;
	}
#fieldset{
	border:1px solid  rgba(224, 230, 235, .81);
	width: 250px;
	padding-top: 15px;
	border-radius: 3px;
	float: left;
}
#fieldset2{
	border:1px solid  rgba(224, 230, 235, .81);
	width: 200px;
	padding-top: 15px;
	border-radius: 3px;
	float: left;
}
legend{
	font-family: 'source sans pro',sans-serif;
	font-size: 11pt;
	font-weight: lighter;
	color: #999;
	background-color:  rgba(224, 230, 235, .81);
		border-radius: 3px;
}

#textBox{
	margin:5px 0;
	width: 250px;
	height: 25px;
	border:1px solid #E0DFE2;
	font-family: 'source sans pro',sans-serif;
	font-size: 10pt;
	font-weight: lighter;
	color: #999;
}

#textBox2{
	margin:5px 0;
	width: 200px;
	height: 25px;
	border:1px solid #E0DFE2;
	font-family: 'source sans pro',sans-serif;
	font-size: 10pt;
	font-weight: lighter;
	color: #999;
}
#RegBOOKbtn{
	clear: both;
	margin:5px 3px;
	width: 130px;
	height: 25px;
	border:0px solid #E0DFE2;
	position: absolute;
	bottom: 20px;
	left: 10;
	background-color:#6CC7FB;
	color: #Fff;
	font-family: 'source sans pro',sans-serif;
	font-size: 10pt;
	font-weight:normal;
}
#btn{
  clear: both;
	margin:5px 0px;
	width: auto;
	height: 25px;
	border:0px solid #E0DFE2;
	background-color:#6CC7FB;
	color: #Fff;
	font-family: 'source sans pro',sans-serif;
	font-size: 10pt;
	font-weight:normal;
  text-transform: capitalize;
}
</style>
</head>
<body>
<div class="brand">
  <span class="backIcon"><a href="index.php"><img src="book.png"/></a></span>
	<h3 id="bigTitle">Book Borrow Tracker</h3></div>
	<div class="indexcont_container">
			<div class="head">
				<span class="searchBoxHOLDER">
						<input type="text" name="" placeholder="Library Finder" id="searchBox">
						<input type="submit" name="" class="searchIcon">
				</span>
				<span class="logoutSection"><a href="index.php">Logout</a></span>
			</div>
		<div class="left_Dashboard">
						<a href="allbook.php"><div class="dashboardBox">
							&nbsp;&nbsp;All books
							<span class="counter"><?php echo $database->getCountAllBook()?></span>
						</div></a>
		   			<a href="bookBorrowed.php"><div class="dashboardBox">
              &nbsp;&nbsp;Books borrowed
              <span class="counter"><?php echo $database->getCountAllBorrowedBook(); ?></span>
            </div></a>
            <a href="bookAvailable.php"><div class="dashboardBox">
              &nbsp;&nbsp;Books Available
              <span class="counter"><?php echo $database->getCountAvaillable();?></span>
            </div></a>
						<a href="borrowerQuery.php"><div class="dashboardBox">
							&nbsp;&nbsp;Borrower request
							<span class="counter"><?php echo $database->getCountRequest();?></span>
						</div></a>
						<a href="bookreturn.php"><div class="dashboardBox">
							&nbsp;&nbsp;Book return
							<span class="counter"><?php echo $database->getCountRequest();?></span>
						</div></a>
		</div>
		<div id="content_col">
			<h3 id="heading">Add new book(s)</h3>
			<hr id="hrzLine">
			<form action="librarianIndex.php" method="post">
        <fieldset id="fieldset">
					  <legend>Book Information</legend>
					  <input type="text" id="textBox"name="category" placeholder="Category"><br>
						<input type="text" id="textBox" name="title" placeholder="Book title"><br>
						<select name="author_id" id="textBox">
						 <option>Select Author Name</option>";
						 
						    <?php 						    
						        $authors=$authorObject::getAuthorNames();						     
						        foreach($authors as $author){
						            echo "<option>".$author['firstName']."</option>";
						        }
						        
						    ?>
						</select><br>	
						<input type="text" id="textBox" name="counts" placeholder="Book count"><br>
						 <input type="submit" name="sender" value="Register Book" id="btn"/>
				 </fieldset>
			 </form>

			   <form action="librarianIndex.php" method="post">
 				 <fieldset id="fieldset2">
 					  <legend>Add author</legend>
 					  <input type="text" name="author_name"  id="textBox2" placeholder="Author Name"><br>
            <input type="submit" name="submit" value="insert author" id="btn"/>
 				 </fieldset>
 			 </form>
		</div>

	</div>
</body>
</html>
