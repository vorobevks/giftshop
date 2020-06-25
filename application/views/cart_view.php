<?
if ($data===null) echo "Для добавления товаров в корзину Вам необходимо авторизоваться"; 
else if ($data===0) echo "Ваша корзина пуста. Воспользуйтесь <a href='/'>каталогом товаров</a>.";
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
foreach ($data as $row) {
    $result_cost+=$row['price'];
?>
    <tr class="productincart" data-id=<?=$row['id']?>>
        <td class="column_incart"><a href="/product/product/<?=$row['id']?>"><img src="<?=$row['image']?>" alt=""></a></td>
        <td><a href="/product/product/<?=$row['id']?>"><?=$row['name']?></a></td>
        <td class="column_incart price" data-price="<?=$row['price']?>"><?=$row['price']?> &#8381;</td>
        <td class="column_incart tdblock">
        <div class="count_less count_button"><i class="fas fa-caret-left"></i></div>
        <input type="text" class="count_value" value=1 disabled>
        <div class="count_more count_button"><i class="fas fa-caret-right"></i></div>
        </td>
        <td class="column_incart cost tdblock" data-cost="<?=$row['price']?>"><?=$row['price']?> &#8381;</td>
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
                    <form id="buy_form" action="/cart/buy" method="POST">
                        <h3 class="modal-title">Введите Ваши данные</h3>
                        <input type="text" name ="fio" placeholder='Фамилия Имя Отчество'><br>
                        <input type="text" name= "address" placeholder='Ваш Адрес'><br>
                        <input type="text" name= "phone" placeholder='Ваш номер телефона'><br>
                        <input type="textarea" name= "comment" placeholder='Ваш комментарий' cols="30" rows="4"><br>
                        <input type="submit" class= "submit_button" value="Оформить заказ">
                    </form>
                    
                </div>
            </div>
        </td>
    </tr>
</table>
<?}?>
 