<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Doctor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("doctor_model");
    }

    // *** guide --------------------------------------------------------------
    public function expert($url) {
        // is url empty?
        if (empty($url))
            redirect (site_url());
        // check is it exist url?
        $url = $this->doctor_model->get_doctor_expert_by_request_url($url);

        if(!empty($url)){
            $left_menus = $this->doctor_model->get_expert_all();
            $list = $this->doctor_model->get_all_doctors_details_by_url($url->expert);
            $this->front_temp->loadData("title", array("title" => $list['0']->expert));
            $this->front_temp->loadData("activeLink", array("tours" => array("tours" => 1)));
            $this->front_temp->loadCont("front/expert_doctor.php", array("list" => $list, "left_menus" => $left_menus));
        }else{
            // 404 load here -------
            echo "404 not found! (URL)";
        }
    }
    public function domestic_expert($url) {
        // is url empty?
        if (empty($url))
            redirect (site_url());
        // check is it exist url?
        $url = $this->doctor_model->get_doctor_expert_by_request_url($url);

        if(!empty($url)){
            $left_menus = $this->doctor_model->get_expert_all();
            $list = $this->doctor_model->get_all_doctors_details_by_domestic_url($url->expert);
            $this->front_temp->loadData("title", array("title" => $url->expert));
            $this->front_temp->loadData("activeLink", array("tours" => array("tours" => 1)));
            $this->front_temp->loadCont("front/expert_doctor.php", array("list" => $list, "title" => $url->expert, "left_menus" => $left_menus, "domestic" => 'domestic'));
        }else{
            // 404 load here -------
            echo "404 not found! (URL)";
        }
    }
    public function international_expert($url) {
        // is url empty?
        if (empty($url))
            redirect (site_url());
        // check is it exist url?
        $url = $this->doctor_model->get_doctor_expert_by_request_url($url);

        if(!empty($url)){
            $left_menus = $this->doctor_model->get_expert_all();
            $list = $this->doctor_model->get_all_doctors_details_by_international_url($url->expert);
            $this->front_temp->loadData("title", array("title" =>  $url->expert));
            $this->front_temp->loadData("activeLink", array("tours" => array("tours" => 1)));
            $this->front_temp->loadCont("front/expert_doctor.php", array("list" => $list, "left_menus" => $left_menus));
        }else{
            // 404 load here -------
            echo "404 not found! (URL)";
        }
    }



}
