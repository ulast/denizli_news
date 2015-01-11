<?php
/**
 * Proje : Denizli News
 * Tarih : 10.11.2014 - 12:25
 * Mail  : ulas@mail.com
 */

class News_model extends MY_Model
{
    public function detail($news_ID)
    {
        $data   =   $this->db
                    ->select('news.*, categories.title AS category_title')
                    ->from('news')
                    ->where('news.news_ID',$news_ID)
                    ->join('categories','categories.category_ID = news.category')
                    ->get()->row_array();

        return $data;
    }

    public function tag($content)
    {

    }
} 