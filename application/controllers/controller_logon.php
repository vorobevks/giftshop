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
        $result=$this->model->registration($login,$email,$password);
        if ($result) echo "true";//$this->action_registration($error);
        else  echo "false";
        //$this->view->generate('main_view.php', 'template_view.php');
    }
    function action_login()
    {        
        $login=$_POST['login'];
        $password=$_POST['password'];
        $result=$this->model->login($login,$password);
        if ($result) echo "true";
        else echo "false";
    }
    function action_logout()
    {
        setcookie("user_name", $login, time()-60*24*30, "/");
        header("location: /");
    }
}
?>