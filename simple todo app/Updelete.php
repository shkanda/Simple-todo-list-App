<?php

  include "includes/connection.php";
  include "includes/functions.php";

  $task = 'default, means sql executing';

  if(isset($_POST["Delete"])){

  //$task = test_input($_POST["text"]);
  $id = test_input($_POST["id"]);

        try {
       $sql = "DELETE FROM `todo` WHERE `todo`.`id` = ".$id .";";
       $conn->exec($sql);
    toMain();
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
   }

   if(isset($_POST["Update"])){

  $task = test_input($_POST['text']);
  $id = test_input($_POST["id"]);

        try {
       $sql = "UPDATE `todo` SET `task` = :task WHERE `todo`.`id` = :id;";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':task', $task);
       $stmt->bindParam(':id', $id);
       $stmt->execute();
    toMain();
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
   }

?>