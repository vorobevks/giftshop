<div class="slider"></div>
<div class="search-group">
    <form action="" class="search">
        <input type="text" placeholder="Поиск по товарам..." class="search-text">
        <input type="submit" value="Найти" class="search-button">
    </form>
</div>
<h2>Рекомендуемые товары</h2>
<div class="product-list">
    <?
        foreach($data as $row){
    ?>
        <div class="product-item">
        <a href="/product/product/<?=$row['id']?>" class="product-link">
            <div class="image-block">
                <img src="<?=$row['image']?>"
                    alt="" class="product-image">
            </div>
            <span class="product-name">
                <?=$row['name']?>
            </span>
            <span class="product-price">
                <?=$row['price']?>
            </span>
        </a>
    </div>   
    <?
        }
    ?>

</div>