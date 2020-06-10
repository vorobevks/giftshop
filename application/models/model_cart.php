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
        $query = $this->pdo->query("select * from products where id in (select id_product from cart where id_user=$id_user)");
        $result=$query->fetchall();
        return $result;
    }
    //удаляем товр из корзины
    function del_product(int $id_product, $id_user){
        $this->pdo->query("delete from cart where id_user=$id_user and id_product=$id_product");
    }
    
}?>