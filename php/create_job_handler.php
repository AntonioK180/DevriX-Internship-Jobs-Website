<?php
  include 'db_connection.php';
  $connection = OpenCon();


  $job_title = mysqli_real_escape_string($connection, $_POST['job_title']);
  $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
  $salary = mysqli_real_escape_string($connection, $_POST['salary']);
  $description = mysqli_real_escape_string($connection, $_POST['description']);

  $sql = "INSERT INTO joboffers(title, company, salary, description) VALUES ('$job_title', '$company_name', $salary, '$description')";

  if ($connection->query($sql) === TRUE) {
    echo "New record created successfully <br>";
  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
  }

  CloseCon($connection);


  echo '<a href="/DevriX-Internship-Jobs-Website/index.php">Return to home page</a>';
?>
