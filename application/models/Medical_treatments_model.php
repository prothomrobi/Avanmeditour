<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Medical_treatments_model extends CI_Model {
     
    // *** add medical treatments ----------------------------------------------
    public function add_medical_treatments($data) {
        $this->db->insert('medical_treatments', $data);
    }
    
    // *** get medical treatments ----------------------------------------------
    public function get_medical_treatments() {
        $r = $this->db->select('*')->from('medical_treatments')->get();
        return  $list = $r->result();
    }

    // *** get medical treatments details by id --------------------------------
    public function get_medical_treatments_details_by_id($id) {
        $r = $this->db->select('*')->from('medical_treatments')->where('id', $id)->get();
        return $url = $r->row();
    }
    
    // *** update service ------------------------------------------------------
    public function update_medical_treatment($data, $id) {
        $this->db->where("id", $id)->update("medical_treatments",$data);
    }
    
    // *** replace image ---------------+---------------------------------------
    public function replace_medical_treatment_image($data, $id) {
        $this->db->where("id", $id)->update("medical_treatments",$data);
    }
    
    // *** delete medical treatments -------------------------------------------
    public function delete_medical_treatments($id) {
        $this->db->where("id", $id)->delete("medical_treatments");
    }
    
    
    
    // *** front end ------------------------------------------------------------
    public function get_medical_treatments_url_by_request_url($url){
        $r = $this->db->select('url')->from('medical_treatments')->where('url', $url)->get();
        return $url = $r->row();
    }
    
    public function get_medical_treatments_details_by_url($url){
        $r = $this->db->select('*')->from('medical_treatments')->where('url', $url)->get();
        return $url = $r->row();
    }
    
    // *** get all treatments --------------------------------------------------
    public function get_all_treatments() {
        $r = $this->db->select('id,title,url,img')->from('medical_treatments')->get();
        return  $list = $r->result();
    }
 
    
}