<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Medical extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("medical_treatments_model");
    }
    
    // *** treatments ----------------------------------------------------------
    public function treatments($url) {
        if($url){
            // get information and redirecting -------
            $list = $this->medical_treatments_model->get_medical_treatments_details_by_url($url);
            if(!empty($list->title)){
                $this->front_temp->loadData("title", array("title" => $list->title));
                $this->front_temp->loadData("activeLink", array("treatments" => array("treatments" => 1)));
                $this->front_temp->loadCont("front/medical_treatment.php", array("list" => $list));
            }
        }else{
           // direct access not allowed on this function! so redirect to base url
           redirect(site_url());
        }
    }
    
    // all_treatments ----------------------------------------------------------
    public function all_treatments() {
        // get & send all traetments -------
        $lists = $this->medical_treatments_model->get_all_treatments();
        $this->front_temp->loadData("title", array("title" => "All Medical Treatment"));
        $this->front_temp->loadData("activeLink", array("treatments" => array("treatments" => 1)));
        $this->front_temp->loadCont("front/all_medical_treatment.php", array("lists" => $lists));
    }

}