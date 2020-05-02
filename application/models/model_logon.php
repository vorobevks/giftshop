<?
class Model_Logon extends Model
{
    public $login=false;
    public $password=false;
    public $email=false;
    function login($login,$password)
    {   
       
        $pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
		$result=$pdo->query("SELECT * from users where name='$login' and password=md5('$password')");
        //$r=$result->fetch(PDO::FETCH_ASSOC);
        if ($result->rowcount()) 
        setcookie("user_name", $login, time()+60*24*30, "/");

    }  
    function registration($login,$email,$password)
    {
        $pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
		$result=$pdo->query("SELECT * from users where name='$login'");
        if ($result->rowcount()) 
        $message="Пользователь с таким логином уже существует";
        else 
        {
            $pdo->query("INSERT INTO users (name,email,password) values ('$login','$email',md5('$password'))");
            setcookie("user_name", $login, time()+60*24*30, "/");
            $message=false;
        }
        return $message;
    }  
}
?>