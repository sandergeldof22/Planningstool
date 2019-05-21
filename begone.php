<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname	= "Planningstool";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Planningstool", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    

if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM `games` WHERE id=$id";
        try {           
            $statement = $conn->prepare($sql);
            $statement->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

?>