<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 19:11
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 blog-main">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Kategoriler</button>
            </p>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $title; ?></h2>
                <p class="blog-post-meta">
                    <?php echo date("d-m-Y H:i",strtotime($date_time)); ?>
                    <a href="<?php echo $category_url; ?>" class="pull-right"><?php echo $category_title; ?></a>
                </p>
                <blockquote>
                    <p>
                        <?php echo $description; ?>
                    </p>
                </blockquote>
                <img src="img/news/<?php echo $source ."/". $image; ?>" class="pull-right" style="width: 50%; margin: 10px;">
                <?php echo $content; ?>
            </div><!-- /.blog-post -->
            <ul class="pager pull-left">
                <?php
                $keywords   =   explode(",",$keywords);
                foreach($keywords AS $key)
                {
                    echo '<li style="margin-right:5px;"><a href="tag/'. $key .'">'. mb_strtolower($key) .'</a></li>';
                }
                ?>
            </ul>

        </div>

        <?php $this->load->view('frontend/main/sidebar'); ?>

    </div>
</div>