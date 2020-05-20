<?php  
            require_once('config.php');  

    class dbConnect {  
        function __construct() {  
          
        }  
        public static function connect()
        {
              $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABSE);  
            // mysqli_select_db(DB_DATABSE, $conn);  
            if(!$conn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }  
            else {
            return $conn;  
                 
             } 
        }
        public function Close(){  
            mysqli_close();  
        }  
    }  
?> 