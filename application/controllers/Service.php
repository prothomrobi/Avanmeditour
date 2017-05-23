<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("service_package_model");
    }
    
    // *** package -------------------------------------------------------------
    public function package($url) {
        if($url){
            // get information and redirecting -------
            $list = $this->service_package_model->get_service_package_details_by_url($url);
            if(!empty($list->title)){
                $this->front_temp->loadData("title", array("title" => $list->title));
                $this->front_temp->loadData("activeLink", array("service_package" => array("service_package" => 1)));
                $this->front_temp->loadCont("front/service_package.php", array("list" => $list));
            }
        }else{
           // direct access not allowed on this function! so redirect to base url
           redirect(site_url());
        }
    }

    // *** sub -----------------------------------------------------------------
    public function sub($url) {
        if($url){
            // get information and redirecting -------
            $list = $this->service_package_model->get_service_package_sub_details_by_url($url);
            if(!empty($list->title)){
                $this->front_temp->loadData("title", array("title" => $list->title));
                $this->front_temp->loadData("activeLink", array("service_package" => array("service_package" => 1)));
                $this->front_temp->loadCont("front/service_package_sub.php", array("list" => $list));
            }
        }else{
           redirect(site_url());
        }
    }
}