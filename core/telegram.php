<?php     
  //https://api.telegram.org/bot1235602721:AAH_gbWlYz6mN0kxUcw4HtTxQxe60fNvB-I/getUpdates
  $token = "1235602721:AAH_gbWlYz6mN0kxUcw4HtTxQxe60fNvB-I";
  $chat_id = "868479757";  
  //для формы обратной связи
  if ($_POST['name_form']=='feedback'){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $arr = array(
      'Пользователь: ' => $name,
      'Телефон: ' => $phone
    );
    $txt="Перезвоните мне пожалуйста%0A";
  }  
  foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
  };
  
  $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
  if ($sendToTelegram) {
    echo "OK";
  } else {
    echo "Error";
  }
?>