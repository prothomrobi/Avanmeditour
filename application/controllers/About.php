<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("about_us_model");
    }

    // *** treatments ----------------------------------------------------------
    public function us($url) {
        if($url){
            // get information and redirecting -------
            $list = $this->about_us_model->get_about_us_details_by_url($url);
            if(!empty($list->title)){
                $this->front_temp->loadData("title", array("title" => $list->title));
                $this->front_temp->loadData("activeLink", array("about_us" => array("about_us" => 1)));
                $this->front_temp->loadCont("front/about_us.php", array("list" => $list));
            }
        }else{
           // direct access not allowed on this function! so redirect to base url
           redirect(site_url());
        }
    }
}
