<?php
final class Location {
	private function __construct() { }
	
	public static function navigate(string $url, bool $flushOB = false): void {
		header("Location: $url");
		
		if ($flushOB)
			ob_end_flush();
		
		exit();
	}
	
	public static function navigateIfUserHasState(bool $isLoggedIn, string $url, bool $flushOB = false): void {
		$navigateIfCondition = function(bool $condition) use ($url, $flushOB): void {
			if ($condition)
				self::navigate($url, $flushOB);
		};
		
		require_once("Classes/User.php");
		session_start();
		
		$navigateIfCondition($isLoggedIn ? isset($_SESSION[User::class]) : !isset($_SESSION[User::class]));
	}
}
