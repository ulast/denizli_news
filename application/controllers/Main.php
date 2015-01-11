<?php
/**
 * Proje : mld
 * Tarih : 23.09.2014 - 13:29
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class Main extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model','main');
    }

    public function index()
    {
        $meta['title']          =   "Denizli Times";
        $meta['keywords']       =   "Denizli Times";
        $meta['description']    =   "Denizli Times";

        $data['daily_news']     =   $this->main->daily_news();
        $data['last_news']      =   $this->main->last_news(6);

        foreach($this->main->categories() AS $category)
        {
            $data['category_news'][$category['url']]    =   $this->main->category_news($category['category_ID'],3);
        }

        $this->f_header($meta);
        $this->load->view('frontend/main/index',$data);
        $this->f_footer();
    }
} 