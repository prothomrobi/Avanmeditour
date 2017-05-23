<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Hospital_details_model extends CI_Model {

// *************************** tours service section *****************************







// *************************** add country  section *****************************


    // *** get_country ---------------------------------------------------------
    public function get_country() {
        $r = $this->db->select('*')->from('hospital_country')->get();
        return  $list = $r->result();
    }


    // *** front end -----------------------------------------------------------
    public function get_hospital_country_by_request_url($url){
        $url = ucwords($url);
        $r = $this->db->select('country')->from('hospital')->where('country', $url)->get();
        return $url = $r->row();
    }

    public function get_all_hospitals_details_by_url($url){
        $r = $this->db->select('*')->from('hospital')->where('country', $url)->get();
        return $url = $r->result();
    }

    public function left_side_list(){
        $r = $this->db->select('country')->from('hospital_country')->get();
        return $url = $r->result();
    }



}
