<?php
/**
 * Proje : Denizli News
 * Tarih : 10.11.2014 - 12:25
 * Mail  : ulas@mail.com
 */

class News_model extends MY_Model
{
    public function detail($news_ID=NULL, $url=NULL, $category=NULL)
    {
                    $this->db->select('news.*, categories.url AS category_url, categories.title AS category_title');
                    $this->db->from('news');
                    if($news_ID == NULL)
                    {
                        $this->db->where('news.url',$url);
                        $this->db->where('categories.url',$category);
                    }
                    else
                    {
                        $this->db->where('news.news_ID',$news_ID);
                    }
                    $this->db->join('categories','categories.category_ID = news.category');
        $data   =   $this->db->get()->row_array();

        return $data;
    }

    public function tag($content)
    {

    }
} 