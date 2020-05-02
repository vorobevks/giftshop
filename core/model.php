<?
class model {
    public $pdo;
    public function __construct()
    {
        $this->$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
    }
    public function get_data()
    {

    }
}
?>