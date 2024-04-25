<?php
require_once("Classes/Location.php");
Location::navigateIfUserHasLoginStatus(false, "Login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <linK rel="stylesheet" type="text/css" href="Styles/Main/Main.css">
    <linK rel="stylesheet" type="text/css" href="Styles/Uploader/Main.css">
    <title>File Ocean - Main Page</title>
</head>
<body>
    <div class="uploader">
        <h1 class="uploader__title">Upload</h1>
        <input type="file" name="uploader-input" id="uploader-input" hidden accept=".jpeg, .png, .gif, .mp4, .pdf, .psd, .ai, .doc, .docx, .ppt, .jpg, .svg">
        <label class="upload-box" for="uploader-input">
            <svg class="upload-box__icon" width="75" height="65" viewBox="0 0 75 65" fill="none">
                <path d="M38.1337 14.6888C37.9838 15.1912 38.27 15.7192 38.7721 15.8689L38.8716 15.8986L38.8759 15.8936C39.3468 15.9788 39.8139 15.6968 39.9522 15.2297C41.2131 10.9932 45.1853 8.03363 49.6109 8.03363C50.1348 8.03363 50.5598 7.60867 50.5598 7.08474C50.5598 6.56078 50.1348 6.13585 49.6109 6.13585C44.1719 6.13585 39.6013 9.75716 38.1337 14.6888ZM38.1337 14.6888L38.2883 14.7349M38.1337 14.6888C38.1336 14.6888 38.1336 14.6889 38.1336 14.6889L38.2883 14.7349M38.2883 14.7349C38.164 15.1517 38.4014 15.5899 38.8182 15.7142L38.2883 14.7349Z" fill="#4C95EB" stroke="#F9FFF9" stroke-width="0.322847"/>
                <path d="M60.6347 45.6704H55.91C55.4752 45.6704 55.1225 45.3177 55.1225 44.8829C55.1225 44.4481 55.4752 44.0954 55.91 44.0954H60.6347C67.1474 44.0954 72.4465 38.7964 72.4465 32.2836C72.4465 25.7708 67.1474 20.4718 60.6347 20.4718H60.521C60.2927 20.4718 60.0756 20.3728 59.9259 20.2001C59.7763 20.0274 59.7088 19.7985 59.7415 19.5724C59.8118 19.0819 59.8472 18.5892 59.8472 18.1094C59.8472 12.4651 55.2546 7.87242 49.6102 7.87242C47.4143 7.87242 45.3203 8.55863 43.554 9.85735C43.1659 10.1425 42.6147 10.016 42.3903 9.58905C37.3883 0.0642457 24.3236 -1.21484 17.5502 7.07091C14.6968 10.5616 13.5757 15.1024 14.4741 19.528C14.5731 20.0168 14.199 20.4724 13.7024 20.4724H13.3868C6.87405 20.4724 1.57499 25.7714 1.57499 32.2842C1.57499 38.797 6.87405 44.096 13.3868 44.096H18.1115C18.5463 44.096 18.899 44.4487 18.899 44.8835C18.899 45.3183 18.5463 45.671 18.1115 45.671H13.3868C6.00549 45.671 0 39.6655 0 32.2841C0 25.1099 5.67301 19.2354 12.7687 18.9114C12.1021 14.3199 13.3767 9.68858 16.3307 6.07423C23.5826 -2.79757 37.4803 -1.80316 43.3552 8.08954C45.2294 6.91454 47.374 6.29813 49.61 6.29813C56.4484 6.29813 61.8673 12.1186 61.3931 18.9188C68.4234 19.3131 74.0211 25.1565 74.0211 32.2836C74.0211 39.6655 68.0156 45.6704 60.6343 45.6704L60.6347 45.6704Z" fill="#4C95EB"/>
                <path d="M17.0571 44.4382C17.0571 55.3827 25.9608 64.2863 36.9051 64.2863C47.8496 64.2863 56.7532 55.3825 56.7532 44.4382C56.7532 33.4938 47.8496 24.5902 36.9051 24.5902C25.9607 24.5902 17.0571 33.4939 17.0571 44.4382ZM18.9552 44.4382C18.9552 34.5409 27.0077 26.4883 36.9051 26.4883C46.8024 26.4883 54.8551 34.5408 54.8551 44.4382C54.8551 54.3355 46.8024 62.3882 36.9051 62.3882C27.0078 62.3882 18.9552 54.3357 18.9552 44.4382Z" fill="#4C95EB" stroke="#F9FFF9" stroke-width="0.322847"/>
                <path d="M36.5271 52.3633C36.5271 52.7708 36.8575 53.1012 37.265 53.1012C37.6724 53.1012 38.0029 52.7713 38.0029 52.3633V37.374C38.0029 36.9665 37.6725 36.6361 37.265 36.6361C36.8575 36.6361 36.5271 36.9665 36.5271 37.374V52.3633Z" fill="#4C95EB" stroke="#B2CFF1" stroke-width="0.322847"/>
                <path d="M37.2649 38.4189L33.1748 42.5091C32.8869 42.7975 32.4193 42.7974 32.1311 42.5092C31.8428 42.2209 31.8428 41.7538 32.1311 41.4655L36.743 36.8536L37.2649 38.4189ZM37.2649 38.4189L41.3552 42.5092C41.4991 42.6531 41.6885 42.7253 41.8769 42.7253L37.2649 38.4189ZM37.7867 36.8535C37.4985 36.5653 37.0311 36.5651 36.7431 36.8535L41.877 42.7253C42.0651 42.7253 42.2547 42.6537 42.3988 42.5091C42.687 42.2208 42.687 41.7538 42.3988 41.4655L37.7867 36.8535Z" fill="#4C95EB" stroke="#B2CFF1" stroke-width="0.322847"/>
            </svg>
            <h2 class="upload-box__description">Drag & drop files or <label for="uploader-input" class="upload-box__link">Browse</label></h2>
            <p class="upload-box__caption">Supported formates: JPEG, PNG, GIF, MP4, PDF, PSD, AI, Word, PPT</p>
        </label>
        <div class="uploading-section xss-section">
            <h3 class="uploading-section__title xss-title">Uploading Files</h3>
            <div class="upload-container uploading-container"></div>
        </div>
        <div class="uploaded-section xss-section">
            <h3 class="uploaded-section__title xss-title">Uploaded  - <span class="uploaded-status">0</span> file</h3>
            <div class="upload-container uploaded-container"></div>
        </div>
    </div>
    <script type="application/javascript" src="Scripts/Main/Main.js"></script>
    <script type="application/javascript" src="Scripts/Success/Sweet-Alert.min.js"></script>
    <script type="application/javascript" src="Scripts/Uploader/Main.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST")
	exit();

session_unset();
session_destroy();

Location::navigate("Login.php");
