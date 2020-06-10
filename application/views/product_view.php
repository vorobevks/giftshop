  <div class="category-path">
    <a href="/">Главная</a>&#8594
    <?
    foreach($data['cat_path'] as $row){
    ?>
    <a href="/product/product_list/<?=$row['id']?>"><?=$row['name']?></a>&#8594
    <?} 
    echo $data['name'];?>
    
  </div>
  <div class="product">
    <div class="photo-product">
      <div class="main-photo-product">
        <img id="main-photo" src="<?=$data['image'];?>" alt="">
      </div>
      <div class="small-photo-block">
        <div class="small-photo-item">
          <img src="<?=$data['image']?>" alt="">
        </div>
        
        <?
          /*echo "<pre>";
          print_r($data);
          echo "</pre>";*/
          if ($data['images']){
            foreach ($data['images'] as $small_photo){
           
        ?>
        <div class="small-photo-item">
          <img src="<?=$small_photo?>" alt="">
        </div>
        <?}}?>

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
        <a href="#" id="btn_incart" class="button button-in-cart">В корзину</a>
        <input type="hidden" id="id_product" value="<?=$data['id']?>">
        <div class="">или</div>
        <a href="#" class="button button-buy">Купить в 1 клик</a>
      </div>
      <div class="description">
        <?=$data['description']?>
      </div>
    </div>
  </div>
  <span class="text">Советуем посмотреть:</span><br><br>
  <!--советуем посмотреть-->
  <div class="product-list product-list-recommendation">
  <?
  foreach($data['recommendation'] as $row){
  ?>
    <div class="product-item">
      <a href="<?='/product/product/'.$row['id']?>" class="product-link">
        <div class="image-block">
          <img src="<?=$row['image']?>"
            alt="" class="product-image">
        </div>
        <span class="product-name">
          <?=$row['name']?>
        </span>
        <span class="product-price">
          Цена: <?=$row['price']?> рублей
        </span>
      </a>
    </div>
  <?}?>   
  </div>
