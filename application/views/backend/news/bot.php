<?php
/**
 * Proje : mld
 * Tarih : 24.09.2014 - 12:35
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-sm-6">
            <form action="" method="POST" id="news_search" class="form-inline">
                <select name="day" id="" class="form-control col-xs-2 input-sm">
                    <?php
                    for($i=1; $i<=31; $i++)
                    {
                        echo '<option value='. sprintf("%02d", $i);
                        if($i == date('d', strtotime(' -1 day'))){echo ' selected';}
                        echo '>'. sprintf("%02d", $i) .'</option>';
                    }
                    ?>
                </select>
                <select name="month" id="" class="form-control col-xs-2 input-sm">
                    <?php
                    for($i=1; $i<=12; $i++)
                    {
                        echo '<option value='. sprintf("%02d", $i);
                        if($i == date("m")){echo ' selected';}
                        echo '>'. sprintf("%02d", $i) .'</option>';
                    }
                    ?>
                </select>
                <select name="year" id="" class="form-control col-xs-2 input-sm">
                    <?php
                    for($i=date("Y") - 10; $i<=date("Y"); $i++)
                    {
                        echo '<option value='. $i;
                        if($i == date("Y")){echo ' selected';}
                        echo '>'. $i .'</option>';
                    }
                    ?>
                </select>
                <div class="clearfix"></div>
                <select name="time_1" id="" class="form-control col-xs-2 input-sm">
                    <?php
                    for($i=0; $i<=23; $i++)
                    {
                        echo '<option value='. sprintf("%02d", $i);
                        if($i == date("h")){echo ' selected';}
                        echo '>'. sprintf("%02d", $i) .'</option>';
                    }
                    ?>
                </select>
                <select name="time_2" id="" class="form-control col-xs-2 input-sm">
                    <?php
                    for($i=0; $i<=59; $i++)
                    {
                        echo '<option value='. sprintf("%02d", $i);
                        if($i == date("i")){echo ' selected';}
                        echo '>'. sprintf("%02d", $i) .'</option>';
                    }
                    ?>
                </select>
                <div class="clearfix"></div>
                <select name="source" id="source" class="form-control col-xs-2 input-sm">
                    <?php
                    foreach($sources AS $source)
                    {
                        echo '<option value="'. $source['slug'] .'">'. $source['name'] .'</option>';
                    }
                    ?>
                </select>
                <div class="clearfix"></div>
                <input type="submit" value="Sorgula"/>
                <div class="clearfix"></div>
                <div id="cat"></div>
            </form>
        </div>
    </div>


    <div id="news"></div>
</div>