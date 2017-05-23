<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("blog_model");
    }
    // *** latest --------------------------------------------------------------
    public function latest() {
        $this->front_temp->loadData("title", array("title" => "Blog"));
        $this->front_temp->loadData("activeLink", array("blog" => array("blog" => 1)));
        // pagination process --------------------------------------------------
        $total = $this->blog_model->get_total_blog();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'blog/latest';
        $config['total_rows'] = $total;
        $config['per_page'] = 5;
        include (APPPATH . "/config/front_pegi.php");
        $this->pagination->initialize($config);
        // redirecting ---------------------------------------------------------
      
        $lists = $this->blog_model->get_front_blog($config['per_page'], $this->uri->segment(2));
        $recents = $this->blog_model->get_front_recent_blog();
        $this->front_temp->loadCont("front/blog.php", array("lists" => $lists, "recents" => $recents));
    }

}
