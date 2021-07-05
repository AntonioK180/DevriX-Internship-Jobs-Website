<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <?php
      include 'db_connection.php';
      $connection = OpenCon();
      echo "Connected Successfully" ."<br>";

      $sql = "select * from joboffers";
      $result = $connection->query($sql);

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          echo $row['id'] ." " .$row['title'] ." " .$row['company'] ." " .$row['salary'] ."<br>";
        }
      } else {
        echo "0 results";
      }


      CloseCon($connection);
    ?>
</head>
<body>
  <p>Hello, DevriX</p>
  <a href="create_job.html"> Create a new offer </a>
</body>
</html>
