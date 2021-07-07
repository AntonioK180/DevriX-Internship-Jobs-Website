<!DOCTYPE HTML>
<html>
<head>
    <title>Log in as Admin</title>

    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/master.css">
  	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <?php
      include "php/db_connection.php";


      session_start();
      $connection = OpenCon();

      if(isset($_REQUEST['submit_btn'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hash_password = md5($password);

        $sql_select = "SELECT * FROM admins WHERE username='$username' AND password='$hash_password'";
        $result = $connection->query($sql_select);
        if($result->num_rows == 1){
          $_SESSION['username'] = $username;
          $_SESSION["loggedin"] = true;

          header('Location: ' . '/DevriX-Internship-Jobs-Website', true, 303);
        } else {
          echo "Invalid creditentials!";
        }
      }

    ?>

</head>
<body>
  <form action="" method="post">
  <label>Username: </label><input type="text" name="username"><br>
  <label>Password: </label><input type="password" name="password"><br>

  <input type="submit" name="submit_btn" value="LogIn as Admin">
</form>

  <?php include "php/footer.php" ?>

</body>
</html>
