<!DOCTYPE HTML>
<html>
<head>
    <title>Log in as Admin</title>

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

  <input type="submit" name="submit_btn">
</form>

<footer class="site-footer">
  <p>Copyright 2020 | Developer links:
    <a href="./index.php">Home</a>,
    <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo '<a href="./edits.php">Edits</a>,';
        echo '<a href="./logout.php">LogOut</a>,';
      }
    ?>
    <a href="./single_offer.php">Single</a>,
    <a href="./login.php">LogIn</a>
  </p>
</footer>

</body>
</html>
