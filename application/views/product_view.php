<div class="content">
  <div class="category-path">
    <a href="">Главная</a>&#8594
    <a href="">Живые подарки</a>&#8594
    <a href="">Елочные шары "Праздничный квартет" флорариумы</a>
  </div>
  <div class="product">
    <div class="photo-product">
      <div class="main-photo-product">
        <img src="<?=$data['image'];?>" alt="">
      </div>
      <div class="small-photo-block">
        <?
          foreach ($data['images'] as $small_photo){
        ?>
        <div class="small-photo-item">
          <img src="<?=$small_photo?>" alt="">
        </div>
        <?}?>

      </div>
    </div>
    <div class="description-block">
      <h3><?=$data['name']?></h3>
      <div class="price-and-delivery">
        <div class="price">
          <span><?=$data['price']?> руб.</span>
          <a href="">Получить купон на скидку</a>
        </div>
        <div class="delivery">
          Доставка по Москве – <span>295 руб.</span><br>
          Доставка по России – <span>299 руб.</span><br>
          Самовывоз в Москве – <span>0 руб.</span><br>
        </div>
      </div>
      <div class="buy-block">
        <a href="" class="button button-in-cart">В корзину</a>
        <div class="">или</div>
        <a href="" class="button button-buy">Купить в 1 клик</a>
      </div>
      <div class="description">
        <?=$data['description']?>
      </div>
    </div>
  </div>
  <span class="text">Советуем посмотреть:</span><br><br>
  <!--советуем посмотреть-->
  <div class="product-list product-list-recommendation">
    <div class="product-item">
      <a href="product.html" class="product-link">
        <div class="image-block">
          <img src="https://cdn.oboi7.com/99f1da545c810446ee53c05d46e695a02a0d6dda/pejzazhi-priroda-hdr-fotografii.jpg"
            alt="" class="product-image">
        </div>
        <span class="product-name">
          Lorem ipsum dolor sit amet consectetur.
        </span>
        <span class="product-price">
          Цена: 500 рублей
        </span>
      </a>
    </div>
    <div class="product-item">
      <a href="product.html" class="product-link">
        <div class="image-block">
          <img src="https://cdn.oboi7.com/99f1da545c810446ee53c05d46e695a02a0d6dda/pejzazhi-priroda-hdr-fotografii.jpg"
            alt="" class="product-image">
        </div>
        <span class="product-name">
          Lorem ipsum dolor sit amet consectetur.
        </span>
        <span class="product-price">
          Цена: 500 рублей
        </span>
      </a>
    </div>
    <div class="product-item">
      <a href="product.html" class="product-link">
        <div class="image-block">
          <img src="https://cdn.oboi7.com/99f1da545c810446ee53c05d46e695a02a0d6dda/pejzazhi-priroda-hdr-fotografii.jpg"
            alt="" class="product-image">
        </div>
        <span class="product-name">
          Lorem ipsum dolor sit amet consectetur.
        </span>
        <span class="product-price">
          Цена: 500 рублей
        </span>
      </a>
    </div>
    <div class="product-item">
      <a href="product.html" class="product-link">
        <div class="image-block">
          <img src="https://cdn.oboi7.com/99f1da545c810446ee53c05d46e695a02a0d6dda/pejzazhi-priroda-hdr-fotografii.jpg"
            alt="" class="product-image">
        </div>
        <span class="product-name">
          Lorem ipsum dolor sit amet consectetur.
        </span>
        <span class="product-price">
          Цена: 500 рублей
        </span>
      </a>
    </div>
    <div class="product-item">
      <a href="product.html" class="product-link">
        <div class="image-block">
          <img src="https://cdn.oboi7.com/99f1da545c810446ee53c05d46e695a02a0d6dda/pejzazhi-priroda-hdr-fotografii.jpg"
            alt="" class="product-image">
        </div>
        <span class="product-name">
          Lorem ipsum dolor sit amet consectetur.
        </span>
        <span class="product-price">
          Цена: 500 рублей
        </span>
      </a>
    </div>
  </div>
</div>