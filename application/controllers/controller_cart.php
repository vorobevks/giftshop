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
            $this->data=$this->model->get_cart($_COOKIE['user_id']);
            if (count($this->data)==0){
                $this->data=0;
            }
        }
        else  $this->data=null;
        $this->view->generate('cart_view.php','template_view.php',$this->data);
        
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
        if (isset($_COOKIE['user_id'])) $this->model->del_product($id_product,$_COOKIE['user_id']);
    }

}