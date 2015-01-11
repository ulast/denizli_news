<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 15:35
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class Main_model extends CI_Model
{
    public function category_news($category,$limit)
    {
        $data   =   $this->db
                    ->select('*')
                    ->from('news')
                    ->where('category',$category)
                    ->order_by('date_time','DESC')
                    ->limit($limit)
                    ->get()->result_array();

        return $data;
    }

    public function daily_news()
    {
        $daily  =   date("Y-m-d") ." 00:00:00";

        $data   =   $this->db
                    ->select('news.*, categories.url AS category_url')
                    ->from('news')
                    ->where('date_time >',$daily)
                    ->join('categories','categories.category_ID = news.category')
                    ->get()->result_array();

        return $data;
    }

    public function last_news($number)
    {
        $data   =   $this->db
                    ->select('news.*, categories.url AS category_url')
                    ->from('news')
                    ->join('categories','categories.category_ID = news.category')
                    ->order_by('date_time','DESC')
                    ->limit($number)
                    ->get()->result_array();

        return $data;

    }

    public function categories()
    {
        $data   =   $this->db
                    ->select('*')
                    ->from('categories')
                    ->get()->result_array();

        return $data;
    }

    public function videos()
    {
        $data   =   $this->db
                    ->select('*')
                    ->from('videos')
                    ->get()->result_array();

        return $data;
    }

    public function pages()
    {
        $data       =   $this->db
                        ->select('*')
                        ->from('pages')
                        ->get()->result_array();

        return $data;
    }
} 