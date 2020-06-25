<?php 
//https://api.telegram.org/bot1235602721:AAH_gbWlYz6mN0kxUcw4HtTxQxe60fNvB-I/getUpdates
$name = $_POST['name'];
$phone = $_POST['phone'];
//$email = $_POST['user_email'];
$token = "1235602721:AAH_gbWlYz6mN0kxUcw4HtTxQxe60fNvB-I";
$chat_id = "868479757";
$arr = array(
  'Пользователь: ' => $name,
  'Телефон: ' => $phone
);
$txt="Перезвоните мне пожалуйста%0A";
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
//echo "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}";0
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {
  echo "OK";
} else {
  echo "Error";
}
?>