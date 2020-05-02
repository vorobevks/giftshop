<div class="product-list">

    <?
    //print_r($data);
    foreach ($data as $row)
    {
    ?>
    <div class="product-item">
        <a href="/product/product/<?=$row['id']?>" class="product-link">
            <div class="image-block">
                <img src="<?=$row['image'] ?>" alt="" class="product-image">
            </div>
            <span class="product-name">
            <?=$row['name'];?>
            </span>
            <span class="product-price">
                Цена: <?=$row['price'];?> рублей
            </span>
        </a>
    </div>
    <?
    }
    ?>
    <!--навигация по страницам-
    <div class="pagination">
        <div class="top_pagination">
            <strong>Страницы</strong>
            <span>&#8592; Ctrl</span>
            <a class="pred prev_page_link" href="">предыдущая</a>
            <a class="next_page_link" href="">следующая</a> Ctrl &#8594;
        </div>
        <div class="bottom_pagination">
            <ul class="list_pagination">
                <li class="item_pagination"><a href="" class="link_pagination">1</a></li>
                <li class="item_pagination"><a href="" class="link_pagination">2</a></li>
                <li class="item_pagination"><a href="" class="link_pagination">3</a></li>
                <li class="item_pagination"><a href="" class="link_pagination">4</a></li>
                <li class="item_pagination"><a href="" class="link_pagination">5</a></li>
            </ul>
        </div>
    </div>-->

</div>


