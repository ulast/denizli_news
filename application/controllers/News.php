<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 19:09
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class News extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model','news');
    }

    public function index($category,$url)
    {
        $data   =   $this->news->detail(NULL,$url,$category);

        $this->f_header($data);
        $this->load->view('frontend/news/index',$data);
        $this->f_footer();
    }
} 