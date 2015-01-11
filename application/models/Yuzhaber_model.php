<?php
/**
 * Proje : mld
 * Tarih : 24.09.2014 - 14:42
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class Yuzhaber_model extends MY_Model
{
    public function listele($gun,$ay,$yil,$saat)
    {
        $bugun  =   $gun .".". $ay .".". $yil ." ". $saat;
        $bugun  =   strtotime($bugun);

        $html = file_get_html('http://www.yuzhaber.com/inc/menu_basliklari_listele.php?bolgeid=13&listele=0&date1='. date("d.m.Y") .'&date2='. date("d.m.Y") .'');

        foreach($html->find('ul.sayfa_basliklari li') as $article)
        {
            $int_tarih      =   strtotime($this->date_time($article->find('span.tarih', 0)->plaintext));

            if($int_tarih > $bugun)
            {
                $item['title']          =   $article->find('span.baslik', 0)->plaintext;
                $item['description']    =   $article->find('span.detay', 0)->plaintext;
                $item['date_time']      =   $this->date_time($article->find('span.tarih', 0)->plaintext);
                $item['image']          =   "http://www.yuzhaber.com/". $article->find('img',0)->attr['src'];
                $item['source_link']    =   "http://www.yuzhaber.com/". $article->find('a',0)->attr['href'];
                $item['content']        =   $this->content("http://www.yuzhaber.com/". $article->find('a',0)->attr['href']);
                $item['category']       =   1;
                $item['source']         =   2;
                $item['url']            =   $this->seflink($item['title']);
                $item['keywords']       =   $this->keywords($item['title']);

                $articles[] = $item;
            }
        }

        if(isset($articles))
        {
            $this->_cache($articles,2);
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
            $return .=  "<input type='hidden' name='source' value='2'>";
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
        $content            =   $content->find('div.haber_detay_aciklama',0)->plaintext;

        return $content;
    }

    private function date_time($date_time)
    {
        //$date_time  =   str_replace(".","-",$date_time);
        $date_time  =   date("Y-m-d H:i:s",strtotime($date_time));

        return $date_time;
    }
} 