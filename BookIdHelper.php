<?php

    class BookIdHelper{
        
        public static function storeBookId($id){   
        
              if($id!=null){
                     if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                     }
                    $_SESSION['BOOK_ID']=$id;  
              }         
                       
        }
        
        public static function getBookId(){
              if (session_status() == PHP_SESSION_NONE) {
                        session_start();
               }
              return $_SESSION['BOOK_ID'];
        }
        
    }


?>
