<div class="header_cart">
    <div class="header_cart_item">Наименование товара</div>
    <div class="header_cart_item">Цена</div>
    <div class="header_cart_item">Количество</div>
    <div class="header_cart_item">Стоимость</div>
    <div class="header_cart_item">Удалить</div>
</div>
<?
foreach ($data as $row) {
?>
<div class="productincart">
    <div class="column_incart">
        <div class="image"><img src="<?=$row['image']?>" alt=""><a href="/product/product/<?=$row['id']?>"><?=$row['name']?></a></div>
    </div>
    <div class="column_incart"><?=$row['price']?></div>
    <div class="column_incart"><1></div>
    <div class="column_incart"><?=$row['price']*2?></div>
    <div class="column_incart">x</div>
</div>
<?}?>
 