<?php
/**
 * Proje : Denizli News
 * Tarih : 30.10.2014 - 14:53
 * Mail  : ulas@mail.com
 */

class Categories extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($url)
    {
        $data['category']           =   $this->db
                                        ->select('*')
                                        ->from('categories')
                                        ->where('categories.url',$url)
                                        ->get()->row_array();

        $data['category_news']      =   $this->db
                                        ->select('*')
                                        ->from('news')
                                        ->where('category',$data['category']['category_ID'])
                                        ->get()->result_array();

        $this->f_header($data['category']);
        $this->load->view('frontend/categories/index',$data);
        $this->f_footer();
    }
} 