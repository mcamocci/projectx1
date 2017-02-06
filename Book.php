<?php

    require_once("Database.php");
    
     class Book{
     
            public static $connection;
            
            public static function insertBook($title,$category,$author,$copy_count){
            
                $database=new Database();
                
                $querryAuthorId="SELECT Author.ID FROM Author WHERE Author.firstName='$author' LIMIT 1";
                $resultSetAuthorId=$database->connection->query($querryAuthorId);
                
                while($row=$resultSetAuthorId->fetch_assoc()){
                
                    self::$connection=$database->connection;
                    $author_id=$row['ID'];
                    
                    $sql="INSERT INTO Book(title,category,author,copy_count) VALUES ('$title','$category',$author_id,$copy_count);";
                    
                    if(self::$connection->query($sql)){
                    
                        return true;
                        
                    }else{
                        return false;
                        
                    }
                    
                    break;
                }
                              
            }
            
            
            public static function resolveConflicts($book_id,$count){
                
                if($count<1){
                     return "not availlale";
                }else{
                    return $count;
                }
            }
            
            public static function resolveChoice($book_id,$count){
                
                if($count<1){
                     return "<a id='borrow' href='searchResult.php?id_to_borrow=".$book_id."'>return date</a>";
                }else{
                    return "<a id='borrow' href='studentIndex.php?id_to_borrow=".$book_id."'>Request</a>";
                }
                
            }
               
            public static function getAllAvaillableBooks($user_id){
            
                    $querry=null;
                    $database=new Database();
                    $connection=$database->connection;
                    
                    if(isset($_POST['search'])){
                    
                        $search_word=mysqli_real_escape_string($connection,$_POST['search']);
                                            
                        $querry="select Book.id,Book.title,Book.copy_count as count,
                        Author.firstName AS author from  Book JOIN Author ON
                        Book.author=Author.id AND Book.id NOT 
                        IN(SELECT Requested_Book.book_id FROM Requested_Book WHERE Requested_Book.user_id=$user_id) 
                             AND Book.id NOT IN(SELECT Borrowed_Book.book_id FROM Borrowed_Book WHERE Borrowed_Book.user_id=$user_id)
                              WHERE Author.firstName LIKE '%$search_word%' OR Book.title LIKE '%$search_word%';";  
                         
                                                
                    }else{
                        $querry="select Book.id,Book.title,Book.copy_count as count,Author.firstName AS author from  Book JOIN Author ON
                             Book.author=Author.id AND Book.id 
                             NOT IN(SELECT Requested_Book.book_id FROM Requested_Book WHERE Requested_Book.user_id=$user_id)
                             AND Book.id NOT IN(SELECT Borrowed_Book.book_id FROM Borrowed_Book WHERE Borrowed_Book.user_id=$user_id);"; 
                    }
            
                   
                  
                    $resultset=$connection->query($querry);            
                    $books=array();
                    
                    while($row=$resultset->fetch_assoc()){                
                            $books[]=$row;            
                    }
                    
                    return $books;
            
            }
            
            
            //this function is to get top three books which are to be returned earlier. 
            
             public static function getTheThree($book_id){    
                     
                $querry="SELECT Book.id as id ,lastName,Book.title,date_borrowed,date_return,TIMESTAMPDIFF(DAY,date_borrowed,date_return) 
                AS DATE,TIMESTAMPDIFF(MINUTE,date_borrowed,date_return) 
                AS MINUTES FROM Borrowed_Book JOIN Book ON Book.id=Borrowed_Book.book_id JOIN User ON User.id=Borrowed_Book.user_id
                WHERE Book.id=$book_id ORDER BY MINUTES LIMIT 3;";
                
                $database=new Database();                
                $connection=$database->connection;         
                $resultset=$connection->query($querry);
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
            
        public static function cancelRequest($book_id,$user_id){
    
            $database=new Database();                
            $connection=$database->connection; 
                
            $querry="DELETE FROM Requested_Book WHERE Requested_Book.book_id=$book_id AND Requested_Book.user_id=$user_id;";
            $resultset=$connection->query($querry);   
            
            if($resultset){
            
                return true;
                
            }else{
            
                return false;
                
            }     
        
        }
            
            
     }




?>
