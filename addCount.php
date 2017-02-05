<?php

require_once("Database.php");
require_once("BookIdHelper.php");
$database=new Database();

$book_single_row=null;
if(isset($_GET['book_id'])){
    BookIdHelper::storeBookId($_GET['book_id']);
    $book_single_row=$database->getABookToEdit($_GET['book_id']);
}else{
    $book_single_row=$database->getABookToEdit(BookIdHelper::getBookId());
}


if(isset($_POST['newCount'])){

     $newCount=$_POST['newCount'];         
     $database->setNewCount(BookIdHelper::getBookId(),$newCount);

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
	width:40%;
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
	width:97%;
	height: 394px;
	background:#fff;
	overflow-y: auto;
	position: absolute;
	left:0;
	top: 53px;
	padding: 0 10px;
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
#specialTables{
	border:1px solid #ccc;
	border-collapse:collapse;
	width: 100%;
  margin-bottom: 10px;
	font-family:'source sans pro',sans-serif;
  font-size: 9pt;
  font-weight: lighter;
	color: #888;
}
#ApprvBtn{
  position: relative;
  right: -10px;
  width: 60px;height: 23px;
  line-height: 0px;
  font-family:'source sans pro',sans-serif;
    font-size: 9pt;
    font-weight: normal;
    background-color:  #53d769;
    color: #fff;
    border:none;
    border-radius: 3px;
}
#shelfLabels{
	width: 100%;height: 25px;
	line-height: 20px;
	background-color:#5C6489;/*#7184C2;/#1B364A *#FD7056;/*#2F5D84;*/
	filter: drop-shadow( 1px 10px 10px rgba(0,0,0,.25));
	margin:0px 0 0 0px;
	font-family: monospace;
	color:#fff;
}
#titleHead{
width: 100%;
margin: 0 auto;
}
.shelf_OUT_BORDER{
	background-color:#fff;
	width: 100%;
	max-height: 313px;
	overflow-y: auto;
	margin-bottom: 5px;
	position: relative;
	}
#bookshelf{
	border:0px solid #ccc;
	border-collapse:collapse;
	width: 100%;
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
	border-right:0px dotted #ccc;
	height:16px;
}
#bookshelf tr td:first-child{
	border-left:0px dotted #ccc;
	border-radius: 3px 0 0 0;
}
#bookshelf tr td:last-child{
	border-radius: 0 3px 0 0;
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
  background-color: rgba(0,0,0,0.3);
}

#addcountICON{
	font-size: 13pt;
	font-weight: bold;
	text-decoration: none;
	color: #00B6E3;
}
#editICON{
	font-size: 12pt;
	font-weight: bold;
	text-decoration: none;
	color: #999;

}
#deleteICON{
	font-size: 10pt;
	font-weight: bold;
	text-decoration: none;
	color: #FD7056 ;
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
				<span class="logoutSection"><a href="allbook.php">Home</a></span>
			</div>

		<div id="content_col">
			<h3 id="heading">All books</h3>
			<hr id="hrzLine">
      <div id="shelfLabels">
  			<table id="titleHead" border="0" >
  				<tr>
  					<td  align="center" width="6%">#</td>
  					<td width="39%">Book title</td>
  					<td width="25%">Author</td>
  					<td width="15%">Count</td>
            <td width="15%">Controls</td>
  				</tr>
  			</table>
  		</div>
  		<div class="shelf_OUT_BORDER">

  			<table id="bookshelf" width="100%" border="1">
  			
  			<?php
  			       $book_single_row=$database->getABookToEdit(BookIdHelper::getBookId());
  			       echo"<tr>";
				   echo "<td>".$book_single_row[0]['id']."</td>";
				   echo "<td>".$book_single_row[0]['title']."</td>";
				   echo "<td>".$book_single_row[0]['author']."</td>";
				   echo "<td>".$book_single_row[0]['count']."</td>";
				   echo "<td  width='18%' align='center'>";
				   echo "<span><a href='' id='editICON'>&#x270e;</a></span>";
				   echo "<span><a href='' id='deleteICON'>&#10060;</a></span></td>";
				   echo"</tr>"; 	
  			
  			?>
  			
  			</table>
  		</div>
      <form action="addCount.php" method="post">
        <fieldset id="fieldset2">
           <legend>Edit Book count</legend>
           <input type="text" name="newCount" id="textBox2"placeholder="new count"><br>
           <input type="submit" name="sender" value="update" style="border:none;background-color:#00B6E3;color:#fff;height:22px"/>
        </fieldset>
      </form>
		</div>

	</div>
</body>
</html>
