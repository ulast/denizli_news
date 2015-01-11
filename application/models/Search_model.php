<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 21:06
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class Search_model extends CI_Model
{
    public function json($query)
    {
        $data   =   $this->db
                    ->select('title')
                    ->from('news')
                    ->like('title',$query)
                    ->get()->result_array();

        //$data   =   json_encode($data,JSON_UNESCAPED_UNICODE);

        $data = json_encode(array('options' => array('like','spike','dike','ikelalcdass')));

        echo $data;
    }
} 