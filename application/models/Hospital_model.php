<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_model extends CI_Model {


// *************************** add doctor section *****************************
    // *** add hospital --------------------------------------------------------
    public function add_doctor($data) {
        $this->db->insert('doctor', $data);
    }

    // *** get hospital --------------------------------------------------------
    public function get_doctor() {
        $r = $this->db->select('*')->from('doctor')->get();
        return  $list = $r->result();
    }

    // *** update hospital -----------------------------------------------------
    public function update_doctor($data, $id) {
        $this->db->where("id", $id)->update("doctor", $data);
    }

    // *** replace image hospital ------------------------------------------------------
    public function replace_image_doctor($data, $id) {
        $this->db->where("id", $id)->update("doctor",$data);
    }

    // *** hospital delete -----------------------------------------------------
    public function get_doctor_name($id){
        $r = $this->db->select('img')->from('doctor')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function doctor_delete($id) {
        $this->db->where("id", $id)->delete("doctor");
    }



// *************************** add hospital  section *****************************
    // *** add hospital --------------------------------------------------------
    public function add_hospital($data) {
        $this->db->insert('hospital', $data);
    }

    // *** get hospital --------------------------------------------------------
    public function get_hospital_country() {
        $r = $this->db->select('country')->from('hospital_country')->get();
        return  $list = $r->result();
    }

    // *** get hospital --------------------------------------------------------
    public function get_hospital() {
        $r = $this->db->select('*')->from('hospital')->get();
        return  $list = $r->result();
    }

    // *** update hospital -----------------------------------------------------
    public function update_hospital($data, $id) {
        $this->db->where("id", $id)->update("hospital", $data);
    }

    // *** replace image hospital ------------------------------------------------------
    public function replace_image_hospital($data, $id) {
        $this->db->where("id", $id)->update("hospital",$data);
    }


    // *** hospital delete -----------------------------------------------------
    public function get_hospital_name($id){
        $r = $this->db->select('img')->from('hospital')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function hospital_delete($id) {
        $this->db->where("id", $id)->delete("hospital");
    }




// *************************** add country section *****************************

    // *** add country ---------------------------------------------------------
    public function add_country($data) {
        $this->db->insert('hospital_country', $data);
    }

//    // *** get country ---------------------------------------------------------
    public function get_country() {
        $r = $this->db->select('*')->from('hospital_country')->get();
        return  $list = $r->result();
    }

    // *** update country ------------------------------------------------------
    public function update_country($data, $id) {
        $this->db->where("id", $id)->update("hospital_country", $data);
    }

    // *** country delete ------------------------------------------------------
    public function country_delete($id) {
        $this->db->where("id", $id)->delete("hospital_country");
    }



    // ############################# fortend ###################################


    public function get_domes_hosp() {
        $r = $this->db->select('*')->where('country', 'Bangladesh')->from('hospital')->get();
        return  $list = $r->result();
    }

    public function get_domes_doc() {
        $r = $this->db->select('*')->from('expert')->get();
        return  $list = $r->result();
    }






}
