<?php
enum ModalType {
	case Notification;
	case DialogBox;
}

final class Modal {
	private function __construct() { }
	public static function display(string $message, ModalType $type = ModalType::Notification, bool $isSuccessful = true): void {
		$message = addslashes($message);
		
		switch ($type) {
			case ModalType::Notification:
				$statusMessage = $isSuccessful ? "true" : "false";
				echo("<script>showModal('$message', $statusMessage);</script>");
				break;
				
			case ModalType::DialogBox:
				$statusMessage = $isSuccessful ? "success" : "error";
				echo("<script>showAdvanceModal('Alert', '$message', '$statusMessage', 'OK');</script>");
				break;
				
			default:
				throw new InvalidArgumentException("'type' is not a valid modal type.");
		}
	}
	
	public static function displayAndExit(string $message, ModalType $type = ModalType::Notification, bool $isSuccessful = false): void {
		self::display($message, $type, $isSuccessful);
		exit();
	}
}
