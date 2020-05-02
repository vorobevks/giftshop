<?
class model_hits extends Model
{
    public $name;
    public $price;
    public $rating;
    public $id;
    public $small_descriptoin;
    public function get_data()
    {
      
		//$pdo = new PDO('mysql:host=localhost;dbname=fabric', 'root', 'root');
		//$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
		$result=$this->$pdo->query('SELECT * from products limit 0,10');
		$product_list=$result->fetchall(PDO::FETCH_ASSOC);
		return $product_list;
    }
}
?>