<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Doctor_model extends CI_Model {

// *************************** tours service section *****************************







// *************************** add country  section *****************************


    // *** get_country ---------------------------------------------------------
    public function get_expert() {
        $r = $this->db->select('*')->from('doctor')->get();
        return  $list = $r->result();
    }
    public function add_expert($data) {
        $this->db->insert('expert', $data);
    }
    public function update_expert($data, $id){
        $this->db->where("id", $id)->update("expert", $data);
    }
    // *** replace expert -----------------------------------------------------
    public function replace_image_expert($data, $id) {
        $this->db->where("id", $id)->update("expert",$data);
    }
    // *** expert delete ------------------------------------------------------
    public function get_expert_name($id){
        $r = $this->db->select('img')->from('expert')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function expert_delete($id) {
        $this->db->where("id", $id)->delete("expert");
    }
    public function get_expert_all(){
      $r = $this->db->select('*')->from('expert')->get();
      return  $list = $r->result();
    }

    // *** front end -----------------------------------------------------------
    public function get_doctor_expert_by_request_url($url){
        $r = $this->db->select('expert')->from('doctor')->where('expert', $url)->get();
        return $url = $r->row();
    }

    public function get_all_doctors_details_by_url($url){
        $r = $this->db->select('*')->from('doctor')->where('expert', $url)->get();
        return $url = $r->result();
    }
    public function get_all_doctors_details_by_domestic_url($url){
      $r = $this->db->select('*')->from('doctor')->where('expert', $url)->where('country', 'Bangladesh')->get();
      return $url = $r->result();
    }
    public function get_all_doctors_details_by_international_url($url){
      $r = $this->db->select('*')->from('doctor')->where('expert', $url)->where('country !=', 'Bangladesh')->get();
      return $url = $r->result();
    }

    public function left_side_list(){
        $r = $this->db->select('expert')->from('doctor')->get();
        return $url = $r->result();
    }



}
