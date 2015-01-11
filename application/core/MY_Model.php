<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 10:55
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class MY_Model extends CI_Model
{
    public function seflink($link)
    {
        $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','ç','Ç');
        $en = array('s','s','i','i','g','g','u','u','o','o','c','c');
        $link = str_replace($tr,$en,$link);
        $link = strtolower($link);
        $link = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '-', $link);
        $link = preg_replace('/[^%a-z0-9 _-]/', '-', $link);
        $link = preg_replace('/\s+/', '-', $link);
        $link = preg_replace('|-+|', '-', $link);
        $link = str_replace("--","-",$link);
        $link = trim($link, '-');
        return $link;
    }

    public function keywords($title)
    {
        $title  =   explode(" ",$title);
        $title  =   implode(",",array_filter($title));
        return $title;
    }

    public function _cache($list,$source_ID)

    {
        $time   =   strtotime(date("Y-m-d H:i:s"));

        $this->cache->file->save($source_ID .'_'. $time, $list, 180);

        $this->db->update("sources",array('last_insert'=>date("Y-m-d H:i:s",$time)),array('source_ID'=>$source_ID));
    }

    public function category_list()
    {
        $categories = $this->db->select('*')->from('categories')->get()->result_array();

        $return =   "<select name='category[]' class='form-control'>";
        foreach($categories AS $category)
        {
            $return .=   "<option value='". $category['category_ID'] ."'>". $category['title'] ."</option>";
        }
        $return .=  "</select>";

        return $return;
    }
}