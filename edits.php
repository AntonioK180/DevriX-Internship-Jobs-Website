<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jobs</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="./css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="#">Job Offers</a></h1>
		</header>

		<?php
		include 'php/db_connection.php';
		include 'php/parsing_functions.php';


		session_start();
		$connection = OpenCon();
		echo "Connected Successfully" ."<br>";

		$sql = "select * from joboffers";
		$result = $connection->query($sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$job_title = $row['title'];
				$company_name = $row['company'];
				$id = $row['id'];

				echo editsPageOffersParser($job_title, $company_name, $id);

			}
		} else {
			echo "0 results";
		}

		CloseCon($connection);
		?>

		<footer class="site-footer">
			<p>Copyright 2020 | Developer links:
				<a href="./index.php">Home</a>,
				<?php
					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
						echo '<a href="./edits.php">Edits</a>, ';
						echo '<a href="./php/logout.php">LogOut</a>, ';
					}
				?>
				<a href="./single_offer.php">Single</a>,
				<a href="./login.php">LogIn</a>
			</p>
		</footer>
	</div>

</body>
</html>
