<?php
require_once("Classes/Location.php");
Location::navigateIfUserHasState(true, "Index.php");

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css"/>
	    <link rel="stylesheet" type="text/css" href="Styles/LogIn/Main.css">
	    <link rel="stylesheet" type="text/css" href="Styles/LogIn/swiper-bundle.min.css">
	    <title>File Ocean - Registration Form</title>
	</head>
	<body>
	    <div class="modal">
	        <span class="modal__value"></span>
	    </div>
	    <form class="form" method="post" action="<?php echo(basename(htmlspecialchars($_SERVER["PHP_SELF"]))); ?>">
	        <div class="form__left">
	            <div class="form-container">
	                <h1 class="form__header">Create your account</h1>
	                <p class="form__caption" style="margin-bottom: 2rem;">Unlock all features!</p>
	                <div class="input-box">
	                    <svg class="input-box__icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                        <path d="M12 12C15.1066 12 17.625 9.4816 17.625 6.375C17.625 3.2684 15.1066 0.75 12 0.75C8.8934 0.75 6.375 3.2684 6.375 6.375C6.375 9.4816 8.8934 12 12 12ZM15.75 6.375C15.75 8.44607 14.0711 10.125 12 10.125C9.92893 10.125 8.25 8.44607 8.25 6.375C8.25 4.30393 9.92893 2.625 12 2.625C14.0711 2.625 15.75 4.30393 15.75 6.375Z" fill="#2D31A6" fill-opacity="0.2"/>
	                        <path d="M23.25 21.375C23.25 23.25 21.375 23.25 21.375 23.25H2.625C2.625 23.25 0.75 23.25 0.75 21.375C0.75 19.5 2.625 13.875 12 13.875C21.375 13.875 23.25 19.5 23.25 21.375ZM21.375 21.3685C21.3723 20.9057 21.0867 19.5196 19.8148 18.2477C18.5918 17.0247 16.2921 15.75 12 15.75C7.7079 15.75 5.40816 17.0247 4.18518 18.2477C2.91329 19.5196 2.62767 20.9057 2.625 21.3685H21.375Z" fill="#2D31A6" fill-opacity="0.2"/>
	                    </svg>
	                    <input class="input-box__input" type="text" name="username" data-name="username" placeholder="Username" required autocomplete="off">
	                </div>
	                <div class="input-box">
	                    <svg class="input-box__icon" width="30" height="24" viewBox="0 0 30 24" fill="none">
	                        <path d="M0 4.5C0 2.42893 1.67893 0.75 3.75 0.75H26.25C28.3211 0.75 30 2.42893 30 4.5V19.5C30 21.5711 28.3211 23.25 26.25 23.25H3.75C1.67893 23.25 0 21.5711 0 19.5V4.5ZM3.75 2.625C2.71447 2.625 1.875 3.46447 1.875 4.5V4.9067L15 12.7817L28.125 4.9067V4.5C28.125 3.46447 27.2855 2.625 26.25 2.625H3.75ZM28.125 7.0933L19.2974 12.3899L28.125 17.8223V7.0933ZM28.0617 19.9849L17.4859 13.4767L15 14.9683L12.5141 13.4767L1.93831 19.9849C2.15202 20.7854 2.88216 21.375 3.75 21.375H26.25C27.1178 21.375 27.848 20.7854 28.0617 19.9849ZM1.875 17.8223L10.7026 12.3899L1.875 7.0933V17.8223Z" fill="#2D31A6" fill-opacity="0.2"/>
	                    </svg>
	                    <input class="input-box__input" type="email" name="email" data-name="email" placeholder="Email" required autocomplete="off">
	                </div>
	                <div class="input-box">
	                    <svg class="input-box__icon" width="30" height="30" viewBox="0 0 30 30" fill="none">
	                        <path d="M2.54417 6.5217C1.75527 13.9622 4.17467 19.512 7.08656 23.2301C8.59187 25.1521 10.2279 26.5846 11.6198 27.5426C12.3153 28.0213 12.9598 28.3885 13.5072 28.6399C14.0129 28.8723 14.554 29.0625 15.0001 29.0625C15.4462 29.0625 15.9873 28.8723 16.493 28.6399C17.0404 28.3885 17.6849 28.0213 18.3804 27.5426C19.254 26.9414 20.2237 26.1532 21.1969 25.1744L19.8711 23.8486C18.9815 24.7437 18.1003 25.4592 17.3173 25.9981C16.6941 26.4271 16.1431 26.7373 15.7102 26.9362C15.4935 27.0358 15.3162 27.1029 15.1816 27.1436C15.0707 27.1771 15.0136 27.185 15.0001 27.1869C14.9865 27.185 14.9295 27.1771 14.8186 27.1436C14.684 27.1029 14.5067 27.0358 14.29 26.9362C13.857 26.7373 13.3061 26.4271 12.6829 25.9981C11.4374 25.1409 9.94347 23.8369 8.56272 22.074C6.11598 18.9498 4.02171 14.3841 4.29191 8.26945L2.54417 6.5217Z" fill="#2D31A6" fill-opacity="0.2"/>
	                        <path d="M23.2678 19.2904C25.0895 15.9433 26.2576 11.5103 25.4949 5.92333C25.4523 5.61182 25.2259 5.33921 24.9033 5.23649C23.731 4.86313 21.7503 4.25136 19.7944 3.7339C17.7947 3.20482 15.9561 2.8125 15.0001 2.8125C14.044 2.8125 12.2055 3.20482 10.2058 3.7339C9.54719 3.90814 8.8858 4.09307 8.2534 4.27599L6.74325 2.76583C7.66485 2.49032 8.6975 2.19343 9.72619 1.92126C11.6816 1.40392 13.7583 0.9375 15.0001 0.9375C16.2419 0.9375 18.3186 1.40392 20.274 1.92126C22.2733 2.45022 24.2875 3.07255 25.4723 3.44991C26.4611 3.76483 27.209 4.61764 27.3526 5.6697C28.2115 11.9602 26.7922 16.9481 24.6448 20.6674L23.2678 19.2904Z" fill="#2D31A6" fill-opacity="0.2"/>
	                        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5872 26.9129L1.21216 2.53786L2.53798 1.21204L26.913 25.587L25.5872 26.9129Z" fill="#2D31A6" fill-opacity="0.2"/>
	                    </svg>
	                    <input class="input-box__input" type="password" name="password" data-name="password" placeholder="Password" required autocomplete="off">
	                    <i class="input-box__eye far fa-eye-slash"></i>
	                </div>
	                <div class="input-box">
	                    <svg class="input-box__icon" width="30" height="30" viewBox="0 0 30 30" fill="none">
	                        <path d="M2.54417 6.5217C1.75527 13.9622 4.17467 19.512 7.08656 23.2301C8.59187 25.1521 10.2279 26.5846 11.6198 27.5426C12.3153 28.0213 12.9598 28.3885 13.5072 28.6399C14.0129 28.8723 14.554 29.0625 15.0001 29.0625C15.4462 29.0625 15.9873 28.8723 16.493 28.6399C17.0404 28.3885 17.6849 28.0213 18.3804 27.5426C19.254 26.9414 20.2237 26.1532 21.1969 25.1744L19.8711 23.8486C18.9815 24.7437 18.1003 25.4592 17.3173 25.9981C16.6941 26.4271 16.1431 26.7373 15.7102 26.9362C15.4935 27.0358 15.3162 27.1029 15.1816 27.1436C15.0707 27.1771 15.0136 27.185 15.0001 27.1869C14.9865 27.185 14.9295 27.1771 14.8186 27.1436C14.684 27.1029 14.5067 27.0358 14.29 26.9362C13.857 26.7373 13.3061 26.4271 12.6829 25.9981C11.4374 25.1409 9.94347 23.8369 8.56272 22.074C6.11598 18.9498 4.02171 14.3841 4.29191 8.26945L2.54417 6.5217Z" fill="#2D31A6" fill-opacity="0.2"/>
	                        <path d="M23.2678 19.2904C25.0895 15.9433 26.2576 11.5103 25.4949 5.92333C25.4523 5.61182 25.2259 5.33921 24.9033 5.23649C23.731 4.86313 21.7503 4.25136 19.7944 3.7339C17.7947 3.20482 15.9561 2.8125 15.0001 2.8125C14.044 2.8125 12.2055 3.20482 10.2058 3.7339C9.54719 3.90814 8.8858 4.09307 8.2534 4.27599L6.74325 2.76583C7.66485 2.49032 8.6975 2.19343 9.72619 1.92126C11.6816 1.40392 13.7583 0.9375 15.0001 0.9375C16.2419 0.9375 18.3186 1.40392 20.274 1.92126C22.2733 2.45022 24.2875 3.07255 25.4723 3.44991C26.4611 3.76483 27.209 4.61764 27.3526 5.6697C28.2115 11.9602 26.7922 16.9481 24.6448 20.6674L23.2678 19.2904Z" fill="#2D31A6" fill-opacity="0.2"/>
	                        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5872 26.9129L1.21216 2.53786L2.53798 1.21204L26.913 25.587L25.5872 26.9129Z" fill="#2D31A6" fill-opacity="0.2"/>
	                    </svg>
	                    <input class="input-box__input" type="password" name="passwordS2" data-name="passwordS2" placeholder="Confirm Password" required autocomplete="off">
	                    <i class="input-box__eye far fa-eye-slash"></i>
	                </div>
	                <div class="form-option">
	                    <div>
	                        <input type="checkbox" class="form-option__input" id="rememberMe" name="rememberMe">
	                        <label for="rememberMe" class="form-option__text">Accept terms and conditions</label>
	                    </div>
	                </div>
	                <button class="sub-button" type="button">
	                    <span class="sub-button__action"></span>
	                    <span class="sub-button__text">Register</span>
	                </button>
	                <div class="dont-have-account">
	                    <span class="dont-have-account__value">Already have an account?</span>
	                    <a href="Login.php" class="dont-have-account__link">Login now</a>
	                </div>
	            </div>
	        </div>
	
	        <div class="form__right">
	            <div class="slider swiper">
	               <div class="swiper-wrapper">
	                   <div class="slider__item swiper-slide">
	                       <img class="slider__img" src="Asset/Pictures/Slide-1.png" alt="Picture">
	                   </div>
	                   <div class="slider__item swiper-slide">
	                       <img class="slider__img" src="Asset/Pictures/Slide-2.png" alt="Picture">
	                   </div>
	                   <div class="slider__item swiper-slide">
	                       <img class="slider__img" src="Asset/Pictures/Slide-3.png" alt="Picture">
	                   </div>
	                </div>
	            </div>
	            <div class="slider__pagination swiper-pagination"></div>
	        </div>
	    </form>
	    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	    <script type="application/javascript" src="Scripts/LogIn/swiper-bundle.min.js"></script>
	    <script type="application/javascript" src="Scripts/Main/Main.js"></script>
	    <script type="application/javascript" src="Scripts/LogIn/Slider.js"></script>
	    <script type="application/javascript" src="Scripts/LogIn/Main.js"></script>
	    <script type="application/javascript" src="Scripts/LogIn/Register.js"></script>
	</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST")
	exit();

