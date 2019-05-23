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

    // show all products
    public function showProducts($filter="all") {
      // function variable to assign below
      $sql;

      // changing 
      switch ($filter) {
        case "PC":
            $sql = "SELECT * FROM products WHERE ProductType='Personal Computer'";
            break;
        case "GC":
            $sql = "SELECT * FROM products WHERE ProductType='Games Console'";
            break;
        case "LT":
            $sql = "SELECT * FROM products WHERE ProductType='Laptop'";
            break;
        case "XR":
            $sql = "SELECT * FROM products WHERE ProductType='Virtual/Augmented Reality'";
            break;
        case "OT":
            $sql = "SELECT * FROM products WHERE ProductType='Other'";
            break;
        case "new":
            $sql = "SELECT * FROM products WHERE ProductCondition='New'";
            break;
        case "used":
            $sql = "SELECT * FROM products WHERE ProductCondition='Used'";
            break;
        case "refurb":
            $sql = "SELECT * FROM products WHERE ProductCondition='Refurbished'";
            break;
        case "all": // default param
            $sql = "SELECT * FROM products ORDER BY ProductName DESC";
            break;
        default: 
            break;
      }
    
        try
       {
            
         // running foreach using above db connection (passed from database.php) to query db with above sql statement
         foreach($this->db->query($sql) as $row){
           // making a product "block" 
            echo '<div class="productBlock">';
              echo '<img class="productBlock-Img" src="'. $row['ProductImgURL'] .'"';
              echo '<div class="productBlock-Body">';
                echo '<h5 class="productBlock-Title">'. $row['ProductName'] .'</h5>';
                echo '<p>Price: £'. $row['ProductPrice'] .'</p>';
                echo '<small>Condition: <i>'. $row['ProductCondition'] .'</i></small><br />';
                echo '<small>Category: <strong>'. $row['ProductType'] .'</strong></small>';
                echo '<p class="productBlock-Text">'. $row['ProductDescription'] .'</p>';
                echo '<form method="GET" action="products/reserve.php">';
                  echo '<input type="hidden" name="productID" value="'. $row['ProductID'] .'">';
                  echo '<input type="submit" class"button" value="Reserve/Test Product">';
                echo '</form>';
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

    // Using productID to get productName
    // yes I could just include name in GET request, but because only pID is needed for customer reservation - i found is better to do as it's plainly cosmetic. 
    public function getProductname($pID) {
      try
     {
       // function variable
        $result;
        // getting product name from ID 
        $sqlGetPName = "SELECT * FROM products WHERE ProductID='$pID'";
  
        // breaking productName out of results array
        foreach($this->db->query($sqlGetPName) as $row){
          // saving into above variable
           $result = $row['ProductName'];
        }
  
        // returning
        return $result;
     }
     catch(PDOException $e)
     {
         echo $e->getMessage();
     }
    }

    // method to call on front end 
    public function reserveProduct($cName, $cEmail, $cPhone, $pID, $rForTime) {
      try
     {
       // putting in customer record first
        $sqlCustomer = "INSERT INTO customers (CUSTOMERNAME, CUSTOMEREMAIL, CUSTOMERPHONE) VALUES ('$cName','$cEmail','$cPhone')"; 

        // use exec() because no results are returned
        $this->db->exec($sqlCustomer);

        // getting customer ID from record created
        $sqlGetCID = "SELECT * FROM customers WHERE CUSTOMERNAME='$cName'";

        // saving customer var to assign to later
        $cID;

        // breaking CUSTOMERID out of results array
        foreach($this->db->query($sqlGetCID) as $row){
          // saving into above variable
           $cID = $row['CUSTOMERID'];
        }

        // adding into reservations
        $sqlReservation = "INSERT INTO reservations (CUSTOMERID, ProductID, ReserveForTime) VALUES ('$cID','$pID','$rForTime')"; 
           
        // use exec() because no results are returned
        $this->db->exec($sqlReservation);

        // returning true for conditional
        return true;
     }
     catch(PDOException $e)
     {
         echo $e->getMessage();

         // returning true for conditional
         return false;
     }
  }


  // small method to simplify redirects 
  public function redirect($url)
  {
      header("Location: $url");
  }
    
}
?>