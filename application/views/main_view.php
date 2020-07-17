<div class="swiper-container slider-top">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide"><a href="/product/product_list/2"><img src="/images/slider33.jpg" alt=""></a></div>
        <div class="swiper-slide"><a href="/product/product_list/1"><img src="/images/slider44.jpg" alt=""></a></div>
        <div class="swiper-slide"><a href="/product/product_list/28"><img src="/images/slider55.jpg" alt=""></a></div>
    </div>
    <!-- <div class="swiper-pagination"></div> -->
    
</div>

<!-- <div class="search-group">
    <form action="" class="search">
        <input type="text" placeholder="Поиск по товарам..." class="search-text">
        <input type="submit" value="Найти" class="search-button submit_button">
    </form>
</div> -->
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
            Цена: <?=$row['price']?> &#8381;
            </span>
            
        </a>
    </div>   
    <?
        }
    ?>

</div>