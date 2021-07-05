<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jobs</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="#">Job Offers</a></h1>
		</header>
    <?php

    include 'db_connection.php';
    $connection = OpenCon();
    echo "Connected Successfully" ."<br>";

    $sql = "select * from joboffers";
    $result = $connection->query($sql);

    $html_string = '
    <ul class="jobs-listing">
      <li class="job-card" id="%d">
        <div class="job-primary">
          <h2 class="job-title"><a href="#">%s</a></h2>
          <div class="job-meta">
            <a class="meta-company" href="#">%s</a>
            <span class="meta-date">Posted 14 days ago</span>
          </div>
          <div class="job-details">
            <span class="job-location">The Hague (The Netherlands)</span>
            <span class="job-type">Contract staff</span>
          </div>
        </div>
        <div class="job-logo">
          <div class="job-logo-box">
            <img src="https://i.imgur.com/ZbILm3F.png" alt="">
          </div>
        </div>
      </li>
    </ul>
    ';

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $job_title = $row['title'];
        $company_name = $row['company'];

        echo sprintf($html_string, $id, $job_title, $company_name);

      }
    } else {
      echo "0 results";
    }


    ?>

		<footer class="site-footer">
			<p>Copyright 2020 | Developer links:
				<a href="/edits.html">Edits</a>,
				<a href="/index.html">Home</a>,
				<a href="/single.html">Single</a>
			</p>
		</footer>
	</div>

</body>
</html>
