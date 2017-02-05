<?php 

    require_once("Database.php");
    require_once("LoginProcessor.php");
    
    LoginProcessor::prepare();
    $user_id=$_SESSION["USER_ID"];    
    $database=new Database();
    
        
    if(isset($_GET['id_to_borrow'])){  
    
        $book_id=$_GET['id_to_borrow'];
      
        $selected_books=$_GET['id_to_borrow'];
        $database->requestABook($user_id,$book_id);       
      
    }else{
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
#uRequestLink{
	color:#888;
	text-decoration: none;
}
#uRequestLink:hover{
	color: #69CB75;
}
#sendRequest{
	margin: 0px 0 20px  20px;
	border:0px solid #E0DFE2;
	height: 25px;
	position: absolute;
	right: 20px;
	background-color:#00D25D;
	color: #Fff;
	font-family: 'source sans pro',sans-serif;
	font-size: 10pt;
	font-weight:normal;
}
</style>
</head>
<body>

	<br/>
<div class="brand">
   <span class="backIcon"><a href="index.php"><img src="book.png"/></a></span>
	<h3 id="bigTitle">digital book borrow</h3></div>
	<div class="indexcont_container">
			<div class="head">
				<span class="searchBoxHOLDER">
				<input type="text" name="" placeholder="Book Title, Author" id="searchBox">
				<input type="submit" name="" class="searchIcon">
				</span>
					<span class="logoutSection"><a href="index.php?logUserout=true">Logout</a></span>
		</div>
		<div id="shelfLabels">
			<table id="titleHead">
				<tr>
					<td  align="center" width="6%">#</td>
					<td width="39%">Book title</td>
					<td width="25%">Author</td>
					<td width="15%">In shelf</td>
					<td width="15%">Choose</td>
				</tr>
			</table>
		</div>
		<div class="shelf_OUT_BORDER">

            <form action="studentIndex.php" method="post">
			<table id="bookshelf" width="100%">
			
			    <?php
			    
			         foreach($database->getAllAvaillableBooks($user_id) as $books){
			                echo "<tr>";
			                echo "<td>".$books['id']."</td>";
		                    echo "<td width='39%'>".$books['title']."</td>";
		                    echo "<td width='25%'>".$books['author']."</td>";
		                    echo "<td  width='10%' align='center'>".$books['count']."</td>";		                   
		                    echo "<td><center><a id='borrow' href='studentIndex.php?id_to_borrow=".$books['id']."'>Request</a></center></td>";
		                    echo"</tr>";
			         }
			    
			    ?>
					
				</tr>				
			</table>
					</div>
                        <button id="sendRequest"><a href="cancelRequest.php">Cancel Request</a></button>
			<br>
			</form>
		
	</div>
	<div id="notficationBar"><strong>Team and condition:</strong><p style="color:#999;margin-top:-10px;">Late submission fine of Tsh 1000 for each book</p></div>

</body>
</html>
