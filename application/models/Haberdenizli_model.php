<?php
/**
 * Proje : mld
 * Tarih : 24.09.2014 - 09:43
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class Haberdenizli_model extends MY_Model
{
    public function listele($gun,$ay,$yil,$saat)
    {
        $bugun  =   $gun .".". $ay .".". $yil ." ". $saat;
        $bugun  =   strtotime($bugun);

        $html = file_get_html('http://www.haberdenizli.com/m/?tum_mansetler');

        foreach($html->find('div.royalSlider div.rsContent') as $article)
        {
            $int_tarih      =   strtotime($this->date_time($article->find('h6', 0)->plaintext));

            if($int_tarih > $bugun)
            {

                $item['title']          =   $article->find('h2', 0)->plaintext;
                $item['date_time']      =   $this->date_time($article->find('h6', 0)->plaintext);
                $item['image']          =   $article->find('img',0)->attr['src'];
                $item['source_link']    =   "http://www.haberdenizli.com/m/". $article->find('a',0)->attr['href'];
                $item['content']        =   $this->content("http://www.haberdenizli.com/m/". $article->find('a',0)->attr['href']);
                $item['description']    =   substr($item['content'],0,100);
                $item['category']       =   1;
                $item['source']         =   3;
                $item['url']            =   $this->seflink($item['title']);
                $item['keywords']       =   $this->keywords($item['title']);

                $articles[] = $item;
            }
        }

        if(isset($articles))
        {
            $this->_cache($articles,3);
            $articles  =   array_values($articles);

            $return     =   "<table class='table table-bordered'>";
            $return     .=  "<tr><th>EKLE</th><th>Haber Başlığı</th><th>Tarihi</th><th>Kategori</th></tr>";

            $i  =   0;
            foreach($articles AS $list)
            {
                $return .=  "<tr><td>";
                $return .=  "<input type='checkbox' name='news[]' value='". $i ."'/>";
                $return .=  "</td><td>";
                $return .=  "<a href='". $list['source_link'] ."' target='_blank'>". $list['title'] ."</a>";
                $return .=  "</td><td>";
                $return .=  $list['date_time'];
                $return .=  "</td><td>";
                $return .=  $this->category_list();
                $return .=  "</td></tr>";

                $i = $i + 1;
            }

            $return .= "</table>";
            $return .=  "<input type='hidden' name='source' value='3'>";
        }
        else
        {
            $return = "Haber Alınamadı!";
        }

        return $return;
    }

    private function content($link)
    {
        $content            =   file_get_html($link);
        $content            =   $content->find('div.text',0)->plaintext;

        return $content;
    }

    private function date_time($tarih)
    {
        $tr_aylar   =   array('Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık');
        $int_aylar  =   array('01','02','03','04','05','06','07','08','09','10','11','12');

        $tarih  =   str_replace($tr_aylar,$int_aylar,$tarih);
        $tarih  =   str_replace(" ",".",$tarih);
        $tarih  =   str_replace(",."," ",$tarih);
        $tarih  =   date("Y-m-d H:i:s",strtotime($tarih));

        return $tarih;
    }
} 