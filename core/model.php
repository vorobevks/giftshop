<?
class model {
    public $sidebar;
    public $pdo;
    
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
        //$this->sidebar="adf";
        $q=$this->pdo->query('SELECT * FROM Category where id_parent is null');
        $this->sidebar=$q->fetchall(PDO::FETCH_ASSOC);
        //print_r($this->$sidebar);
    }
    public function set_sidebar(){
       
    }
    public function get_data()
    {

    }
}
?>