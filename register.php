<!DOCTYPE HTML>
<html>
<head>
    <title>Regster a new admin</title>

    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/master.css">
  	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <?php
      include "php/db_connection.php";

      session_start();
      $connection = OpenCon();

      if(isset($_REQUEST['submit_btn'])){
        $username = filter_var(mysqli_real_escape_string($connection, $_POST['username']), FILTER_SANITIZE_STRING);
        $password = filter_var(mysqli_real_escape_string($connection, $_POST['password']), FILTER_SANITIZE_STRING);

        $hash_password = md5($password);

        $sql_insert = "INSERT INTO admins(username, password) VALUES('$username', '$hash_password')";
        $connection->query($sql_insert);
      }
    ?>

</head>
<body>
  <form action="" method="post">
    <label>Username: </label><input type="text" name="username"><br>
    <label>Password: </label><input type="password" name="password"><br>

    <input type="submit" name="submit_btn" value="Register a new Admin">
  </form>

<?php include "php/footer.php" ?>

</body>
</html>
