<?php
  include 'db_connection.php';
  $connection = OpenCon();
  echo "Connected Successfully" ."<br>";

  $sql = "select * from joboffers";
  $result = $connection->query($sql);

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      echo $row['id'] ." " .$row['title'] ." " .$row['company'] ."<br>";
    }
  } else {
    echo "0 results";
  }


  CloseCon($connection);
?>
