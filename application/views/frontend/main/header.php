<?php
/**
 * Proje : mld
 * Tarih : 23.09.2014 - 13:32
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $meta['description']; ?>">
    <meta name="keywords" content="<?php echo $meta['keywords']; ?>">
    <meta name="author" content="">
    <base href="<?php echo base_url(); ?>"/>
    <title><?php echo $meta['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/red.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/cufon-yui.js" type="text/javascript"></script>
    <script src="assets/js/cuxhaven-times.cufonfonts.js" type="text/javascript"></script>
    <script type="text/javascript">
        Cufon.replace('.cuxhaventimes', { fontFamily: 'CuxhavenTimes', hover: true });
    </script>
</head>

<body>
<div class="container">
    <div class="row" style="padding: 5px;">
        <div class="col-md-4 hidden-xs">
            <img src="http://graphics8.nytimes.com/adx/images/ADS/35/92/ad.359252/13_2259_INYT_Anon_184x90_L_ER1.jpg">
        </div>
        <div class="col-md-4 cuxhaventimes">
            The Denizli Times
        </div>
        <div class="col-md-4 hidden-xs">
            <img src="http://graphics8.nytimes.com/adx/images/ADS/35/92/ad.359253/13_2259_INYT_Anon_USD_184x90_R_ER1.jpg" alt="" class="pull-right"/>
        </div>
    </div>
</div>
<div class="navbar navbar-static-top navbar-inverse" role="navigation" style="margin-bottom: 10px;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">MENU</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                    <input type="text" placeholder="Ara.." class="form-control">
                </div>
                <button type="submit" class="btn btn-success"> <i class="glyphicon glyphicon-search"></i> ARA</button>
            </form>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</div><!-- /.navbar -->
