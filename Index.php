<?php
require_once("Classes/Location.php");
Location::navigateIfUserHasLoginStatus(false, "Login.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>File Ocean - Main Page</title>
	</head>
	<body>
		<form class="form" method="post" action="<?php echo(Location::getCurrentFileName()); ?>">
			<input type="submit" id="logout-button" name="logout-button" value="Log out">
		</form>
	</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST")
	exit();

session_unset();
session_destroy();

Location::navigate("Login.php");
