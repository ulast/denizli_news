<?php
/**
 * Proje : mld
 * Tarih : 26.09.2014 - 10:10
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class Denizliguncel_model extends MY_Model
{
    public function listele($gun,$ay,$yil,$saat)
    {
        $url    =   "http://www.denizliguncel.com/rss.php";
        $xml    =   simplexml_load_file($url);


        if($xml)
        {
            $bugun  =   $gun .".". $ay .".". $yil ." ". $saat;
            $bugun  =   strtotime($bugun);

            $items = $xml->channel->item;
            $i  =   0;
            foreach($items as $item)
            {
                $int_tarih                      =   $this->tarih_duzelt(sprintf("%s", $item->pubDate));
                if($int_tarih > $bugun)
                {
                    $liste[$i]['title']         =   sprintf("%s", $item->title);
                    $liste[$i]['date_time']     =   date("Y-m-d H:i:s",$this->tarih_duzelt(sprintf("%s", $item->pubDate)));
                    $liste[$i]['source_link']   =   sprintf("%s", $item->link);
                    $liste[$i]['content']       =   $this->haber_icerik($item->link);
                    $liste[$i]['description']   =   $this->replace(strip_tags(sprintf("%s", $item->description)));
                    $liste[$i]['category']      =   1;
                    $liste[$i]['source']        =   6;
                    $liste[$i]['image']         =   (string) $item->image;
                    $liste[$i]['url']           =   $this->seflink(sprintf("%s", $item->title));
                    $liste[$i]['keywords']      =   $this->keywords(sprintf("%s", $item->title));
                    $i = $i + 1;
                }
            }

            if(isset($liste))
            {
                $this->_cache($liste,6);
                $z  =   count($liste);

                $return     =   "<table class='table table-bordered'>";
                $return     .=  "<tr><th>EKLE</th><th>Haber Başlığı</th><th>Tarihi</th><th>Kategori</th></tr>";

                for($i=0; $i<=$z -1; $i++)
                {
                    $return .=  "<tr><td>";
                    $return .=  "<input type='checkbox' name='news[]' value='". $i ."'/>";
                    $return .=  "</td><td>";
                    $return .=  "<a href='". $liste[$i]['source_link'] ."' target='_blank'>". $liste[$i]['title'] ."</a>";
                    $return .=  "</td><td>";
                    $return .=  $liste[$i]['date_time'];
                    $return .=  "</td><td>";
                    $return .=  $this->category_list();
                    $return .=  "</td></tr>";
                }

                $return .= "</table>";
                $return .=  "<input type='hidden' name='source' value='6'>";
            }
            else
            {
                $return = "Haber Alınamadı!";
            }

            return $return;
        }
    }

    private function haber_icerik($url)
    {
        $file       =   str_replace("\n", '', file_get_contents($url));
        $icerik     =   '/\<div id=\"newstext\" class=\"row-fluid page-content\">(.*)<\/div\>(.*)<\/div\>/U';

        preg_match($icerik,$file,$match);

        return strip_tags($match[0]);
    }

    private function replace($text)
    {
        return preg_replace("/The post ([^\"]*) appeared first on ([^\"]*)/", "", $text);
    }

    private function tarih_duzelt($tarih)
    {
        $en_aylar   =   array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        $en_gunler  =   array('Sun ','Mon ','Tue ','Wed ','Thu ','Fri ','Sat ');
        $int_aylar  =   array('01','02','03','04','05','06','07','08','09','10','11','12');
        $tarih_sa   =   '/(\d+) (\d+) (\d+) (\d+):(\d+):(\d+)/i';
        $yeni_sa    =   '$1.$2.$3 $4:$5:$6';

        $tarih  =   str_replace($en_aylar,$int_aylar,$tarih);
        $tarih  =   str_replace(" +0000","",$tarih);
        $tarih  =   str_replace(",","",$tarih);
        $tarih  =   str_replace($en_gunler,"",$tarih);
        $tarih  =   preg_replace($tarih_sa,$yeni_sa,$tarih);
        $tarih  =   strtotime($tarih);

        return $tarih;
    }
} 