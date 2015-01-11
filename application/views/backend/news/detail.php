<?php
/**
 * Proje : Denizli News
 * Tarih : 10.11.2014 - 13:21
 * Mail  : ulas@mail.com
 */
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <form role="form" action="" method="POST">
        <?php
        $break      =   array('news_ID','source','category');
        $textarea   =   array('content');
        foreach($detail AS $k=>$v)
        {
            if(array_search($k,$break) !== FALSE){continue;}
            if(array_search($k,$textarea) !== FALSE)
            {
                ?>
                <div class="form-group">
                    <label for="<?php echo $k; ?>"><?php echo $k; ?></label>
                    <textarea name="<?php echo $k; ?>" id="<?php echo $k; ?>" style="width: 100%; height: 300px;"><?php echo $v; ?></textarea>
                </div>
                <?php
            }
            else
            {
                ?>
                <div class="form-group">
                    <label for="<?php echo $k; ?>"><?php echo $k; ?></label>
                    <input type="text" class="form-control" id="<?php echo $k; ?>" value="<?php echo $v; ?>">
                </div>
                <?php
            }
        }
        ?>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>