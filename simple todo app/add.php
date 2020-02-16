<?php

  include "includes/connection.php";
  include "includes/functions.php"; 
  $task = '';

  if(isset($_POST["Add"])){

  $task = test_input($_POST['text']);

   try {
       $sql = "INSERT INTO `todo` (`id`, `task`) VALUES (NULL, :task);";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':task', $task);
       $stmt->execute();
       toMain();
   }
   catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
   }
?>