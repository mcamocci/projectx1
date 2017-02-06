<?php

    require_once("Database.php");
    
     class Author{
     
            public static $connection;
            
            public static function insertAuthor($authorName){
            
                $database=new Database();
                self::$connection=$database->connection;
                $name=mysqli_real_escape_string(self::$connection,$authorName);
                $sql="INSERT INTO Author(firstname) VALUES('$name')";
                
                if(self::$connection->query($sql)){
                    return true;
                }else{
                    return false;
                }
                
              
            }
            
            public static function getAuthorNames(){
                
                $database=new Database();
                self::$connection=$database->connection;
                
                $sql="SELECT firstName FROM Author;";
                $resultSet=self::$connection->query($sql);  
                
                $authorItems;
                while($row=$resultSet->fetch_assoc()){                
                    $authorItems[]=$row;                    
                }
               
                return $authorItems;
            
            }
            
            
     }




?>
