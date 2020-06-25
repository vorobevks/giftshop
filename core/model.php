<?
class model {
    public $sidebar;
    public $pdo;
    
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=UTF8", USER, PASSWORD);
        //помещаем левый сайдбар
        $q=$this->pdo->query("SELECT * FROM category where disabled= 0");
        $result=$q->fetchAll(PDO::FETCH_ASSOC);
        $temp=array();
        $i=0;
        foreach($result as $row)
        {  
            if ($row['id_parent']===null){ 
                $temp[$row['id']]=$row;
                //array_push($temp['name'], $row);
                $i++;
            }
            else{
                $temp[$row['id_parent']][$row['id']]=$row;
                //array_push($temp[$row['id_parent']],$row);
            }
        }
        $this->sidebar=$temp;
    }
    
}
?>