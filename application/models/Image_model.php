<?php
class Image_model extends MY_Model
{
    public function resize($url, $source)
    {
        $sizes   =   array(
            '540_300'   =>  array('width' => '540', 'height' => '300'),
            '250_140'   =>  array('width' => '250', 'height' => '140'),
            '260_150'   =>  array('width' => '260', 'height' => '150')
        );

        $this->load->library('Uploadclass');
        $this->uploadclass->Upload($url);

        foreach ($sizes as $key => $size)
        {
            $this->uploadclass->image_resize          = true;
            $this->uploadclass->image_ratio_y         = true;
            $this->uploadclass->image_x               = $sizes[$key]['width'];
            $this->uploadclass->Process('/img/news/'. $source .'/'. $size .'/');
        }
    }
}