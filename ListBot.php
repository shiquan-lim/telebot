<?php

ini_set('error_reporting', E_ALL);

$botToken = "134200866:AAGSqcPJVNtMruJBGpFX-1PEGBwA6KYxfKs";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

switch ($message) {
	case '/test':
		sendMessage($chatId, "Test Successful");
		break;
	
	default:
		sendMessage($chatId, "Invalid Command");
		break;
}

function sendMessage ($chatId, $message) {
	$url = $GLOBALS[$website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
	file_get_contents($url);
}

?>

<h2>Test</h2>