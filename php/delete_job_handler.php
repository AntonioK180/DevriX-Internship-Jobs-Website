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


  $sql_delete = "DELETE FROM joboffers WHERE id = '$id'";
  if ($connection->query($sql_delete) === TRUE) {
    echo "Successfully deleted a record. <br>";
  } else {
    echo "Error: " . $sql_delete . "<br>" . $connection->error;
  }


  CloseCon($connection);

  header('Location: ' . '/DevriX-Internship-Jobs-Website/edits.php', true, 303);
  die();
?>
