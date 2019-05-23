<?php
class ADMIN
{
   // private db var - security
    private $db;
 
    // setting this->db to the db connection passed by database.php
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
   /*
      USER METHODS
   */
    public function login($uname,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE Username=:uname LIMIT 1");
          $stmt->execute(array(':uname'=>$uname));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(($upass == $userRow['Password']))
             {
                $_SESSION['user_session'] = $userRow['ID'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   // getting user ID from session variable 
   public function getUserID($UID)
   {
      $stmt = $this->db->prepare("SELECT * FROM users WHERE ID=:user_id");
      $stmt->execute(array(":user_id"=>$UID));
      $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

      return $userRow;
   }

   // checking user session (i.e. "logged in?")
   public function IsLoggedIn()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   // logout method - destroys user session 
   public function userLogout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
 
   // small method to simplify redirects 
   public function redirect($url)
   {
       header("Location: $url");
   }



   /*
      PRODUCT METHODS
   */
   

    // save product method - taking args from HTML form and inserting into db 
    public function saveProduct($pName,$pType,$pCondition,$pPrice,$pDescription,$pImg) {
      try
     {
        $sql = "INSERT INTO products (ProductName, ProductType, ProductCondition, ProductPrice, ProductDescription, ProductImgURL) VALUES ('$pName','$pType','$pCondition',$pPrice,'$pDescription','$pImg')"; // building a string with the SQL INSERT you want to run
          
        // use exec() because no results are returned
        $this->db->exec($sql);
        echo "New table record created successfully"; // If successful we will see this
     }
     catch(PDOException $e)
     {
         echo $e->getMessage();
     }
  }

  public function showProducts() {
 
     try
    {
      $sql = "SELECT * FROM products ORDER BY ProductID ASC";

      echo '<table>';
            echo '<tr>';
               echo '<th>Product Name</th>';
               echo '<th>Product Price</th>';
               echo '<th>Product Condition</th>';
               echo '<th>Product Description</th>';
               echo '<th>Edit Product</th>';
               echo '<th>Delete Product</th>';
            echo '</tr>';
      // running foreach using above db connection (passed from database.php) to query db with above sql statement
      foreach($this->db->query($sql) as $row){

         // editable 
         // Product Name, Price, Condition, Description
         // making table with button for respective ID of product (to edit/delete)

         
            echo '<tr>';
               echo '<th>'. $row['ProductName'] .'</th>';
               echo '<th>'. $row['ProductPrice'] .'</th>';
               echo '<th>'. $row['ProductCondition'] .'</th>';
               echo '<th>'. $row['ProductDescription'] .'</th>';
               echo '<th>';
                  echo '<form method="get" action="./edit-product.php">';
                     echo '<input type="hidden" name="productID" value="'. $row['ProductID'] .'">';
                     echo '<input type="submit" class"button" value="Edit">';
                  echo '</form>';
               echo '</th>';               
               echo '<th>';
                  echo '<form method="get" action="./remove-product.php">';
                     echo '<input type="hidden" name="productID" value="'. $row['ProductID'] .'">';
                     echo '<input type="submit" class"button" value="Delete">';
                  echo '</form>';
               echo '</th>';
      }
      echo '</tr>';
   echo '</table>';
  
    }
   //  error handling
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
 }


}
?>