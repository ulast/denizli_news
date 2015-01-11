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
    }

    public function index($category,$url)
    {
        $data   =   $this->db
                    ->select('news.*, categories.url AS category_url, categories.title AS category_title')
                    ->from('news')
                    ->where('news.url',$url)
                    ->where('categories.url',$category)
                    ->join('categories','categories.category_ID = news.category')
                    ->get()->row_array();

        $this->f_header($data);
        $this->load->view('frontend/news/index',$data);
        $this->f_footer();
    }
} 