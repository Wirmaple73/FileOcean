<?php
require_once("Classes/Location.php");
Location::navigateIfUserHasState(false, "Login.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>File Ocean - Registration Form</title>
	</head>
	<body>
		<form action="<?php echo(basename(htmlspecialchars($_SERVER["PHP_SELF"]))); ?>" method="get">
			<button id="logout-button" name="logout-button">Log out</button>
		</form>
	</body>
</html>

<?php
if (!isset($_GET["logout-button"]))
	exit();

session_unset();
session_destroy();

Location::navigate("Login.php");
