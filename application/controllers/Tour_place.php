<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tour_place extends CI_Controller {
  public function __construct() {
      parent::__construct();
      $this->load->model("tours_guide_model");
  }
    // *** index ---------------------------------------------------------------
    public function index() {
        $left_menus = $this->tours_guide_model->left_side_list();
        $this->front_temp->loadData("title", array("title" => "Tour Place"));
        $this->front_temp->loadData("activeLink", array("home" => array("home" => 1)));
        $this->front_temp->loadCont("front/tour_place.php", array("left_menus" => $left_menus));
    }
    public function country($url) {
        // is url empty?
        if (empty($url))
            redirect (site_url());
        // check is it exist url?
        $url = $this->tours_guide_model->get_tours_guide_url_by_request_url($url);
        if(!empty($url)){
        $left_menus = $this->tours_guide_model->left_side_list();
        $places = $this->tours_guide_model->get_tours_place_details_by_url($url->url);
        $this->load->library('pagination');
        $config['base_url'] = base_url().'tour_place/country/'.$url->url;
        $config['total_rows'] = count($places);
        $config['per_page'] = 2;
        include (APPPATH . "/config/front_pegi.php");
        $this->pagination->initialize($config);

        $lists = $this->tours_guide_model->get_front_tour_place($url->url ,$config['per_page'],  $this->uri->segment(4));
        $this->front_temp->loadData("title", array("title" => "Tour Place"));
        $this->front_temp->loadData("activeLink", array("tours" => array("tours" => 1)));
        $this->front_temp->loadCont("front/tour_place.php", array("lists" => $lists, "places" => $places, "left_menus" => $left_menus));
      } else{
        // 404 load here -------
        echo "404 not found! (URL)";
      }
  }

  public function package($url){
    if (empty($url))
        redirect (site_url());
    // check is it exist url?
    $url = $this->tours_guide_model->get_tours_package_url_by_request_url($url);

    if(!empty($url)){
    $left_menus = $this->tours_guide_model->left_side_list();
    $places = $this->tours_guide_model->get_tours_place_details_by_url($url->country);
    $list = $this->tours_guide_model->get_single_tours_place_details_by_url($url->url);
    $this->front_temp->loadData("title", array("title" => "Tour Place"));
    $this->front_temp->loadData("activeLink", array("tours" => array("tours" => 1)));
    $this->front_temp->loadCont("front/tour_package.php", array("list" => $list, "places" => $places, "left_menus" => $left_menus));
  } else{
    // 404 load here -------
    echo "404 not found! (URL)";
  }
  }
}
