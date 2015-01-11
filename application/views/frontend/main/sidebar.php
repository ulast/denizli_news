<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 20:32
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */
?>
<div class="col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
    <div class="list-group panel panel-default">
        <div class="panel-heading"> <i class="glyphicon glyphicon-list"></i> Kategoriler</div>
        <?php
        $url    =   explode("/",uri_string());
        foreach($categories AS $category)
        {
            echo '<a href="'. $category['url'] .'" class="list-group-item';
            if(in_array($category['url'],$url)){echo ' active';}
            echo '"> <i class="glyphicon glyphicon-chevron-right"></i> '. $category['title'] .'</a>';
        }
        ?>
    </div>
</div>