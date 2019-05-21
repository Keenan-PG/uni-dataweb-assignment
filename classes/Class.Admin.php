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
        $sql = "INSERT INTO products (ProductName, ProductType, ProductCondition, ProductPrice, ProductDescription, ProductImgURL) 
        VALUES ('$pName','$pType','$pCondition',$pPrice,'$pDescription','$pImg')"; // building a string with the SQL INSERT you want to run
          
        // use exec() because no results are returned
        $this->db->exec($sql);
        echo "New table record created successfully"; // If successful we will see this
     }
     catch(PDOException $e)
     {
         echo $e->getMessage();
     }
  }


}
?>