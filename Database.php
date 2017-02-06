<?php

class Database{


    var $connection;

    function __construct($host="localhost",$username="root",$password="haikarose",$database="projectx"){    
        $this->connection=new mysqli($host,$username,$password,$database);            
    }
    
    public function getAllBorrowedToReturn(){
        
            $querry=" SELECT Borrowed_Book.id as bid, Book.id as id ,Borrowed_Book.date_return as dayto,
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
    
    
    public function getCountsBorrowingOrRequest($user_id){
        
        $countOneSql="SELECT COUNT(*) as total FROM Borrowed_Book WHERE Borrowed_Book.user_id=$user_id;";
        $countTwoSql="SELECT COUNT(*) as total FROM Requested_Book WHERE Requested_Book.user_id=$user_id;";
        
        $countOne=0;
        $countTwo=0;
        
        $resultsetOne=$this->connection->query($countOneSql);
        
        while($row=$resultsetOne->fetch_assoc()){
            $countOne=$row['total'];
        }
        
        $resultsetTwo=$this->connection->query($countOneSql);
        
        while($row=$resultsetTwo->fetch_assoc()){
            $countTwo=$row['total'];
        }
        
         
        $total=$countOne+$countTwo;
        
        echo $total;
        
        return $total;
        
    }
    
    public function requestABook($user_id,$book_id){
    
    
          if($this->getCountsBorrowingOrRequest($user_id)<5){
          
                $querry="insert into Requested_Book(user_id,book_id) values('$user_id','$book_id')";            
          
              if( $this->connection->query($querry)){            
                    return 1;         
              }else{
                   return 0;
              }       
          }                  
          
    }
    
    
    public function getAllRequestedBooksToApprove(){
        $querry="SELECT Requested_Book.user_id as user_id,Requested_Book.id as request_id,Book.id as book_id,
        User.firstName,Book.title FROM Requested_Book JOIN Book on   Requested_Book.book_id=Book.id JOIN User ON 
        Requested_Book.user_id=User.id;";
        
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
       
        $querry=" select Requested_Book.id as bid,Book.id as id ,Book.title,User.firstName AS username from  User JOIN Requested_Book ON
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
    
      
    public function getCountAvaillable(){
        $querry="SELECT SUM(Book.copy_count) as total FROM Book WHERE Book.copy_count>0;"; 
        $resultset=$this->connection->query($querry);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['total'];
        }
        
        return $count;
    }
    
    
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
    
    
    public function getCountAllBorrowedBook(){
        $querry="SELECT COUNT(*) as total FROM Borrowed_Book"; 
        $resultset=$this->connection->query($querry);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['total'];
        }
        
        return $count;
    }


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
    
    
    public function returnBorrowedBook($book_id,$user_id){
    
        $querry="DELETE FROM Borrowed_Book WHERE book_id=$book_id AND user_id=$user_id;";
        $resultset=$this->connection->query($querry);   
        if($resultset){
        
            if($this->increaseBookCount($book_id)){
                 return 1;
            }else{
                return 0;
            }
            
        }     
    
    }
      
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
    
      
    public function setNewCount($book_id,$count){
    
        $sql="UPDATE Book SET copy_count=$count WHERE Book.id=$book_id";
        
        if($this->connection->query($sql)){
            echo "it worked";           
        }
       
               
    
    }
    
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
      
    public function getRow($id){
        $sql="SELECT * FROM User WHERE id='$id'";
        $resultSet=$this->connection->query($sql);
        $the_single_row=null;
        
        while($row=$resultSet->fetch_assoc()){
            $the_single_row[]=$row;
        }
        
        return $the_single_row;          
        
    }
       
    public function getPs($id){
        $sql="SELECT Password FROM Librarian WHERE id='$id'";
        $resultSet=$this->connection->query($sql);
        $the_single_row=null;
        
        while($row=$resultSet->fetch_assoc()){
            $the_single_row[]=$row;
        }
        
        return $the_single_row[0]['Password'];           
        
    }
    
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
