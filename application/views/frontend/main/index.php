<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 15:07
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */
?>
<div class="container">
    <div class="row hidden-xs">
        <div class="col-md-12">
            <div class="alert alert-danger" style="padding: 5px; margin-bottom: 10px;">
            <strong>SON DAKİKA:</strong>
                <div class='marquee'>
                    <?php
                    foreach($daily_news AS $dn)
                    {
                        echo '<strong>'. date("H:i",strtotime($dn['date_time'])) .'</strong> <a href="'. $dn['category_url'] .'/'. $dn['url'] .'" style="color:#fff;">'. ucfirst(mb_strtolower($dn['title'])) .'</a>';
                        if(end($daily_news) != $dn){echo "|";}
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-offcanvas row-offcanvas-right">
        <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Kategoriler</button>
        </p>
        <div class="col-xs-12 col-sm-9">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <div class="thumbnail">
                        <img style="width: 99%;" src="img/news/<?php echo $last_news[0]['source'] ."/". $last_news[0]['image']; ?>" alt="<?php echo ucfirst(mb_strtolower($last_news[0]['title'])); ?>">
                        <div class="caption">
                            <h3><?php echo $last_news[0]['title']; ?></h3>
                            <p>
                                <?php
                                    if(strlen($last_news[0]['description']) > 500)
                                    {
                                        echo $last_news[0]['description'];
                                    }
                                    else
                                    {
                                        echo $last_news[0]['description'];
                                        echo '<hr style="margin:0;"/>';
                                        echo substr(strip_tags($last_news[0]['content']),0,400) ."...";
                                    }
                                ?>
                            </p>
                            <p class="pull-left">
                                <a href="<?php echo $last_news[0]['category_url'] ."/". $last_news[0]['url']; ?>" class="btn btn-primary" role="button">Devamı <i class="glyphicon glyphicon-arrow-right"></i></a>
                            </p>
                            <p class="pull-right">
                                <strong><?php echo date("d/m/Y H:i",strtotime($last_news[0]['date_time'])); ?></strong>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <?php
                foreach($last_news AS $k=>$v)
                {
                    if($k != 0)
                    {
                ?>
                        <div class="col-sm-6 col-md-4 last_news" style="font-size: 12px;" id="<?php echo $k; ?>">
                            <div class="media" style="margin-bottom:5px;">
                                <a href="<?php echo $v['category_url'] ."/". $v['url']; ?>">
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
            <ul class="nav nav-tabs" role="tablist" id="category_news">
                <?php
                foreach($categories AS $k => $category)
                {
                    if($k == 9){break;}
                    echo '<li';
                    if($k == 0)
                    {
                        echo ' class="active"';
                    }
                    echo '><a href="#'. $category['url'] .'" role="tab" data-toggle="tab">'. $category['title'] .'</a></li>';
                }
                ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                foreach($categories AS $k => $category)
                {
                    echo '<div class="tab-pane ';
                    if($k == 0)
                    {
                        echo 'active';
                    }
                    echo '" id="'. $category['url'] .'">';
                    ?>
                    <div class="row">
                        <?php
                        foreach($category_news[$category['url']] AS $cn)
                        {
                        ?>
                        <div class="col-6 col-sm-6 col-lg-4">
                            <h4><?php echo $cn['title']; ?></h4>
                            <hr style="margin:0"/>
                            <p>
                                <img src="img/news/<?php echo $cn['source'] ."/". $cn['image']; ?>" alt="" style="margin:5px; width: 50%; float: left;"/>
                                <?php echo substr($cn['description'],0,130); ?>
                            </p>
                            <div class="clearfix"></div>
                            <p><a class="btn btn-default btn-xs" href="<?php echo $category['url'] ."/". $cn['url']; ?>" role="button">Devamı &raquo;</a></p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    echo '</div>';
                }
                ?>
            </div>
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
        <div class="col-sm-8">
            <img src="https://storage.googleapis.com/support-kms-prod/SNP_501E7C3D5CA3CA07C641E6BAFB8A53C794CF_2922339_en_v2" alt=""/>
        </div>
    </div>
</div>