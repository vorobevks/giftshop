<?
class model {
    public $sidebar;
    public $pdo;
    
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
        //помещаем левый сайдбар
        $q=$this->pdo->query('SELECT * FROM Category');
        $result=$q->fetchall(PDO::FETCH_ASSOC);
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

        //echo "<pre>";
        //print_r($temp);
        //echo "</pre>";
        $this->sidebar=$temp;
        //print_r($this->$sidebar);
    }
    
}
?>