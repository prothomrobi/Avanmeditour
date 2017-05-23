<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Patient_guide_model extends CI_Model {
     
    // *** add patient guide ---------------------------------------------------
    public function add_patient_guide($data) {
        $this->db->insert('patient_guide', $data);
    }
    
    // *** get patient guide ---------------------------------------------------
    public function get_patient_guide() {
        $r = $this->db->select('*')->from('patient_guide')->get();
        return  $list = $r->result();
    }
    
    // *** update patient guide ------------------------------------------------
    public function update_patient_guide($data, $id) {
        $this->db->where("id", $id)->update("patient_guide",$data);
    }
    
    // *** delete patient guide ------------------------------------------------
    public function delete_patient_guide($id) {
        $this->db->where("id", $id)->delete("patient_guide");
    }
    
    

    // *** front end -----------------------------------------------------------
    public function get_patient_guide_url_by_request_url($url){
        $r = $this->db->select('url')->from('patient_guide')->where('url', $url)->get();
        return $url = $r->row();
    }
    
    public function get_patient_guide_details_by_url($url){
        $r = $this->db->select('*')->from('patient_guide')->where('url', $url)->get();
        return $url = $r->row();
    }
    

    
}