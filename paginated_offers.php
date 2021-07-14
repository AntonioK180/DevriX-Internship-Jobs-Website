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

    <?php
    include 'php/db_connection.php';
		include 'php/parsing_functions.php';


		session_start();
    $connection = OpenCon();

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
           $url = "https://";
      else
           $url = "http://";

    $url.= $_SERVER['HTTP_HOST'];

    $url.= $_SERVER['REQUEST_URI'];

    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $first_offer = $params['from_offer'];


    $page_num = 1;

    $sql = "SELECT * FROM joboffers WHERE activated AND id > " .$first_offer;
    if($result = $connection->query($sql)){
      if($result->num_rows > 0){
        for($i = 0; ($row = $result->fetch_assoc()) && ($i < 2); $i++){
          $id = $row['id'];
          $job_title = $row['title'];
          $company_name = $row['company'];

          echo $id;
          echo indexPageOffersParser($id, $job_title, $company_name);

          if($i == 1){
            echo "<a href='paginated_offers.php?from_offer=$id'> " .$page_num++ ."</a>";
          }
        }
      } else {
        echo "0 results";
      }
    }



    echo "Hello, pages! This is the first offer: " .$first_offer;

		include "php/footer.php";
		?>


	</div>

</body>
</html>
