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
           // making a product "block" 
            echo '<div class="productBlock">';
              echo '<img class="productBlock-Img" src="'. $row['ProductImgURL'] .'"';
              echo '<div class="productBlock-Body">';
                echo '<h5 class="productBlock-Title">'. $row['ProductName'] .'</h5>';
                echo '<small>Condition: <i>'. $row['ProductCondition'] .'</i></small>';
                echo '<small>Category: <strong>'. $row['ProductType'] .'</strong></small>';
                echo '<p class="productBlock-Text">'. $row['ProductDescription'] .'</p>';
                echo '<a href="#"><button>Reserve/Test Product</button></a>';
              echo '</div>';
            echo '</div>';
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