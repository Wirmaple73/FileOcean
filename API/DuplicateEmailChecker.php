<?php
require_once("../Classes/DatabaseConnection.php");
require_once("../Classes/JsonManager.php");

$jsonManager = new JsonManager();

$email = $jsonManager->getParameter("email");

if ($email == null || mb_strlen(trim($email)) === 0) {
	$jsonManager->printJson(["is_unique" => null]);
	exit();
}

try {
	$connection = new DatabaseConnection();
	
	$isUnique = $connection->query("SELECT COUNT(Username) FROM user WHERE Email = ?;", "s", $email)->fetch_column() === 0;
	$jsonManager->printJson(["is_unique" => $isUnique]);
}
catch (DatabaseException $ex) {
	$jsonManager->printJson(["is_unique" => null]);
}
finally {
	if (isset($connection)) {
		$connection->disconnect();
	}
}
