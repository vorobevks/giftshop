<?
class Controller_Menu extends Controller
{
    function __construct()
    {
        $this->model=new Model_Menu();
        $this->view=new View();
    }
    function action_index()
    {
        $data="Это наш магазин и метод index";
        $this->view->generate('menu_view.php','template_view.php',null, $this->model->sidebar);
    }
    function action_delivery()
    {
        $this->view->generate('delivery_view.php','template_view.php',null, $this->model->sidebar);
    }
    function action_pay()
    {
        $this->view->generate('pay_view.php','template_view.php',null, $this->model->sidebar); 
    }
    function action_about()
    {
        $this->view->generate('about_view.php','template_view.php',null, $this->model->sidebar); 
    }
    function action_contacts()
    {
        $this->view->generate('contacts_view.php','template_view.php',null, $this->model->sidebar); 
    }
}
?>