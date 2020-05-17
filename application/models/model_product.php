<?
class Model_Product extends Model
{
    /*public $id;
    public $name;
    public $id_category;
    public $description;
    public $image;
    public $images;*/
    //public $array_product;
    function get_product_list(int $id_cat=null)
    {       
        
        //если мы хотим использовать вложенность в N уровней в категориях, то вот она рекурсивная функция обхода
        //оставим ее просто закомментированной
        /*$product_list=$this->recursion($id_cat);
        return $this->array_product; */
        
        
        //а здесь выведем товары из данной категории и ее дочерних категорий
        //$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWORD);
        /*$this->get_list_for_page($id_cat);
        $query=$this->pdo->query("SELECT name FROM Category WHERE id=$id_cat");
        $name_category=$query->fetch(PDO::FETCH_ASSOC);
        
        $query=$this->pdo->query("SELECT * FROM products WHERE id_category IN (SELECT id FROM category WHERE id=$id_cat OR id_parent=$id_cat) limit 20");
        $array_product=$query->fetchall();
        //добавим в начало название категории чтоб вывести ее в шапке контента
        //$array_product['name_category']=$name_category['name'];
        array_unshift($array_product, $name_category['name']);
        //print_r($this->$array_product);
        return $array_product; */
        //получаем имя категории
        $query=$this->pdo->query("SELECT id,name FROM Category WHERE id=$id_cat");
        $data_category=$query->fetch();
        $perpage=40;//сколько товаров отображать на странице
        $query=$this->pdo->query("SELECT count(*) FROM products WHERE id_category IN (SELECT id FROM category WHERE id=$id_cat OR id_parent=$id_cat)");
        $pages_count=ceil($query->fetchColumn()/$perpage);//количество страниц
        //получаем номер страницы
        if (empty($_GET['page']) || ($_GET['page'] <= 0)) {
            $page = 1;
            } else {
                $page = $_GET['page']; 
            }
        if ($page > $pages_count) $page = $pages_count;
        $start_pos = ($page - 1) * $perpage;
        $query=$this->pdo->query("SELECT * FROM products WHERE id_category IN (SELECT id FROM category WHERE id=$id_cat OR id_parent=$id_cat) limit $start_pos,$perpage");
        $array_product=$query->fetchall();
        array_unshift($array_product, $page);//добавляем активную страницу в массив данных
        array_unshift($array_product, $pages_count);//добавляем количество страниц в массив данных
        array_unshift($array_product, $data_category['id']);//добавляем id категории в начало массива
        array_unshift($array_product, $data_category['name']);//добавляем имя категории в начало массива
        
        return $array_product;
        
        
    }
    //получаем данные для отображения товара
    function get_product(int $id_product)
    {
        //$pdo=new PDO("mysql:host=".HOST.";dbname=".DBNAME,USER,PASSWORD);
        $result=$this->pdo->query("SELECT * from products where id=$id_product");
        $product=$result->fetch();
        //в бд есть товары, где есть только главное фото, поэтому провемяем, есть у товара дополнительные фотки
        if ($product['images']!==null){
            $product['images']=explode(',',$product['images']);
        }

        //добавим сюда строку пути данного товара по категориям
        $cat_path_query=$this->pdo->query("SELECT c.id, c.id_parent, c.name, p.id_category 
                                            from products as p 
                                                left join category as c
                                                on p.id_category=c.id 
                                                where p.id=$id_product");
        $cat_path_result=$cat_path_query->fetch();
        $array_cat[]=$cat_path_result;
        if ($cat_path_result['id_parent']!==null){
            $cat_path_query=$this->pdo->query("SELECT id, id_parent, name from category where id=$cat_path_result[id_parent]");
            $array_cat[]=$cat_path_query->fetch();
        }
        
        $product['cat_path']=array_reverse($array_cat);
        /*echo "<pre>";
            print_r($array_cat);
        echo "</pre>";*/

        //выведем так же рекоммендуемые товары к данному, это будут просто случайные товары
        $recommenation_query=$this->pdo->query("SELECT id, name, image, price  FROM products where id<>$id_product order by rand() limit 10");
        $recommenation_result=$recommenation_query->fetchall();
        $product['recommendation']=$recommenation_result;
        //array_unshift($product,$recommenation_result);
        return $product;


    }
    //рекурсивная функция для поиска всех товаров из выбранной категории, в том числе и вложенных
    /*function recursion(int $id_cat)
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
    }*/


    
}
?>