<?
class Controller_Main extends Controller
{
    function __construct(){
        $this->model= new Model_Main();
        $this->view=new View();
    }
    function action_index()
    {
        //print_r($this->model->sidebar);
        $data=$this->model->list_start();
        //$this->view->generate('product_list_view.php','template_view.php',$data,$this->model->sidebar);
        $this->view->generate('main_view.php','template_view.php',$data,$this->model->sidebar);        
    }
}
?>