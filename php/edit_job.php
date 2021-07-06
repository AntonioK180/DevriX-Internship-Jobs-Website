<!DOCTYPE HTML>
<html>
<head>
    <title>Edit a Job Offer</title>

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


        $sql_select = "SELECT * FROM joboffers WHERE id = '$id'";
        $result = $connection->query($sql_select);
        $data = $result->fetch_assoc();


        if(isset($_REQUEST['submit_btn'])){
          $job_title = filter_var(mysqli_real_escape_string($connection, $_POST['job_title']), FILTER_SANITIZE_STRING);         // mysqli_real_escape_string makes the string safe for the SQL query to execute; filter_var makes the input safe for the browser
          $company_name = filter_var(mysqli_real_escape_string($connection, $_POST['company_name']), FILTER_SANITIZE_STRING);
          $salary = mysqli_real_escape_string($connection, $_POST['salary']);
          $description = filter_var(mysqli_real_escape_string($connection, $_POST['description']), FILTER_SANITIZE_STRING);

          if((!filter_var($salary, FILTER_VALIDATE_INT) === false)){
            $sql_update = "UPDATE joboffers SET title='$job_title', company='$company_name', salary='$salary', description='$description' WHERE id='$id'";
            if ($connection->query($sql_update) === TRUE) {
              echo "Successfully updated an existing record. <br>";
            } else {
              echo "Error: " . $sql_update . "<br>" . $connection->error;
            }
            CloseCon($connection);

            header('Location: ' .'/DevriX-Internship-Jobs-Website/edits.php', true, 303);
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
    <?php
      echo '<label>Job Title: </label> <input type="text" name="job_title" value="' .$data['title'] .'"><br>';
      echo '<label>Company Name: </label> <input type="text" name="company_name" value="' .$data['company'] .'"><br>';
      echo '<label>Salary: </label> <input type="number" name="salary" value="' .$data['salary'] .'"><br>';
      echo '<label>Description: </label> <input type="text" name="description" value="' .$data['description'] .'"><br>';
    ?>

  <input type="submit" name="submit_btn">
</form>

</body>
</html>
