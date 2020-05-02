<?
class Controller_Logon extends Controller
{
    function __construct()
    {
        $this->model= new Model_Logon();
        $this->view=new View();
    }
    function action_index()
    {
        $this->view->generate_empty('logon_view.php');
    }
    function action_registration($err=null)
    {
        $this->view->generate_empty('registration_view.php',$err);
    }
    function action_reg()
    {
        $login=$_POST['login'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $error=$this->model->registration($login,$email,$password);
        if ($error) $this->action_registration($error);
        
        else  header("location: /");
        //$this->view->generate('main_view.php', 'template_view.php');
    }
    function action_login()
    {
        $login=$_POST['login'];
        $password=$_POST['password'];
        $this->model->login($login,$password);
        header("location: /");
        //$this->view->generate('main_view.php', 'template_view.php');
    }
}
?>