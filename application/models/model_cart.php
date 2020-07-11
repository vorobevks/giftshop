<?
class Model_Cart extends Model{
    //добавляем товар в корзину
    function add_product($id_product, $id_user){
        
        $this->pdo->query("Insert into cart (id_product, id_user, count) values ($id_product, $id_user, 1)");
        return $this->count_products_in_cart($id_user);
    }
    //вычисляем количество товаров в корзине
    function count_products_in_cart($id_user){
        $result = $this->pdo->query("select * from cart where id_user=$id_user")->rowcount();
        return $result;
    }
    //проверяем, лежит ли товар в корзине
    function is_in_cart($id_product, $id_user){
        $result = $this->pdo->query("select * from cart where id_user=$id_user and id_product=$id_product")->rowcount();
        return $result;
    }
    //получаем список товаров в корзине
    function get_cart(int $id_user){
        $query = $this->pdo->query("select p.*, c.count from products as p JOIN cart as c on c.id_product=p.id where p.id in (select id_product from cart where id_user=$id_user)");
        $result=$query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    //изменяем количество товаров в корзине
    function update_count(int $id_user, $id_product, $count){
        $query = $this->pdo->query("update cart set count = $count where id_user=$id_user and id_product=$id_product");
    }
    //получаем список заказов
    function get_order(int $id_user){
        $query = $this->pdo->query("SELECT o.id, GROUP_CONCAT(DISTINCT otp.id_product SEPARATOR '~$') as id_product, GROUP_CONCAT(DISTINCT p.name separator '~$') as name, GROUP_CONCAT(DISTINCT otp.count_product separator '~$') as count_product, o.time, o.status
        from ordering as o
            left join  order_to_product as otp on o.id=otp.id_order 
            inner JOIN products as p on otp.id_product=p.id
            where o.id_user=$id_user 
            GROUP by o.id");
        $result=$query->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    //удаляем товар из корзины
    function del_product(int $id_product, $id_user){
        $this->pdo->query("delete from cart where id_user=$id_user and id_product=$id_product");
    }
    //формируем заказ
    function order($arr, $list_product=null, $user_id=null){
        //корректируем часовой пояс
        $time = time();
        $time += 2 * 3600;
        $sql="insert into ordering (id_user,time,fio,address,phone, comments, status) values (?,?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute([$user_id, date("y-m-d H:i:s",$time), $arr['fio'], $arr['address'],$arr['phone'], $arr['comment'], 'В работе']);
        $id_new_order=$this->pdo->lastInsertId();
        $sql="insert into order_to_product (id_order,id_product,count_product) values (?,?,?)";
        $query = $this->pdo->prepare($sql);
        foreach ($list_product as $row){
        $query->execute([$id_new_order, $row['id'], $row['count']]);
        }
        if (isset($_COOKIE['user_id'])){
            $id_user=$_COOKIE['user_id'];
            $this->pdo->query("delete from cart where id_user=$id_user");
        }

    }
    
}?>