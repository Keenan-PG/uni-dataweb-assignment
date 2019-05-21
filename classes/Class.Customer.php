<?php
class CUSTOMER
{
   // private db var - security
    private $db;
 
    // setting this->db to the db connection passed by database.php
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

    // method to call on front end 
    public function showProducts() {
        try
       {
          // saving select all as string 
         $sql = "SELECT * FROM products ORDER BY ProductName DESC";
            
         // running foreach using above db connection (passed from database.php) to query db with above sql statement
         foreach($this->db->query($sql) as $row){
             echo 'Field 1: ' . $row['ProductName'] . '<br>';
         }
     
       }
      //  error handling
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
    }
    
}
?>