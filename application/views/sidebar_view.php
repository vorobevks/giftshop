<div class="left-sidebar">
            <ul>
                <li class="left-sidebar-item">Каталог товаров</li>
                <?
                foreach($sidebar as $row)
                {
                ?>
                <li class="left-sidebar-item"><a href="/product/product_list/<?=$row['id']?>" class="left-sidebar-link"><?=$row['name']?></a></li>
                <?
                }
                ?>
            </ul>
        </div>


