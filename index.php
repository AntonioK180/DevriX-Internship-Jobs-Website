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
</head>
<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="#">Job Offers</a></h1>
    </header>
    <a href="./php/create_job.php" id="new_offer"> Create a new offer </a>
		<form action="" method="post">
			<label>Kyeword: </label><input type="text" name="keyword"><br>
			<input type="submit" name="submit_btn" value="Search">
		</form>

		<form action="" method="post">
			<button type="submit" name="clear_btn">Clear Keyword</button>
		</form>

    <?php
    include 'php/db_connection.php';
		include 'php/parsing_functions.php';


		session_start();
    $connection = OpenCon();


		if(isset($_REQUEST['submit_btn'])){
			$keyword =  filter_var(mysqli_real_escape_string($connection, $_POST['keyword']), FILTER_SANITIZE_STRING);
			header('Location: ' .'/DevriX-Internship-Jobs-Website/index.php?keyword=' .$keyword, true, 303);
		}

		if(isset($_REQUEST['clear_btn'])){
			header('Location: ' .'/DevriX-Internship-Jobs-Website/index.php', true, 303);
		}

		if(isset($_GET['keyword'])){
	    $keyword =  filter_var(mysqli_real_escape_string($connection, $_GET['keyword']), FILTER_SANITIZE_STRING);

			$sql_keyword = "SELECT * FROM joboffers WHERE description LIKE '%" .$keyword ."%' OR title LIKE '%" .$keyword ."%'";
			if($result_keyword = $connection->query($sql_keyword)){
				if($result_keyword->num_rows > 0){
					while($row = $result_keyword->fetch_assoc()){
						$id = $row['id'];
						$job_title = $row['title'];
						$company_name = $row['company'];

						echo indexPageOffersParser($id, $job_title, $company_name);
					}
				} else {
					echo "0 results";
				}
			}
		} else {
			$sql = "select * from joboffers";
			if($result = $connection->query($sql)){
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						$id = $row['id'];
						$job_title = $row['title'];
						$company_name = $row['company'];

						echo indexPageOffersParser($id, $job_title, $company_name);
					}
				} else {
					echo "0 results";
				}
			}
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
				<a href="./login.php">LogIn</a>
			</p>
		</footer>
	</div>

</body>
</html>
