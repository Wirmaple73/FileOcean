<?php
final class Location {
	private function __construct() { }
	
	public static function getCurrentFileName(): string {
		return basename(htmlspecialchars($_SERVER["PHP_SELF"]));
	}
	
	public static function navigate(string $url): void {
		echo("<script>location.replace('$url');</script>");
	}
	
	public static function navigateIfUserHasLoginStatus(bool $isLoggedIn, string $url): void {
		$navigateIfCondition = function(bool $condition) use ($url): void {
			if ($condition)
				self::navigate($url);
		};
		
		require_once("Classes/User.php");
		session_start();
		
		$navigateIfCondition($isLoggedIn ? isset($_SESSION[User::class]) : !isset($_SESSION[User::class]));
	}
}
