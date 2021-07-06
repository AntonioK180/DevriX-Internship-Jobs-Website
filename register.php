<!DOCTYPE HTML>
<html>
<head>
    <title>Regster a new admin</title>

    <?php
      include "php/db_connection.php";


      $connection = OpenCon();

      if(isset($_REQUEST['submit_btn'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

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

  <input type="submit" name="submit_btn">
</form>

</body>
</html>
