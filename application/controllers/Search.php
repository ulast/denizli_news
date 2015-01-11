<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 21:05
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class Search extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Search_model','search');
    }

    public function json()
    {
        $query  =   $this->input->get('query');

        $this->search->json($query);
    }
} 