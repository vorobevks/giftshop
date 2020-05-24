<?
require_once '../core/database_data.php';
$user=$_POST['login'];
$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
$result=$pdo->query("SELECT * from users where name='$user'");
if ($result->rowcount()) 
echo "true";
else echo "false";
?>