<?
class Model_Logon extends Model
{
    public $login=false;
    public $password=false;
    public $email=false;
    function login($login,$password)
    {   
       
       // return "adasd";
		$result=$this->pdo->query("SELECT * from users where name=UPPER('$login') and password=md5('$password')");
        
        if ($result->rowcount()) {
            
            setcookie("user_name", $login, time()+60*24*30, "/");
            setcookie("user_id", $result->fetch()['id'],time()+60*24*30,"/");
            
            return true;
        }
        else return false;

    }  
    function registration($login,$email,$password)
    {
        //$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
		$result=$this->pdo->query("SELECT * from users where name=UPPER('$login')");
        if ($result->rowcount()) 
        return false;
        else 
        {
            $new_user=$this->pdo->query("INSERT INTO users (name,email,password) values (UPPER('$login'),'$email',md5('$password'))");
            //print_r ($this->pdo->lastInsertId());
            setcookie("user_name", $login, time()+60*24*30, "/");

            setcookie("user_id", $this->pdo->lastInsertId(),time()+60*24*30, "/");
            return true;
        }
        
    }  
}
?>