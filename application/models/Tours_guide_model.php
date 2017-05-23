<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Tours_guide_model extends CI_Model {

// *************************** tours service section *****************************

    // *** add tours service ---------------------------------------------------
    public function add_tours_service($data) {
        $this->db->insert('tours_service', $data);
    }

    // *** get country name for service ----------------------------------------
    public function get_country_name_for_service(){
        $r = $this->db->select('title')->from('tours_country')->get();
        return  $list = $r->result();
    }
    // *** add tours place ---------------------------------------------------
    public function add_tours_place($data) {
        $this->db->insert('tours_place', $data);
    }
    // get tours place ------
    public function get_tours_place() {
        $r = $this->db->select('*')->from('tours_place')->get();
        return  $list = $r->result();
    }
    // *** replace image tours place -----------------------------------------
    public function replace_image_tours_place($data, $id) {
        $this->db->where("id", $id)->update("tours_place",$data);
    }
    // *** update tours PLACE ------------------------------------------------
    public function update_tours_place($data, $id) {
        $this->db->where("id", $id)->update("tours_place", $data);
    }
    // delete tours place
    public function tours_place_delete($id) {
        $this->db->where("id", $id)->delete("tours_place");
    }
    // *** get tours service ---------------------------------------------------
    public function get_tours_service() {
        $r = $this->db->select('*')->from('tours_service')->get();
        return  $list = $r->result();
    }

    // *** update tours service ------------------------------------------------
    public function update_tours_service($data, $id) {
        $this->db->where("id", $id)->update("tours_service", $data);
    }

    // *** replace image tours service -----------------------------------------
    public function replace_image_tours_service($data, $id) {
        $this->db->where("id", $id)->update("tours_service",$data);
    }


    // *** country delete ------------------------------------------------------
    public function get_tours_service_name($id){
        $r = $this->db->select('img')->from('tours_service')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function tours_service_delete($id) {
        $this->db->where("id", $id)->delete("tours_service");
    }





// *************************** add country  section *****************************

    // *** add country ---------------------------------------------------------
    public function add_country($data) {
        $this->db->insert('tours_country', $data);
    }

    // *** get_country ---------------------------------------------------------
    public function get_country() {
        $r = $this->db->select('*')->from('tours_country')->get();
        return  $list = $r->result();
    }

    // *** update country ------------------------------------------------------
    public function update_country($data, $id) {
        $this->db->where("id", $id)->update("tours_country", $data);
    }

    // *** replace country -----------------------------------------------------
    public function replace_image_country($data, $id) {
        $this->db->where("id", $id)->update("tours_country",$data);
    }
    // *** country delete ------------------------------------------------------
    public function get_country_name($id){
        $r = $this->db->select('img')->from('tours_country')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function country_delete($id) {
        $this->db->where("id", $id)->delete("tours_country");
    }


    // *** front end -----------------------------------------------------------
    public function get_tours_guide_url_by_request_url($url){
        $r = $this->db->select('url')->from('tours_country')->where('url', $url)->get();
        return $url = $r->row();
    }
    public function get_tours_package_url_by_request_url($url){
        $r = $this->db->select('*')->from('tours_place')->where('url', $url)->get();
        return $url = $r->row();
    }

    public function get_tours_guide_details_by_url($url){
        $r = $this->db->select('*')->from('tours_country')->where('url', $url)->get();
        return $url = $r->row();
    }
    public function get_tours_place_details_by_url($url){
      $r = $this->db->select('*')->from('tours_place')->where('country', $url)->get();
      return $url = $r->result();
    }

    public function get_single_tours_place_details_by_url($url){
      $r = $this->db->select('*')->from('tours_place')->where('url', $url)->get();
      return $url = $r->row();
    }

    public function get_front_tour_place($url, $per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('*')
                      ->from('tours_place')
                      ->where('country', $url)
                      ->order_by('id', 'desc')
                      ->limit($per_page, $uri_segment)
                      ->get();
        return $list = $r->result();
    }

    public function left_side_list(){
        $r = $this->db->select('title')->from('tours_country')->get();
        return $url = $r->result();
    }



}
