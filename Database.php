<?php

class Database{


    var $connection;

    function __construct($host="localhost",$username="root",$password="haikarose",$database="projectx"){    
        $this->connection=new mysqli($host,$username,$password,$database);            
    }
    
    //get all borrowedBook for returning them.
    public function getAllBorrowedToReturn(){
        
            $querry=" SELECT Borrowed_Book.id,Borrowed_Book.date_return as dayto,
            User.firstName as user_name,Borrowed_Book.user_id as user_id,Book.title FROM Borrowed_Book JOIN Book 
            ON Borrowed_Book.book_id=Book.id JOIN User ON Borrowed_Book.user_id=User.id;";   
                              
            $resultset=$this->connection->query($querry);            
            $books=array();
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }
            
            return $books;
    
    }
    
    
    //get all books    
    public function getAllBooks(){
        
            $querry="select Book.id,Book.title,Book.copy_count as count,Author.firstName AS author from  Book JOIN Author ON
                     Book.author=Author.id;";   
                              
            $resultset=$this->connection->query($querry);            
            $books=array();
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }
            
            return $books;
    
    }
    
    

    //get all availlable books    
    public function getAllAvaillableBooks($user_id){
        
            $querry="select Book.id,Book.title,Book.copy_count as count,Author.firstName AS author from  Book JOIN Author ON
                     Book.author=Author.id AND Book.id 
                     NOT IN(SELECT Requested_Book.book_id FROM Requested_Book WHERE Requested_Book.user_id=$user_id) AND Book.copy_count>0;";   
                              
            $resultset=$this->connection->query($querry);            
            $books=array();
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }
            
            return $books;
    
    }
    
    
    public function requestABook($user_id,$book_id){
                  
          $querry="insert into Requested_Book(user_id,book_id) values('$user_id','$book_id')";            
          
          if( $this->connection->query($querry)){            
                return 1;         
          }else{
               return 0;
          }       
        
    }
    
    
    public function getAllRequestedBooksToApprove(){
        $querry="SELECT Requested_Book.user_id as user_id,Requested_Book.id as request_id,Book.id as book_id,
        User.firstName,Book.title FROM Requested_Book JOIN Book on   Requested_Book.book_id=Book.id JOIN User on Requested_Book.user_id=User.id;";
        
        $resultset=$this->connection->query($querry);
                
        $books=array();
                
        while($row=$resultset->fetch_assoc()){                
             $books[]=$row;            
        }
                
        return $books;    
        
    }
    
    public function getAllRequestedBooks(){
    
                $querry="select * from Book where Book.id in (select id from Borrowed_Book)";            
                $resultset=$this->connection->querry();
                
                $books;
                
                while($row=$resultset->fetch_assoc()){                
                        $books[]=$row;            
                }
                
                return $books;    
    
    }
    
    
    public function getMyBorrowings($user_id){
       
        $querry=" select Requested_Book.id,Book.title,User.firstName AS username from  User JOIN Requested_Book ON
                     Requested_Book.user_id=User.id JOIN Book on Book.id=Requested_Book.book_id AND User.id='$user_id';";
        
         $resultset=$this->connection->query($querry);
            
            $books=array();
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }     
                   
            return $books;
         
    
    }
    
    public function getAllBorrowedBooks(){
    
    
            $querry="select Book.id,Book.title,Book.copy_count as count,Author.firstName AS author from  Book JOIN Author ON
                     Book.author=Author.id AND Book.id in (select book_id from Borrowed_Book);";  
               
            $resultset=$this->connection->query($querry);
            
            $books=array();
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }            
            return $books;
    
    }
    

    public function approveLoginUser($username,$password){    
    
        $querry="select distinct * from User where username=? and password=?";
        $statement=$connection->prepare($querry);
        $statement->bind_params("binded",$username,$password);
       
        $success=0;
        
        while($row=$statement->$statement->querry()->fetch_assoc()){
        
           $_SESSION["USER_ID"]=$row["identification_number"];
           $succes=1;      
        } 
        
        if($success==1){
            session_start();
            header("Location: ");   
        }
    }
    
    
    //this function is for the user registration in the database    
    public function registerUser($id,$firstName,$lastName,$phone,$role,$password){   
             
        if($role==0){
            
           $querry="SELECT * FROM Lecturer where id ='$id'";
           $querrySave="INSERT INTO 
           User(id,firstName,lastName,phone,password,role) values('$id','$firstName','$lastName','$phone','$password','$role')";
           
           $resultSet=$this->connection->query($querry);
         
           while($row=$resultSet->fetch_assoc()){
                $this->connection->query($querrySave); 
                header("Location: index.php");               
           }
           
        
        }else if($role==1){
          $querry="SELECT * FROM Student where id ='$id'";
           $querrySave="INSERT INTO 
           User(id,firstName,lastName,phone,password,role) values('$id','$firstName','$lastName','$phone','$password','$role')";
           
           $resultSet=$this->connection->query($querry);
           while($row=$resultSet->fetch_assoc()){
                $this->connection->query($querrySave); 
                header("Location: index.php");    
           }        
        }
    
    }
    
      
    //get the count of all availlable books
    public function getCountAvaillable(){
        $querry="SELECT SUM(Book.copy_count) as total FROM Book WHERE Book.copy_count>0;"; 
        $resultset=$this->connection->query($querry);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['total'];
        }
        
        return $count;
    }
    
    
    //get the count of all the books
    public function getCountAllBook(){
        $querry="SELECT SUM(Book.copy_count) as total FROM Book"; 
        $resultset=$this->connection->query($querry);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['total'];
        }
        
        return $count;
    }
    
    
    public function getCountRequest(){
    
        $querry="SELECT COUNT(*) as total FROM Requested_Book"; 
        $resultset=$this->connection->query($querry);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['total'];
        }
        
        return $count;
    
    }
    
    
    //get the count of all borrowed books
    public function getCountAllBorrowedBook(){
        $querry="SELECT COUNT(*) as total FROM Borrowed_Book"; 
        $resultset=$this->connection->query($querry);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['total'];
        }
        
        return $count;
    }


    //this function is for borrowing book///        
    public function borrowABook($user_id,$book_id){  
    
        $dateBorrowed=date('Y-m-d H:i:s');
        $dateToReturn=date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s')."+14 days"));
        $querry="INSERT INTO Borrowed_Book (user_id,book_id,date_borrowed,date_return) VALUES (?,?,?,?)";
        $statement=$this->connection->prepare($querry);
        $statement->bind_param("iiss",$user_id,$book_id,$dateBorrowed,$dateToReturn);
        
        if($this->deleteRequestedBook($user_id,$book_id)){
        
       
             if($resultset=$statement->execute()){
             
                $this->decreaseBookCount($book_id);
                
                return true;
            }else{
                return false;
            }               
        }
        
       
    }
    
    //this function is for returning the borrowed book.    
    public function returnBorrowedBook($book_id,$user_id){
    
        echo "test 1 passed";
        
        
        $querry="DELETE FROM Borrowed_Book WHERE book_id=$book_id AND user_id=$user_id;";
        $resultset=$this->connection->query($querry);   
        if($resultset){
        
            echo "test 2 passed";
            if($this->increaseBookCount($book_id)){
                echo "test 3 passed";
            }else{
                echo "test 3 faile";
            }
            
        }     
    
    }
    
    //this function is to get top three books which are to be returned earlier.    
     public function getTheThree($book_id){    
             
        $querry="SELECT Book.id as id ,lastName,Book.title,date_borrowed,date_return,TIMESTAMPDIFF(DAY,date_borrowed,date_return) 
        AS DATE,TIMESTAMPDIFF(MINUTE,date_borrowed,date_return) 
        AS MINUTES FROM Borrowed_Book JOIN Book ON Book.id=Borrowed_Book.book_id JOIN User ON User.id=Borrowed_Book.user_id
        WHERE Book.id=$book_id ORDER BY MINUTES LIMIT 3;";
                
        $resultset=$this->connection->query($querry);
        $topThree;
                
        $tracker=false;        
        while($row=$resultset->fetch_assoc()){   
             $tracker=true;     
             $topThree[]=$row;        
        }        
        if($tracker){
            return $topThree;
        }else{
               $topThree=array();
               return $topThree;
        }
         
    }
    
    
    //this function is for the book searching process
    public function searchTheBooks($keyword){
        
            $querry="SELECT Book.id,Book.title,Book.copy_count AS count,Author.firstName AS author FROM  Author JOIN Book ON
                     Book.author=Author.id AND Author.lastName LIKE '%$keyword%' 
                     OR Author.firstName LIKE '%$keyword%' OR Book.title LIKE '%$keyword';";   
                              
            $resultset=$this->connection->query($querry);            
            $books;
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }
            
            return $books;
    
    }
    
    //this function is for decreasing the number of books    
    public function decreaseBookCount($book_id){
    
        $sql="SELECT copy_count FROM Book WHERE Book.id =$book_id";
        $resultset=$this->connection->query($sql);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['copy_count'];
        }
        
        if($count!=0){
            $count=$count-1;
        }
        
        $sql2="UPDATE Book SET copy_count=$count WHERE Book.id=$book_id;";
        $resultset=$this->connection->query($sql2);
        
        
    }
    
    
     //set new book counts   
    public function setNewCount($book_id,$count){
    
        $sql="UPDATE Book SET copy_count=$count WHERE Book.id=$book_id";
        
        if($this->connection->query($sql)){
            echo "it worked";           
        }
       
               
    
    }
    
    //this function is for increasing the number of books    
    public function increaseBookCount($book_id){
    
        $sql="SELECT copy_count FROM Book WHERE Book.id =$book_id";
        $resultset=$this->connection->query($sql);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['copy_count'];
        }        
        $count=$count+1;            
        $sql2="UPDATE Book SET copy_count=$count WHERE Book.id=$book_id;";
        
        if($resultset=$this->connection->query($sql2)){
            return true;
        }else{
            return false;
        }
    
    }
    
    //this function is for getting the single row of user from the database for the password comparison    
    public function getRow($id){
        $sql="SELECT * FROM User WHERE id='$id'";
        $resultSet=$this->connection->query($sql);
        $the_single_row=null;
        
        while($row=$resultSet->fetch_assoc()){
            $the_single_row[]=$row;
        }
        
        return $the_single_row;          
        
    }
    
    //this function is for getting the single row of user from the database for the password comparison    
    public function getPs($id){
        $sql="SELECT Password FROM Librarian WHERE id='$id'";
        $resultSet=$this->connection->query($sql);
        $the_single_row=null;
        
        while($row=$resultSet->fetch_assoc()){
            $the_single_row[]=$row;
        }
        
        return $the_single_row[0]['Password'];           
        
    }
    
    //this function is for deleting the requested_book
    
    public function deleteRequestedBook($user_id,$book_id){
        
        echo $user_id;
        echo $book_id;
        
        $sql="DELETE FROM Requested_Book WHERE Requested_Book.book_id=$book_id AND Requested_Book.user_id=$user_id;";
        
        if($this->connection->query($sql)){
            
            return true;
        }else{
            echo "the true failed";
            return false;
        }
       
    
    }   
    
     //get a book to edit   
    public function getABookToEdit($book_id){
        
            $querry="select Book.id,Book.title,Book.copy_count as count,Author.firstName AS author from  Book JOIN Author ON
                     Book.author=Author.id AND Book.id=$book_id;";   
                              
            $resultset=$this->connection->query($querry);            
            $books=array();
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }
            
            return $books;
    
    }
  
    
}


   



?>
