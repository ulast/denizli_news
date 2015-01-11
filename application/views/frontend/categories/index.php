<?php
/**
 * Proje : Denizli News
 * Tarih : 30.10.2014 - 14:55
 * Mail  : ulas@mail.com
 */
?>
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Kategoriler</button>
        </p>
        <div class="col-xs-12 col-sm-9">
            <?php
            if($category_news)
            {
            ?>
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <div class="thumbnail">
                        <img style="width: 99%;" src="img/news/<?php echo $category_news[0]['source'] ."/". $category_news[0]['image']; ?>" alt="<?php echo ucfirst(mb_strtolower($category_news[0]['title'])); ?>">
                        <div class="caption">
                            <h3><?php echo $category_news[0]['title']; ?></h3>
                            <p>
                                <?php
                                if(strlen($category_news[0]['description']) > 500)
                                {
                                    echo $category_news[0]['description'];
                                }
                                else
                                {
                                    echo $category_news[0]['description'];
                                    echo '<hr style="margin:0;"/>';
                                    echo substr(strip_tags($category_news[0]['content']),0,400) ."...";
                                }
                                ?>
                            </p>
                            <p class="pull-left">
                                <a href="<?php echo $category['url'] ."/". $category_news[0]['url']; ?>" class="btn btn-primary" role="button">Devamı <i class="glyphicon glyphicon-arrow-right"></i></a>
                            </p>
                            <p class="pull-right">
                                <strong><?php echo date("d/m/Y H:i",strtotime($category_news[0]['date_time'])); ?></strong>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <?php
                foreach($category_news AS $k=>$v)
                {
                    if($k != 0)
                    {
                        ?>
                        <div class="col-sm-6 col-md-4 last_news" style="font-size: 12px;" id="<?php echo $k; ?>">
                            <div class="media" style="margin-bottom:5px;">
                                <a href="<?php echo $category['url'] ."/". $v['url']; ?>">
                                    <img class="last_news_image" id="image_<?php echo $k; ?>" style="<?php if($k != 1){echo "display:none;";}?> width: 100%;" src="img/news/<?php echo $v['source'] ."/". $v['image']; ?>" alt="...">
                                    <h4 class="media-heading"><?php echo $v['title']; ?></h4>
                                </a>
                                <?php echo substr($v['description'],0,120); ?>...
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
            <?php
            }
            else
            {
                echo '<div class="row"><div class="col-sm-12 col-md-12">Yok</div></div>';
            }
            ?>
        </div>
        <div class="col-sm-3 hidden-xs">
            <div class="panel panel-default">
                <div class="panel-heading"> <i class="glyphicon glyphicon-facetime-video"></i> Video</div>
                <div class="panel-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner videos">
                            <?php
                            foreach($videos AS $k=>$video){
                                ?>
                                <div class="item <?php if($k == 0){echo 'active';} ?>" data-title="<?php echo $video['title']; ?>" data-href="<?php echo $video['url']; ?>" data-toggle="modal" data-target="#video">
                                    <img src="<?php echo $video['image']; ?>" alt="<?php echo $video['title']; ?>">
                                    <div class="carousel-caption">
                                        <?php echo $video['title']; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('frontend/main/sidebar'); ?>
    </div>
</div>