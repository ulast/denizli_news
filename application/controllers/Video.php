<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 22:59
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class Video extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function load($ID)
    {
        echo    '<iframe width="100%" height="315" src="//www.youtube.com/embed/'. $ID .'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
    }
} 