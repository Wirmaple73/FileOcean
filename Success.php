 <?php
 require_once("Classes/Location.php");
 Location::navigateIfUserHasState(false, "Login.php");
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<linK rel="stylesheet" type="text/css" href="Styles/Main/Font.css">
		<link rel="stylesheet" type="text/css" href="Styles/Main/Main.css">
		<link rel="stylesheet" type="text/css" href="Styles/Success/Main.css">
		<title>File Ocean - Success</title>
	</head>
	<body>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script type="application/javascript" src="Scripts/Success/Main.js"></script>
	</body>
</html>

 <?php
 if (!isset($_GET["logout-button"]))
 	exit();

 session_unset();
 session_destroy();

 Location::navigate("Login.php");
