<?php
class User
{
	public const USERNAME_REGEX_PATTERN = "/^[A-Za-z0-9!@#$&\-_.]{2,20}$/";
	public const EMAIL_REGEX_PATTERN = "/^[A-Za-z0-9.+\-_~!#$%&‘'\/=^{}|*?`]+@[A-Za-z0-9][A-Za-z0-9-]*(?:\.[A-Za-z0-9-]+)+[A-Za-z0-9]$/";
	
	private const PASSWORD_ALGORITHM = PASSWORD_DEFAULT;
	
	private readonly string $username;
	private readonly string $email;
	private readonly string $password;
	
	public function getUsername(): string {
		return $this->username;
	}
	
	public function getEmail(): string {
		return $this->email;
	}
	
	public function getPassword(): string {
		return $this->password;
	}
	
	public function __construct(string $username, string $email, string $password, bool $hashPassword = true) {
		$this->username = $username;
		$this->email    = $email;
		$this->password = $hashPassword ? password_hash($password, self::PASSWORD_ALGORITHM) : $password;
	}
}
