<?php
class USER
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }

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
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>