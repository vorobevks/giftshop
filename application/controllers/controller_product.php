<?
class Controller_Product extends Controller
{
    function __construct()
    {
        $this->model=new Model_Product();
        $this->view=new View();
    }
    function action_product_list(int $id_category)
    {
        $data =$this->model->get_product_list($id_category);
        $this->view->generate('product_list_view.php','template_view.php',$data);
    }
    function action_product(int $id_product)
    {
        $data=$this->model->get_product($id_product);
        $this->view->generate('product_view.php','template_view.php',$data);
    }

}
?>