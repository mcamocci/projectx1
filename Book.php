<?php

    require_once("Database.php");
    
     class Book{
     
            public static $connection;
            
            public static function insertBook($title,$category,$author,$copy_count){
            
                $database=new Database();
                self::$connection=$database->connection;
                $sql="INSERT INTO Book(title,category,author,copy_count) VALUES ('$title','$category','$author',$copy_count);";
                
                if(self::$connection->query($sql)){
                    return true;
                }else{
                    return false;
                }
                
              
            }
            
            
     }




?>
