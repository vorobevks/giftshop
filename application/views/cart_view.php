<div class="tabs">
    <input type="radio" name="inset" value="" id="tab_1" checked>
    <label for="tab_1" class="qwe">Корзина</label>

    <input type="radio" name="inset" value="" id="tab_2">
    <label for="tab_2" class="qwe">Заказы</label>

    <div id="txt_1">
    <?
   
if ($data['cart']===null) echo "Для добавления товаров в корзину Вам необходимо авторизоваться"; 
else if ($data['cart']===0) echo "Ваша корзина пуста. Воспользуйтесь <a href='/'>каталогом товаров</a>.";
else {
?>
<table class="list_cart">
    <tr class="header_cart">
        <th class="header_cart_item" colspan="2">Наименование товара</th>
        
        <th class="header_cart_item">Цена</th>
        <th class="header_cart_item">Количество</th>
        <th class="header_cart_item">Стоимость</th>
        <th class="header_cart_item">Удалить</th>
    </tr>
<?
$result_cost=0;
foreach ($data['cart'] as $row) {
    $result_cost+=$row['price']*$row['count'];
?>
    <tr class="productincart" data-id=<?=$row['id']?>>
        <td class="column_incart"><a href="/product/product/<?=$row['id']?>"><img src="<?=$row['image']?>" alt=""></a></td>
        <td><a href="/product/product/<?=$row['id']?>"><?=$row['name']?></a></td>
        <td class="column_incart price cart_price" data-price="<?=$row['price']?>"><?=$row['price']?> &#8381;</td>
        <td class="column_incart tdblock">
        <div class="count_less count_button" data-id=<?=$row['id']?>><i class="fas fa-caret-left"></i></div>
        <input type="text" class="count_value" value=<?=$row['count']?> disabled>
        <div class="count_more count_button" data-id=<?=$row['id']?>><i class="fas fa-caret-right"></i></div>
        </td>
        <td class="column_incart cost tdblock" data-cost="<?=$row['price']*$row['count']?>"><?=$row['price']*$row['count']?> &#8381;</td>
        <td class="column_incart tdblock"> <div class="button-del" title="Удалить из корзины" id="<?=$row['id']?>"><i class="fas fa-trash"></i></div></td>
    </tr>
<?}?>
    <tr class="result">
        <td colspan="4" >Общая стоимость заказа</td>
        <td class="final_cost" data-cost="<?=$result_cost?>"><?=$result_cost?> &#8381;</td>
        <td class="submit">
            <div class="buy_cart button-modal button">Оформить заказ</div>
            <div class="modal">
                <div class="modal-buy modal-dialog">
                    <div class="button-close"><i class="fas fa-times"></i></div>
                    <!--button class="button-close"><i class="fas fa-times"></i></button-->
                    <form id="buy_form" action="/cart/order" method="POST">
                        <h3 class="modal-title">Введите Ваши данные</h3>
                        <input type="text" name ="buy_fio" id="buy_fio" placeholder='Фамилия Имя Отчество'><br>
                        <input type="text" name = "buy_address" id = "buy_address" placeholder='Ваш Адрес'><br>
                        <input type="text" name = "buy_phone" id = "buy_phone" class="phone_mask" placeholder='Ваш номер телефона'><br>
                        <input type="textarea" name= "buy_comment" id = "buy_comment" placeholder='Ваш комментарий' cols="30" rows="4"><br>
                        <input type="hidden" name="name_form" value="buy">
                        <input type="submit" class= "submit_button" value="Оформить заказ">
                    </form>
                    
                </div>
            </div>
        </td>
    </tr>
</table>
<?}?>
    </div>
    <div id="txt_2">
    <?
        if ($data['order']===null) echo "Для просмотра заказов Вам необходимо авторизоваться"; 
        else if ($data['order']===0) echo "Вы еще не сделали ни одного заказа. Воспользуйтесь <a href='/'>каталогом товаров</a>.";
        else {?>
            <table class="list_cart">
                <tr class="header_cart">
                    <th class="header_cart_item">№ Заказа</th>
                    <th class="header_cart_item">Товары в заказе</th>
                    <th class="header_cart_item">Дата оформления заказа</th>
                    <th class="header_cart_item">Статус</th>
                    
                </tr>
            <?
                foreach ($data['order'] as $row){
                    $arr_id=explode("~$", $row['id_product']);
                    $arr_name=explode("~$", $row['name']);
                    $arr_count=explode("~$", $row['count_product']);
            ?>
                <tr class="productincart" data-id=<?=$row['id']?>>
                    <td class="column_incart">№ <?=$row['id']?></td>
                    <td>
                    <?
                    for($i=0;$i<count($arr_id);$i++)
                    {
                        echo "<a href='/product/product/$arr_id[$i]'>$arr_name[$i] - $arr_count[$i] шт.</a><br>";
                    }
                    ?>
                    </td>
                    <td class="column_incart price cart_price"><?=$row['time']?></td>
                    <td class="column_incart"><?=$row['status']?></td>                   
                </tr>
                <?}?>
            </table>

        <?}
    ?>
    </div>
</div>



 