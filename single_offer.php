<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jobs</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

	<?php
	include 'php/db_connection.php';


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

	?>

</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h2 class="site-title"><a href="#">Job Offers</a></h2>
		</header>

		<div class="job-single">
			<main class="job-main">
				<div class="job-card">
					<div class="job-primary">
						<header class="job-header">
							<?php echo '<h2 class="job-title"><a href="#">' .$data['title'] .'</a></h2>' ?>
							<div class="job-meta">
								<?php echo '<a class="meta-company" href="#">' .$data['company'] .'</a>' ?>
								<span class="meta-date">Posted 14 days ago</span>
							</div>
							<div class="job-details">
								<span class="job-location">The Hague (The Netherlands)</span>
								<span class="job-type">Contract staff</span>
							</div>
						</header>

						<div class="job-body">
							<h3>Descirption </h3>
							<?php echo '<p>' .$data['description'] .'</p>' ?>
							<h3>Responsibilities</h3>
							<p>You’ll be part of a development team working on our flagship products. It’s going to be epic!</p>
						</div>
					</div>
				</div>
			</main>
			<aside class="job-secondary">
				<div class="job-logo">
					<div class="job-logo-box">
						<img src="https://i.imgur.com/ZbILm3F.png" alt="">
					</div>
				</div>
				<a href="#" class="button button-wide">Apply now</a>
				<a href="#">apple.com</a>
			</aside>
		</div>

		<footer class="site-footer">
			<p>Copyright 2020 | Developer links:
				<a href="./index.php">Home</a>,
				<?php
					session_start();

					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
						echo '<a href="./edits.php">Edits</a>, ';
						echo '<a href="./php/logout.php">LogOut</a>, ';
					}
				?>
				<a href="./login.php">LogIn</a>
			</p>
		</footer>
	</div>

</body>
</html>
