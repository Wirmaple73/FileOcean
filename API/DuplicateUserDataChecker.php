<?php
require_once("../Classes/DatabaseConnection.php");
require_once("../Classes/JsonManager.php");

$jsonManager = new JsonManager();

$value       = $jsonManager->getParameter("value");
$dataCaption = getDataTypeCaption($jsonManager->getParameter("dataType"));

if ($dataCaption == null || $value == null || mb_strlen(trim($value)) === 0) {
	$jsonManager->printJson(["isUnique" => null]);
	exit();
}

try {
	$connection = new DatabaseConnection();
	
	$isUnique = $connection->query("SELECT COUNT(Username) FROM user WHERE $dataCaption = ?;", "s", $value)->fetch_column() === 0;
	$jsonManager->printJson(["isUnique" => $isUnique]);
}
catch (DatabaseException $ex) {
	$jsonManager->printJson(["isUnique" => null]);
}
finally {
	if (isset($connection)) {
		$connection->disconnect();
	}
}

function getDataTypeCaption(?string $dataType): ?string {
	return match ($dataType) {
		"username" => "Username",
		"email"    => "Email",
		default => null
	};
}
