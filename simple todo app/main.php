<?php
  include "includes/connection.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Group Number 9 - Simple Todo list App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<body class="dummy">

<h1>Todo list App</h1>
<div class="container tasks">
<ul>
    <?php
    //tasks are displayed using try catch
    try {
        $viewsqlstmnt = "SELECT * FROM `todo`";
        $result = $conn->query($viewsqlstmnt);

        foreach($result as $row ){
            echo " <li><div class='row'>
                        <form action='Updelete.php' method='post'>
                            <div class='col-xs-10'><input contenteditable='true' name='text' class='output' value='" . $row['task'] . "' /></div>
                            <div class='col-xs-1'><input type='submit' value='Update' name='Update' class='btn btn-warning update' /></div>
                            <div class='col-xs-1'><input type='submit' value='Delete' name='Delete' class='btn btn-danger delete' /></div>
                            <input type='hidden' name='id' value='" . $row['id'] . "' />
                        </form>
                    </div></li>";

        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    ?>

    <li><div class='row'>
        <form action="add.php" method="post">
            <div class='col-xs-10'><input type="text" id="add" placeholder="What do you need to do?" required="required" name="text" /></div>
            <div class='col-xs-2'><input type="submit" value="Add" name="Add" class='btn btn-lg btn-default' /></div>
        </form>
    </div></li>
</ul>
</div> 
<footer class="lorem">
© 2020 Group Number 9
</footer>
</body>
</html>