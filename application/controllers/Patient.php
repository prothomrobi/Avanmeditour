<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Patient extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("patient_guide_model");
    }
    
    // *** guide --------------------------------------------------------------
    public function guide($url) {
        // is url empty?
        if (empty($url))
            redirect (site_url());
        // check is it exist url?
        $url = $this->patient_guide_model->get_patient_guide_url_by_request_url($url);
        if(!empty($url)){
            // get information and redirecting -------
            $list = $this->patient_guide_model->get_patient_guide_details_by_url($url->url);
            $this->front_temp->loadData("title", array("title" => $list->title));
            $this->front_temp->loadData("activeLink", array("patient" => array("patient" => 1)));
            $this->front_temp->loadCont("front/patient_guide.php", array("list" => $list));
        }else{
            // 404 load here -------
            echo "404 not found!";
        }
    }
    
    

}
