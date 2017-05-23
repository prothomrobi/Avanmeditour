<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("article_model");
    }
    
    // *** latest --------------------------------------------------------------
    public function latest() {
        $this->front_temp->loadData("title", array("title" => "Article"));
        $this->front_temp->loadData("activeLink", array("article" => array("article" => 1)));
        // pagination process --------------------------------------------------
        $total = $this->article_model->get_total_article();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'article/latest';
        $config['total_rows'] = $total;
        $config['per_page'] = 5;
        include (APPPATH . "/config/front_pegi.php");
        $this->pagination->initialize($config);
        // redirecting ---------------------------------------------------------
        $lists = $this->article_model->get_front_article($config['per_page'], $this->uri->segment(2));
        $recents = $this->article_model->get_front_recent_article();
        $this->front_temp->loadCont("front/article.php", array("lists" => $lists, "recents" => $recents));
    }

}