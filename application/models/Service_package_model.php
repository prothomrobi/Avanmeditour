<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Service_package_model extends CI_Model {
     
    // *** add medical treatments ----------------------------------------------
    public function add_service_package($data) {
        $this->db->insert('service_package', $data);
    }

    // *** get medical treatments ----------------------------------------------
    public function get_service_package() {
        $r = $this->db->select('*')->from('service_package')->get();
        return  $list = $r->result();
    }

    // *** update service ------------------------------------------------------
    public function update_service_package($data, $id) {
        $this->db->where("id", $id)->update("service_package",$data);
    }
    
    // *** replace image ---------------+---------------------------------------
    public function replace_service_package_image($data, $id) {
        $this->db->where("id", $id)->update("service_package",$data);
    }
    
    // *** delete medical treatments -------------------------------------------
    public function delete_service_package($id) {
        $this->db->where("id", $id)->delete("service_package");
    }
    
    
    // *** front end -----------------------------------------------------------
    public function get_service_package_details_by_url($url){
        $r = $this->db->select('*')->from('service_package')->where('url', $url)->get();
        return $url = $r->row();
    }
    
    // ============ for sub menu ===============================================
    
    // *** add medical treatments ----------------------------------------------
    public function add_service_package_sub($data) {
        $this->db->insert('service_package_sub', $data);
    }
    
    // *** get medical treatments ----------------------------------------------
    public function get_service_package_sub() {
        $r = $this->db->select('*')->from('service_package_sub')->get();
        return  $list = $r->result();
    }

    // *** update service ------------------------------------------------------
    public function update_service_package_sub($data, $id) {
        $this->db->where("id", $id)->update("service_package_sub",$data);
    }
    
    // *** replace image ---------------+---------------------------------------
    public function replace_service_package_image_sub($data, $id) {
        $this->db->where("id", $id)->update("service_package_sub",$data);
    }
    
    // *** delete medical treatments -------------------------------------------
    public function delete_service_package_sub($id) {
        $this->db->where("id", $id)->delete("service_package_sub");
    }
 
    // *** front end -----------------------------------------------------------
    public function get_service_package_sub_details_by_url($url){
        $r = $this->db->select('*')->from('service_package_sub')->where('url', $url)->get();
        return $url = $r->row();
    }
    
}