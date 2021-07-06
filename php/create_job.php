<!DOCTYPE HTML>
<html>
<head>
    <title>Create a Job Offer</title>

    <?php
      include 'db_connection.php';


      $connection = OpenCon();

      if(isset($_REQUEST['submit_btn'])){
        $job_title = filter_var(mysqli_real_escape_string($connection, $_POST['job_title']), FILTER_SANITIZE_STRING);         // mysqli_real_escape_string makes the string safe for the SQL query to execute; filter_var makes the input safe for the browser
        $company_name = filter_var(mysqli_real_escape_string($connection, $_POST['company_name']), FILTER_SANITIZE_STRING);
        $salary = mysqli_real_escape_string($connection, $_POST['salary']);
        $description = filter_var(mysqli_real_escape_string($connection, $_POST['description']), FILTER_SANITIZE_STRING);

        if((!filter_var($salary, FILTER_VALIDATE_INT) === false)){
          $sql = "INSERT INTO joboffers(title, company, salary, description) VALUES ('$job_title', '$company_name', $salary, '$description')";

          if ($connection->query($sql) === TRUE) {
            echo "New record created successfully <br>";
          } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
          }
          CloseCon($connection);

          header('Location: ' . '/DevriX-Internship-Jobs-Website', true, 303);
          die();
        } else {
          echo "Invalid salary!";
        }
      }
    ?>

</head>
<body>
  <p>You are going to fill in this form.</p>

  <form action="" method="post">
  <label>Job Title: </label> <input type="text" name="job_title"><br>
  <label>Company Name: </label><input type="text" name="company_name"><br>
  <label>Salary: </label><input type="text" name="salary"><br>
  <label>Description: </label><input type="text" name="description"><br>

  <input type="submit" name="submit_btn">
</form>

</body>
</html>
