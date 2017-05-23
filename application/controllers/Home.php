<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("home_model");
        $this->load->model("medical_treatments_model");
        $this->load->model("hospital_model");
    }

    // index -------------------------------------------------------------------
    public function index() {
        $this->front_temp->loadData("title", array("title" => "Avan"));
        $this->front_temp->loadData("activeLink", array("home" => array("home" => 1)));
        $sliders = $this->home_model->get_slider();
        $treats = $this->medical_treatments_model->get_all_treatments();

        //$int_hosps = $this->hospital_model->get_int_hosp();
        $domes_hosps = $this->hospital_model->get_domes_hosp();
        

        //$int_docs = $this->hospital_model->get_int_doc();
        $domes_docs = $this->hospital_model->get_domes_doc();

        $offer = $this->home_model->get_last_offer();

        $this->front_temp->loadCont("front/home.php", array(
            "sliders" => $sliders,
            "treats" => $treats,
            "domes_hosps" => $domes_hosps,
            "domes_docs" => $domes_docs,
            "offer" => $offer,
            )
        );

    }

    // query -------------------------------------------------------------------
    public function query() {
        if($_POST){
            $data = array();
            $data['name'] = $this->common->nohtml($this->input->post("name", true));
            $data['email'] = $this->common->nohtml($this->input->post("email", true));
            $data['phn'] = $this->common->nohtml($this->input->post("phn", true));
            $data['msg'] = $this->common->nohtml($this->input->post("msg", true));


//            $this->home_model->add_subs($data);
//            $this->session->set_flashdata("subs_msg", lang("sucess_4"));
//            redirect(site_url());


        }else{
            redirect(site_url());
        }
    }

    // subscriber --------------------------------------------------------------
    public function subs() {
        if($_POST){
            $data = array();
            $data['email'] = $this->common->nohtml($this->input->post("email", true));
            $this->home_model->add_subs($data);
            $this->session->set_flashdata("subs_msg", lang("sucess_4"));
            redirect(site_url());
        }else{
            redirect(site_url());
        }
    }

}
