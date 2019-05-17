<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        
        //database connection variables for a typical local development
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "my_database_name_here"; //database name that you have already created that you want to connect to
        


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //building a new connection object
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Selecting multiple rows from a MySQL database using the PDO::query function.
            $sql = "SELECT field1, field2, field3 FROM my_table ORDER BY field1 DESC";
            
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    echo 'Field 1: ' . $row['field1'] . '<br>';
                    echo 'Field 2: ' . $row['field2'] . '<br>';
                    echo 'Field 3: ' . $row['field3'] . '<br>';
                    echo '<hr><br>';
                }
            
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful we will see an error
            }
        ?>


</body>
</html>