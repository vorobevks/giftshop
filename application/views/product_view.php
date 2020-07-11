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
          <!-- <a href="#">Получить купон на скидку</a> -->
        </div>
        <div class="delivery">
          Доставка по России – <span>295 руб.</span><br>
          Доставка по Оренбургу – <span>0 руб.</span><br>
          Самовывоз в Оренбурге – <span>0 руб.</span><br>
        </div>
      </div>
      <div class="buy-block">
        <a href="#" id="btn_incart" class="button button-in-cart">В корзину</a>
        <input type="hidden" id="id_product" value="<?=$data['id']?>">
        <div class="">или</div>
        <div class="button button-buy button-modal">Купить в 1 клик</div>
        <div class="modal">
                <div class="modal_buy_one_click modal-dialog">
                    <div class="button-close"><i class="fas fa-times"></i></div>
                    <!--button class="button-close"><i class="fas fa-times"></i></button-->
                    <form id="buy_form" action="/cart/order/<?=$data['id']?>" method="POST">
                        <h3 class="modal-title">Введите Ваши данные</h3>
                        <input type="text" name ="buy_fio" id="buy_fio" placeholder='Фамилия Имя Отчество'><br>
                        <input type="text" name = "buy_address" id = "buy_address" placeholder='Ваш Адрес'><br>
                        <input type="text" name = "buy_phone" id = "buy_phone" class="phone_mask" placeholder='Ваш номер телефона'><br>
                        <input type="textarea" name= "buy_comment" id = "buy_comment" placeholder='Ваш комментарий' cols="30" rows="4"><br>
                        <input type="hidden" name="name_form" value="buy_one_click">
                        <input type="hidden" name="id_product" value="<?=$data['id']?>">
                        <input type="submit" class= "submit_button" value="Оформить заказ">
                    </form>
                    
                </div>
            </div>
      </div>
      <div class="description">
        <?=$data['description']?>
      </div>
    </div>
  </div>
  <span class="text">Советуем посмотреть:</span><br><br>
  <!--советуем посмотреть->
  <div class="product-list product-list-recommendation">
  <?
  //foreach($data['recommendation'] as $row){
  ?>
    <div class="product-item">
      <a href="<?//='/product/product/'.$row['id']?>" class="product-link">
        <div class="image-block">
          <img src="<?//=$row['image']?>"
            alt="" class="product-image">
        </div>
        <span class="product-name">
          <?//=$row['name']?>
        </span>
        <span class="product-price">
          Цена: <?//=$row['price']?> рублей
        </span>
      </a>
    </div>
  <?//}?>   
  </div-->
  <div class="product-list product-list-recommendation">
  <div class="swiper-container slider-recommenation">
    <div class="swiper-wrapper">
    <? $i=0;
      foreach($data['recommendation'] as $row){
        $i++;
    ?>
    <div class="swiper-slide">
        
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
    <!-- Add Pagination -->
    
  </div>
  </div>
