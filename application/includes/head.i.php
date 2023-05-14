<!-- Variables defined for php, and used in the document -->
<?php
	$page = (isset($_GET['page']) ? $_GET['page'] : "" );
	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<!-- All the meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Bootstrap Tutorials for Week 2 for Assignment 1">
		<meta name="keywords" content="Karim Khoja Assignment 1 from Bootstrap">
		<meta name="author" content="Karim Khoja kkhoja@georgebrown.ca">
		
		<!-- link to bootstrap.min.css -->
		<title>Assignment 1-Layout</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo CSS_PATH; ?>bootstrap.min.css">
		
		<!--Not much important
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
		-->
		
		<!--icon on the internet browser-->
		<link rel="shortcut icon" href="<?php echo IMG_PATH; ?>kk.ico">
	</head>