require_once("Classes/InputManager.php");
require_once("Classes/Database.php");
require_once("Classes/Assertion.php");
require_once("Classes/User.php");
require_once("Classes/Modal.php");

validateInput();
storeUser();

Location::navigate("Index.php", true);

function validateInput(): void {
	$SAFE_VARIABLE_NAMES = ["username", "email"];
	$VARIABLE_NAMES      = [...$SAFE_VARIABLE_NAMES, "password", "passwordS2", "rememberMe"];
	
	if (!InputManager::areAllSet(ArrayName::Post, ...$VARIABLE_NAMES))
		Modal::displayAndExit("Certain form variables are missing. Please re-enter your information and submit the form again.");
	
	$assertion = InputManager::validateInput(
		new InputInfo($_POST["username"], "Username", 2, 20, User::USERNAME_REGEX_PATTERN, "The entered username is invalid."),
		new InputInfo($_POST["email"], "Email", 7, 254, User::EMAIL_REGEX_PATTERN, "The entered email address is invalid."),
		new InputInfo($_POST["password"], "Password", 8, 20),
		new InputInfo($_POST["passwordS2"], "Confirmation password", 8, 20)
	);
	
	if (!$assertion->isTrue())
		Modal::displayAndExit($assertion->getFailureMessage());
	
	if ($_POST["password"] !== $_POST["passwordS2"])
		Modal::displayAndExit("Your password does not match your confirmation password.");
	
	InputManager::sanitizeAll(ArrayName::Post, ...$SAFE_VARIABLE_NAMES);
}

function storeUser(): void {
	$user = new User($_POST["username"], $_POST["email"], $_POST["password"]);
	
	try {
		Database::connect();
		
		$assertion = Assertion::assertAll(
			new Assertion(Database::query("SELECT COUNT(*) FROM user WHERE Username = ?;", "s", $user->getUsername())->fetch_column() === 0, "A user with the specified username already exists."),
			new Assertion(Database::query("SELECT COUNT(*) FROM user WHERE Email = ?;", "s", $user->getEmail())->fetch_column() === 0, "This email is already in use by another user.")
		);
		
		if (!$assertion->isTrue())
			Modal::displayAndExit($assertion->getFailureMessage());
		
		Database::query("INSERT INTO user VALUES (?, ?, ?);", "sss", $user->getUsername(), $user->getEmail(), $user->getPassword());
		Database::disconnect();
	}
	catch (Exception $ex) {
		Modal::displayAndExit("An error occurred while trying to communicate with the database ({$ex->getMessage()}).");
	}
	
	session_start();
	$_SESSION[User::class] = $user;
}
