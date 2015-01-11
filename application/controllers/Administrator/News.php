<?php
/**
 * Proje : mld
 * Tarih : 24.09.2014 - 13:03
 * Mail  : ulas@mail.com
 * Web   : http://www.red.net.tr
 */

class News extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Haberdenizli_model','hd');
        $this->load->model('Yuzhaber_model','yh');
        $this->load->model('Deha20_model','dh');
        $this->load->model('Denizlidemokrat_model','dd');
        $this->load->model('Denizlikulvar_model','dk');
        $this->load->model('Denizliguncel_model','dg');
    }

    public function index()
    {
        $this->b_header();
        $this->load->view('backend/news/index');
        $this->b_footer();
    }

    public function bot()
    {
        $data['sources']        =   $this->db
                                    ->select('*')
                                    ->from('sources')
                                    ->get()->result_array();

        $this->b_header();
        $this->load->view('backend/news/bot',$data);
        $this->b_footer();
    }

    public function view_news()
    {
        if($this->input->post())
        {
            $day        =   $this->input->post('day');
            $month      =   $this->input->post('month');
            $year       =   $this->input->post('year');
            $time_1     =   $this->input->post('time_1');
            $time_2     =   $this->input->post('time_2');
            $source     =   $this->input->post('source');

            ?>
            <hr/>
            <form action="administrator/news/add" method="POST">
            <div class="panel-group" id="accordion">
                <?php
                if($source == 'haberdenizli'){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#haberdenizli">
                                haberdenizli.com
                            </a>
                        </h4>
                    </div>
                    <div id="haberdenizli" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <?php echo $this->hd->listele($day,$month,$year,$time_1 .":". $time_2 ); ?>
                        </div>
                    </div>
                </div>
                <?php
                }elseif($source == 'yuzhaber'){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#yuzhaber">
                                yuzhaber.com
                            </a>
                        </h4>
                    </div>
                    <div id="yuzhaber" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $this->yh->listele($day,$month,$year,$time_1 .":". $time_2 ); ?>
                        </div>
                    </div>
                </div>
                <?php
                }elseif($source == 'deha20'){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#deha20">
                                deha20.com
                            </a>
                        </h4>
                    </div>
                    <div id="deha20" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $this->dh->listele($day,$month,$year,$time_1 .":". $time_2 ); ?>
                        </div>
                    </div>
                </div>
                <?php
                }elseif($source == 'denizlidemokrat'){
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#denizlidemokrat">
                                    denizlidemokrat.com
                                </a>
                            </h4>
                        </div>
                        <div id="denizlidemokrat" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php echo $this->dd->listele($day,$month,$year,$time_1 .":". $time_2 ); ?>
                            </div>
                        </div>
                    </div>
                <?php
                }elseif($source == 'denizlikulvar'){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#denizlikulvar">
                                denizlikulvargazetesi.com
                            </a>
                        </h4>
                    </div>
                    <div id="denizlikulvar" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $this->dk->listele($day,$month,$year,$time_1 .":". $time_2 ); ?>
                        </div>
                    </div>
                </div>
                <?php
                }elseif($source == 'denizliguncel'){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#denizliguncel">
                                denizliguncel.com
                            </a>
                        </h4>
                    </div>
                    <div id="denizliguncel" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $this->dg->listele($day,$month,$year,$time_1 .":". $time_2 ); ?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <button class="button button-large">EKLE</button>
            </div>
            </form>
            <?php
        }
    }

    public function hizmet_cat()
    {
        echo $this->hi->kategori();
    }

    public function add()
    {
        if($this->input->post())
        {
            $category   =   $this->input->post('category');
            $news       =   $this->input->post('news');
            $source     =   $this->input->post('source');

            $source_db  =   $this->db->select('*')->from('sources')->where('source_ID',$source)->get()->row_array();
            $time       =   strtotime($source_db['last_insert']);
            $cache      =   $this->cache->file->get($source ."_". $time);


            foreach($news AS $k=>$v)
            {
                $this->download_image($cache[$v]['image'],$source);

                $cache[$v]['category']      =   $category[$v];
                $cache[$v]['content']       =   preg_replace('/\s+/', ' ',strip_tags($cache[$v]['content']));
                $cache[$v]['description']   =   preg_replace('/\s+/', ' ',strip_tags($cache[$v]['description']));
                $cache[$v]['title']         =   preg_replace('/\s+/', ' ',strip_tags($cache[$v]['title']));
                $cache[$v]['image']         =   $this->image($cache[$v]['image']);
                $data                       =   $cache[$v];

                $this->db->insert('news',$data);
            }

            redirect(base_url('administrator/news'));
        }
    }

    private function download_image($url,$source)
    {
        //$this->load->model('News_model','news');

        if($url != "no-image.png")
        {
            /*
            $filename       =   substr($url, strrpos($url, '/') + 1);
            $exp            =   explode(".",$filename);
            $new_filename   =   $this->news->seflink($exp[0]);
            $filename       =   $new_filename .".". end($exp);
            file_put_contents('img/news/'. $source .'/'. $filename, file_get_contents($url));
            */
            $this->load->model('Image_model','image');

            $this->image->resize($url,$source);
        }
    }

    private function image($url)
    {
        $this->load->model('News_model','news');

        $image          =   explode("/",$url);
        $exp            =   explode(".",end($image));
        $new_filename   =   $this->news->seflink($exp[0]);
        $filename       =   $new_filename .".". end($exp);

        return $filename;
    }

    public function datatable_list()
    {
        $this->load->library('Datatables');

        $content =   "<a href='administrator/news/detail/$1'>Detay</a> | <a href='administrator/news/delete/$1'>SİL</a>";

        $this->datatables->select('news_ID,title');
        $this->datatables->select("DATE_FORMAT(news.date_time, '%d-%m-%Y %H:%i:%s') AS tarih", FALSE );
        $this->datatables->from('news');
        $this->datatables->add_column("islem", $content, 'news_ID');

        echo $this->datatables->generate();
    }

    public function delete($news_ID)
    {
        if($this->db->delete('news',array('news_ID'=>$news_ID)))
        {
            redirect(base_url('administrator/news'));
        }
    }

    public function detail($news_ID)
    {
        if($this->input->post())
        {
            $data   =   $this->input->post();
            unset($data['category_title']);

            $this->db->update('news',$data,array('news_ID'=>$news_ID));
        }
        $this->load->model('News_model','news');

        $data['detail']     =   $this->news->detail($news_ID);

        $this->b_header();
        $this->load->view('backend/news/detail',$data);
        $this->b_footer();
    }
} 