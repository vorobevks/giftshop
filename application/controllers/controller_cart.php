<?
class Controller_Cart extends Controller{
    public $data;
    function __construct(){
        $this->model = new Model_Cart();
        $this->view = new View();
    }
    //отобразить корзину
    function action_index(){
        $this->data=$this->model->get_cart($_COOKIE['user_id']);
        {
            $this->view->generate('cart_view.php','template_view.php', $this->data, $this->model->sidebar);
        }
        
    }
    function action_add(int $id_product){
        if (isset($_COOKIE['user_id'])) echo $this->model->add_product($id_product, $_COOKIE['user_id']);
    }
    function action_count(){
        if (isset($_COOKIE['user_id'])) echo $this->model->count_products_in_cart($_COOKIE['user_id']);
    }
    function action_isincart(int $id_product){
        if (isset($_COOKIE['user_id'])) echo $this->model->is_in_cart($id_product,$_COOKIE['user_id']);
    }

}