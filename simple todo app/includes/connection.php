<?php
require 'constants.php';

try {
    $conn = new PDO("mysql:host=localhost;dbname=todo_app_db", username, password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Connected successfully
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>