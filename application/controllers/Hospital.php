<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hospital extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("hospital_details_model");
    }

    // *** guide --------------------------------------------------------------
    public function country($url) {
        // is url empty?
        if (empty($url))
            redirect (site_url());
        // check is it exist url?
        $url = $this->hospital_details_model->get_hospital_country_by_request_url($url);
        if(!empty($url)){
            $left_menus = $this->hospital_details_model->left_side_list();
            $list = $this->hospital_details_model->get_all_hospitals_details_by_url($url->country);
            // print_r($list);
            // exit;
            $this->front_temp->loadData("title", array("title" => $list['0']->country));
            $this->front_temp->loadData("activeLink", array("tours" => array("tours" => 1)));
            $this->front_temp->loadCont("front/country_hospital.php", array("list" => $list, "left_menus" => $left_menus));
        }else{
            // 404 load here -------
            echo "404 not found! (URL)";
        }
    }



}
