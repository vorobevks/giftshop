<?
class Controller_Cart extends Controller{
    public $data;
    function __construct(){
        $this->model = new Model_Cart();
        $this->view = new View();
    }
    //отобразить корзину
    function action_index(){
        //проверяем в каком состоянии корзина, и авторизован ли пользователь вообще, и передаем соответствующие данные в представление
        if (isset($_COOKIE['user_id'])){
            $this->data['cart']=$this->model->get_cart($_COOKIE['user_id']);
            $this->data['order']=$this->model->get_order($_COOKIE['user_id']);
            if (count($this->data['cart'])==0){
                $this->data['cart']=0;
            }
            if (count($this->data['order'])==0){
                $this->data['order']=0;
            }
        }
        else {
                $this->data['cart']=null;
                $this->data['order']=null;
        }
        $this->view->generate('cart_view.php','template_view.php',$this->data);
        
    }
    //отображение корзины для аякса
    function action_forajax(){
        if (isset($_COOKIE['user_id'])){
            $this->data['cart']=$this->model->get_cart($_COOKIE['user_id']);
            if (count($this->data['cart'])==0){
                $this->data['cart']=0;
            }
        }
        else  $this->data['cart']=null;
        $this->view->generate_empty('cart_view.php',$this->data);
    }
    //добавить товар в корзину
    function action_add(int $id_product){
        if (isset($_COOKIE['user_id'])) echo $this->model->add_product($id_product, $_COOKIE['user_id']);
    }
    //количество товаров в корзине
    function action_count(){
        if (isset($_COOKIE['user_id'])) echo $this->model->count_products_in_cart($_COOKIE['user_id']);
    }
    //лежит ли товар в корзине
    function action_isincart(int $id_product){
        if (isset($_COOKIE['user_id'])) echo $this->model->is_in_cart($id_product,$_COOKIE['user_id']);
    }
    //удаление товара из корзины
    function action_delete(int $id_product){
        if (isset($_COOKIE['user_id'])) {
            $this->model->del_product($id_product,$_COOKIE['user_id']);
            $this->data['cart']=$this->model->get_cart($_COOKIE['user_id']);
            $this->data['order']=$this->model->get_order($_COOKIE['user_id']);
            if (count($this->data['cart'])==0){
                $this->data['cart']=0;
            }
        }
        else  $this->data['cart']=null;
        $this->view->generate_empty('cart_view.php',$this->data);
    }


    //изменение количества товара в корзине
    function action_update($parameters){
        if (isset($_COOKIE['user_id'])){
            $this->model->update_count($_COOKIE['user_id'], $parameters[0], $parameters[1]);
        }
    }

    //оформить заказ
    function action_order(int $id_product=null){
        //авторизован ли пользователь
        isset($_COOKIE['user_id']) ? $user_id=$_COOKIE['user_id'] : $user_id=null;
        $fio=$_POST['buy_fio'];
        $address=$_POST['buy_address'];
        $phone=$_POST['buy_phone'];
        $comment= !empty($_POST['buy_comment']) ? $_POST['buy_comment'] : null;
        $arr = array(
            'fio' => $fio,
            'address' => $address,
            'phone' => $phone,
            'comment' => $comment
          );
        
        if (!$id_product){
            $list_product=$this->model->get_cart($user_id);
        }
        else {
            $list_product[0]['id']=$id_product;
            $list_product[0]['count']=1;
        }
        $this->model->order($arr, $list_product, $user_id);

        //отправляем сообщение в телегу
        $token = "1235602721:AAH_gbWlYz6mN0kxUcw4HtTxQxe60fNvB-I";
        $chat_id = "868479757";
        $i=1;
        $http = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://';
        foreach ($list_product as $row){
            $url=$http.$_SERVER['HTTP_HOST'].'/product/product/'.$row['id'];
            $arr["product $i: "] = $url;
            $i++;

        }
        $txt="";
        foreach($arr as $key => $value) {
            $txt .= "<b>".$key."</b> ".$value."%0A";
          };
          
          $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
          if ($sendToTelegram) {
            echo "OK";
          } else {
            echo "Error";
          }
    }

}