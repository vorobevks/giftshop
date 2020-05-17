<h4><?=array_shift($data)?></h4>
<div class="product-list">

    <?
    $id_category=array_shift($data);
    $page_count=array_shift($data);
    $page=array_shift($data);
    
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

</div>
<!--div class="pagination">
        <div class="top_pagination">
            <strong>Страницы</strong>
            <span>&#8592; Ctrl</span>
            <a class="pred prev_page_link" href="">предыдущая</a>
            <a class="next_page_link" href="">следующая</a> Ctrl &#8594;
        </div>
        <div class="bottom_pagination">
            <ul class="list_pagination"-->
<?/*
            for($i=1;$i<=$page_count;$i++){
                if ($i==$page)
                    echo '<li class="item_pagination active"><a href="/product/product_list/'.$id_category.'/?page='.$i.'" class="link_pagination">'.$i.'</a></li>';
                else echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page='.$i.'" class="link_pagination">'.$i.'</a></li>';
            }*/
            ?>
<!--/ul>
        </div>
</div-->
<?
if ($page_count>1){
?>
<div class="pagination">
    
    <ul class="list_pagination">
        <?  
            if ($page==1){
                echo '<li class="item_pagination_icon"><a class="disabled" href="#"><i class="fas fa-angle-left"></i></a></li>';
            }
            else echo '<li title="Предыдущая страница"class="item_pagination_icon"><a href="/product/product_list/'.$id_category.'/?page='.($page-1).'"><i class="fas fa-angle-left"></i></a></li>';  

            //если количество страниц меньше или равно 5 то выводим нумерация в обычном формате
            if ($page_count<=5){
                for($i=1;$i<=$page_count;$i++){
                    if ($i==$page)
                        echo '<li class="item_pagination active"><a href="/product/product_list/'.$id_category.'/?page='.$i.'" class="link_pagination">'.$i.'</a></li>';
                    else echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page='.$i.'" class="link_pagination">'.$i.'</a></li>';
                }
            } 
            else{
                //если выбранная страница имеет номер до 3, то мы выводим первые 4 страницы как обычно, потом троеточие, и затем номер последней страницы
                if($page<=3){
                    for($i=1;$i<=4;$i++){
                        if ($i==$page)
                            echo '<li class="item_pagination active"><a href="/product/product_list/'.$id_category.'/?page='.$i.'" class="link_pagination">'.$i.'</a></li>';
                        else echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page='.$i.'" class="link_pagination">'.$i.'</a></li>';
                    }
                    echo '<li class="item_pagination link_pagination empty">...</li>';
                    echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page='.$page_count.'" class="link_pagination">'.$page_count.'</a></li>';
                }
                //если выбранная страница больше 3
                if ($page>3){
                    //сначала выводим номер первой страницы
                    echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page=1" class="link_pagination">1</a></li>';
                    echo '<li class="item_pagination link_pagination empty">...</li>';
                    if ($page<$page_count-2){
                        echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page='.($page-1).'" class="link_pagination">'.($page-1).'</a></li>';
                        echo '<li class="item_pagination active"><a href="/product/product_list/'.$id_category.'/?page='.$page.'" class="link_pagination">'.$page.'</a></li>';
                        echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page='.($page+1).'" class="link_pagination">'.($page+1).'</a></li>';
                        echo '<li class="item_pagination link_pagination empty">...</li>';
                        echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page='.$page_count.'" class="link_pagination">'.$page_count.'</a></li>';
                    }
                    else{
                        for($i=$page_count-3;$i<=$page_count;$i++){
                            if ($i==$page)
                                echo '<li class="item_pagination active"><a href="/product/product_list/'.$id_category.'/?page='.$i.'" class="link_pagination">'.$i.'</a></li>';
                            else echo '<li class="item_pagination"><a href="/product/product_list/'.$id_category.'/?page='.$i.'" class="link_pagination">'.$i.'</a></li>';
                        }
                    }
                }
            }
            if ($page==$page_count){
                echo '<li class="item_pagination_icon"><a class="disabled" href="#"><i class="fas fa-angle-right"></i></a></li>';
            }
            else echo '<li  title= "Следующая страница" class="item_pagination_icon"><a href="/product/product_list/'.$id_category.'/?page='.($page+1).'"><i class="fas fa-angle-right"></i></a></li>';  
            ?>
        
    </ul>

</div>
<?}?>