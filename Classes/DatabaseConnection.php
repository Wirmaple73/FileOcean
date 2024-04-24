<?php
class DatabaseException extends Exception { }

class DatabaseConnection {
	private const HOST_NAME = "localhost";
	private const USERNAME = "root";
	private const PASSWORD = "";
	private const DATABASE_NAME = "fileocean_db";
	
	private ?mysqli $connection = null;
	
	public function __construct() {
		$this->connection = new mysqli(self::HOST_NAME, self::USERNAME, self::PASSWORD, self::DATABASE_NAME);
	}
	
	public function disconnect(): void {
		if ($this->connection != null) {
			$this->connection->close();
			$this->connection = null;
		}
	}
	
	public function query(string $query, string $parameterFormat, mixed ...$parameters): mysqli_result|false {
		if ($this->connection == null)
			throw new DatabaseException("No connection to the database is opened yet.");
		
		$stmt = new mysqli_stmt($this->connection, $query);
		$stmt->bind_param($parameterFormat, ...$parameters);
		
		if (!$stmt->execute())
			throw new DatabaseException("An unknown error occurred while trying to execute the specified query.");
		
		$result = $stmt->get_result();
		$stmt->close();
		
		return $result;
	}
}