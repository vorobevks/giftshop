<?
class Model_Logon extends Model
{
    public $login=false;
    public $password=false;
    public $email=false;
    function login($login,$password)
    {   
       
       // return "adasd";
		$result=$this->pdo->query("SELECT * from users where name='$login' and password=md5('$password')");
        
        if ($result->rowcount()) {
            setcookie("user_name", $login, time()+60*24*30, "/");
            return true;
        }
        else return false;

    }  
    function registration($login,$email,$password)
    {
        //$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
		$result=$this->pdo->query("SELECT * from users where name='$login'");
        if ($result->rowcount()) 
        return false;
        else 
        {
            $this->pdo->query("INSERT INTO users (name,email,password) values ('$login','$email',md5('$password'))");
            setcookie("user_name", $login, time()+60*24*30, "/");
            return true;
        }
        
    }  
}
?>