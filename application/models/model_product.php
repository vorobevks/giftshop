<?
class Model_Product extends Model
{
    public $id;
    public $name;
    public $id_category;
    public $description;
    public $image;
    public $images;
    public $array_product=array();
    function get_product_list(int $id_cat=null)
    {       
        $product_list=$this->recursion($id_cat);
        return $this->array_product;        
    }
    function get_product(int $id_product)
    {
        //$pdo=new PDO("mysql:host=".HOST.";dbname=".DBNAME,USER,PASSWORD);
        $result=$this->$pdo->query("SELECT * from products where id=$id_product");

        $product=$result->fetch(PDO::FETCH_ASSOC);
        $product['images']=explode(',',$product['images']);
        return $product;
    }
    //рекурсивная функция для поиска всех товаров из выбранной категории, в том числе и вложенных
    function recursion(int $id_cat)
    {
        $parent_q=$this->$pdo->query("SELECT * FROM Category WHERE id=$id_cat");
        $parent_list=$parent_q->fetch(PDO::FETCH_ASSOC);
        //если данная категория является родителем, то вызываем рекурсию для всех потомков
        if ($parent_list['if_parent'])
        {
            //echo $parent_list['name'];
            $parent_q1=$this->$pdo->query("SELECT * FROM Category WHERE id_parent=$id_cat");
            while ($row=$parent_q1->fetch())
            {
             //   echo "потомок:".$row['name'];
                $this->recursion($row['id']);
            }
        }
        else
        {
            //echo "else";
            $parent_q=$this->$pdo->query("SELECT * FROM products WHERE id_category=$id_cat limit 10");
            $g=$parent_q->fetchall(PDO::FETCH_ASSOC);
            $a=array_merge($this->array_product, $g);
            $this->array_product=$a;
        }
        
        //return $result;
        
    }
}
?>