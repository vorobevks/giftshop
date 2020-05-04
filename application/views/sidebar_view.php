<div class="left-sidebar">
            <div>
                <div class="left-sidebar-item">Каталог товаров</div>
                <?
                $i=0;
                foreach($sidebar as $row)
                {
                ?>
                <div class="left-sidebar-item">
                    <a href="/product/product_list/<?=$row['id']?>" class="left-sidebar-link" data-id="plus<?=$i?>"><?=$row['name']?></a>
                    <?
                    if (count($row)>4){
                    ?>
                    <span class="button-hidden-ul" data-id="plus<?=$i?>">
                        <i class="fas fa-chevron-down" data-id="plus<?=$i?>"></i>
                        <i class="fas fa-chevron-up" data-id="plus<?=$i?>"></i>
                    </span>
                    <div class="hidden-ul" data-id="plus<?=$i++?>">
                    <?
                        foreach($row as $key=>$value){
                            if (is_int($key)){
                        echo "<div><a href='/product/product_list/".$value['id']."' class='left-sidebar-link submenu'>".$value['name']."</a></div>";
                    }}?>
                    </div>
                    <?}?>
                </div>
                <?}?>
            </div>
</div>



