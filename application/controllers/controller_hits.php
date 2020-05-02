<?
class Controller_Hits extends Controller
{
    function __construct()
    {
        $this->model=new Model_Hits();
        $this->view=new View();
    }
    function action_index()
    {
        $data =$this->model->get_data();
        $this->view->generate('hits_view.php','template_view.php',$data);
    }
    function action_1()
    {
        $data =$this->model->get_data();
        $this->view->generate('hits_view.php','template_view.php',$data);
    }
    
}
?>