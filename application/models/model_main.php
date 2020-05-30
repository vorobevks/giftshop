<?
class Model_Main extends Model{
    //public $list_start_products;
    public function list_start(){

        $recommenation_query=$this->pdo->query("SELECT id, name, image, price  FROM products order by rand() limit 40");
        //$this->list_start_products=$recommenation_query->fetchall();
        //$product['recommendation']=$recommenation_result;
        //array_unshift($product,$recommenation_result);
        return $recommenation_query->fetchall();
    }
}
?>