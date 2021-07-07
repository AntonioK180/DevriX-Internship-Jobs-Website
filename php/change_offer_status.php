<?php
  include 'db_connection.php';
  $connection = OpenCon();

  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
       $url = "https://";
  else
       $url = "http://";

  $url.= $_SERVER['HTTP_HOST'];

  $url.= $_SERVER['REQUEST_URI'];

  $url_components = parse_url($url);
  parse_str($url_components['query'], $params);
  $id = $params['job_id'];

  $sql_select = "SELECT * FROM joboffers WHERE id='$id'";
  $result = $connection->query($sql_select);
  if($result->num_rows == 1){
    $data = $result->fetch_assoc();
    echo $data['activated'];
    if($data['activated']){
      $sql_update = "UPDATE joboffers SET activated = 0 WHERE id='$id'";
    } else {
      $sql_update = "UPDATE joboffers SET activated = 1 WHERE id='$id'";
    }
  }

  if ($connection->query($sql_update) === TRUE) {
    echo "Successfully updated an existing record. <br>";
  } else {
    echo "Error: " . $sql_update . "<br>" . $connection->error;
  }
  CloseCon($connection);

  header('Location: ' .'/DevriX-Internship-Jobs-Website/edits.php', true, 303);

?>
