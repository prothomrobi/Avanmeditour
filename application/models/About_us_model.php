<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class About_us_model extends CI_Model {
     
    // *** add medical treatments ----------------------------------------------
    public function add_about_us($data) {
        $this->db->insert('about_us', $data);
    }
    
    // *** get medical treatments ----------------------------------------------
    public function get_about_us() {
        $r = $this->db->select('*')->from('about_us')->get();
        return  $list = $r->result();
    }
    
    // *** update service ------------------------------------------------------
    public function update_about_us($data, $id) {
        $this->db->where("id", $id)->update("about_us",$data);
    }
    
    // *** replace image ---------------+---------------------------------------
    public function replace_about_us_image($data, $id) {
        $this->db->where("id", $id)->update("about_us",$data);
    }
    
    // *** delete medical treatments -------------------------------------------
    public function delete_about_us($id) {
        $this->db->where("id", $id)->delete("about_us");
    }
    
    
    
    // *** front end ------------------------------------------------------------
    public function get_about_us_url_by_request_url($url){
        $r = $this->db->select('url')->from('about_us')->where('url', $url)->get();
        return $url = $r->row();
    }
    
    public function get_about_us_details_by_url($url){
        $r = $this->db->select('*')->from('about_us')->where('url', $url)->get();
        return $url = $r->row();
    }
    
    // *** get all treatments --------------------------------------------------
    public function get_all_about_us() {
        $r = $this->db->select('id,title,url,img')->from('about_us')->get();
        return  $list = $r->result();
    }
 
    
}