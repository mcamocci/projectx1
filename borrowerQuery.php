<?php

require_once("Database.php");
$database=new Database();


if(isset($_GET['id_to_approve']) && isset($_GET['user_id'])){
   
     $book_id=$_GET['id_to_approve'];
     $user_id=$_GET['user_id'];          
     $database->borrowABook($user_id,$book_id);
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
	box-shadow: 0 0px 4px 0px rgba(0,0,0,.1);
	border-radius: 3px 3px  3px 3px;
	position: relative;
	}
	.head{
		border-bottom:1px solid #F5F4F1;
		background-color:#FFF;
			box-shadow: 0 2px 2px -2px rgba(0,0,0,.1);
	height: 50px;
	width: 100% !important;
	line-height: 50px;
	position: relative;
	z-index: 999;
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
			width: 20px;height: 20px;
			right:-8px;
			top:-8px;
			background-color: #00D25D;
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
	height: 394px;
	background:#fff;
	overflow-y: auto;
	position: absolute;
	right:0;
	top: 53px;
	padding: 0 20px;
	z-index:;
	/*box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.21);*/
	border-radius: 0 0  0 3px;
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
#shelfLabels{
	width: 100%;height: 25px;
	line-height: 20px;
	background-color:#FD7056;/*#5C6489;/*#7184C2;/#1B364A *#FD7056;/*#2F5D84;*/
	filter: drop-shadow( 1px 3px 5px rgba(0,0,0,.25));
	margin:0px 0 0 0px;
	font-family: monospace;
	color:#fff;
}
#titleHead{
width: 96%;
margin: 0 auto;
border:1px solid red;
}
.shelf_OUT_BORDER{
	background-color:#FFF;
	width: 100%;
	max-height: 350px;
	overflow-y: auto;
	margin-bottom: 5px;
	border-radius:0px 0px 3px 3px;
	box-shadow: 0 0px 5px 0px rgba(0,0,0,0.1);
	position: relative;
	}
#bookshelf{
	border:0px solid #ccc;
	border-collapse:collapse;
	width: 95%;
	margin: 0px auto 20px;
	font-family: monospace;
	text-indent: 5px;
	color: #888;
}
#bookshelf tr{
  height: 25px;
	border-bottom:1px dotted #ccc;
}
#bookshelf tr:first-child{
	 border-top:0px solid #ccc;
}
#bookshelf tr td{
	border-right:1px dotted #ccc;
	height:16px;
}
#bookshelf tr td:first-child{
	border-left:1px dotted #ccc;
	border-radius: 3px 0 0 0;
}
#bookshelf tr td:last-child{
	border-radius: 0 3px 0 0;
}
#bookshelf tr:hover{
	transition-duration: 100ms;
	transition-timing-function: cubic-bezier(.86,.01,.01,.99);
	background-color: rgba(224, 230, 235, .41);
}
::-webkit-scrollbar {
    width: 5px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 0px;
}

::-webkit-scrollbar-thumb {
    border-radius: 0px;
  background-color: rgba(0,0,0,0.5);
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
				<span class="logoutSection"><a href="librarianIndex.php">Home</a></span>
			</div>
		<div class="left_Dashboard">
      		<div class=""><a href="index.php"><img src="arrow.png"/></a></div>
						<a href="#"><div class="dashboardBox">
							&nbsp;&nbsp;Borrower request
							<span class="counter">10</span></div>
            </a>
						  <!--<div class="parentbox2" style="text-align:center;">
						      <a class="not_intended_links" href="manage.php">Manage Books</a>
						  </div>-->
		</div>
		<div id="content_col">
			<h3 id="heading">Borrower Request</h3>
			<hr id="hrzLine">
            <div id="shelfLabels">
			<table id="titleHead">
				<tr>
					<td  align="center" width="6%">#</td>
					<td width="39%">Book title</td>
					<td width="25%">User first name</td>
					
					<td width="15%">Action</td>
				</tr>
			</table>
		</div>
		<div class="shelf_OUT_BORDER">

            <form action="studentIndex.php" method="post">
			<table id="bookshelf" width="100%">
			
			    <?php
			    
			         foreach($database->getAllRequestedBooksToApprove() as $books){
			                echo "<tr>";
			                echo "<td>".$books['book_id']."</td>";
		                    echo "<td width='39%'>".$books['title']."</td>";
		                    echo "<td width='25%'>".$books['firstName']."</td>";		                   
		                    echo "<td><center>
		                    <a id='borrow' 
		                    href='borrowerQuery.php?id_to_approve=".$books['book_id']."&&user_id=".$books['user_id']."'>Approve</a></center></td>";
		                    echo"</tr>";
			         }
			    
			    ?>
					
				</tr>				
			</table>
					
          
			</form>
			</div>
		
	</div>
      
		</div>

	</div>
</body>
</html>
