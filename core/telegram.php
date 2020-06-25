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
  //для формы заказа
  if ($_POST['name_form']=='buy'){

    require_once 'database_data.php';
    if (isset($_COOKIE['user_id'])) $user_id= $_COOKIE['user_id'];
    $pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=UTF8", USER, PASSWORD);
    $fio=$_POST['buy_fio'];
    $address=$_POST['buy_address'];
    $phone=$_POST['buy_phone'];
    $comment=$_POST['buy_comment'];
    $arr = array(
      'ФиО: ' => $fio,
      'Адрес' => $address,
      'Телефон: ' => $phone,
      'Комментарий: ' => $comment
    );
    $query=$pdo->query("select * from products where id in (select id_product from cart where id_user=$user_id)");
    $result=$query->fetchall(PDO::FETCH_ASSOC);
    $i=1;
    $http = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://';
    foreach ($result as $row){
      $url=$http.$_SERVER['HTTP_HOST'].'/product/product/'.$row['id'];
      $arr["Товар $i: "] = "id: ".$row['id']." name: ".$row['name']."%0A".$url;
      //$arr["Товар $i: "] = $row['name'];
      $i++;

    }

    // $arr['Товар: '] = "https://avatars.mds.yandex.net/get-pdb/2300765/c721cdec-3682-4524-a6e7-fdfb39f46697/s1200";
    
    //$txt="Новый заказ!%0A";
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