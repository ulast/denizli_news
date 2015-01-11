<?php
/**
 * Proje : mld
 * Tarih : 23.09.2014 - 13:29
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model','main');
    }

    public function f_header($meta)
    {
        $data['categories']     =   $this->main->categories();
        $data['pages']          =   $this->main->pages();
        $data['meta']           =   $meta;
        $data['videos']         =   $this->main->videos();

        $this->load->view('frontend/main/header',$data);
    }

    public function f_footer()
    {
        $this->load->view('frontend/main/footer');
    }

    public function b_header()
    {
        $this->load->view('backend/main/header');
    }

    public function b_footer()
    {
        $this->load->view('backend/main/footer');
    }
} 