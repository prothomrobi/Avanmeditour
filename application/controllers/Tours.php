<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tours extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("tours_guide_model");
    }

    // *** guide --------------------------------------------------------------
    public function guide($url) {
        // is url empty?
        if (empty($url))
            redirect (site_url());
        // check is it exist url?
        $url = $this->tours_guide_model->get_tours_guide_url_by_request_url($url);

        if(!empty($url)){
            $left_menus = $this->tours_guide_model->left_side_list();
            $list = $this->tours_guide_model->get_tours_guide_details_by_url($url->url);
            $this->front_temp->loadData("title", array("title" => $list->title));

            $this->front_temp->loadData("activeLink", array("tours" => array("tours" => 1)));
            $this->front_temp->loadCont("front/tours_guide.php", array("list" => $list, "left_menus" => $left_menus));
        }else{
            // 404 load here -------
            echo "404 not found! (URL)";
        }
    }



}
