<footer class="site-footer">
  <p>Copyright 2020 | Developer links:
    <a href="./index.php">Home</a><?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo ', <a href="./edits.php">Edits</a>';
        echo ', <a href="./php/logout.php">LogOut</a>';
      } else {
        echo ', <a href="./login.php">LogIn</a>';
      }
    ?>
  </p>
</footer>
