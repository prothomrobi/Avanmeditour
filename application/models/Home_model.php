<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Home_model extends CI_Model {
     
    // ############################# for slider ################################ 
    // *** add slider ----------------------------------------------------------
    public function add_slider($data) {
        $this->db->insert('front_slider', $data);
    }
    
    // *** get slider ---------------+------------------------------------------
    public function get_slider() {
        $r = $this->db->select('*')->from('front_slider')->get();
        return  $list = $r->result();
    }
    
    // *** replace image ---------------+---------------------------------------
    public function replace_image($data, $id) {
        $this->db->where("id", $id)->update("front_slider", $data);
    }
    
    // *** slider_delete ---------------+---------------------------------------
    public function get_name($id){
        $r = $this->db->select('img')->from('front_slider')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function slider_delete($id) {
        $this->db->where("id", $id)->delete("front_slider");
    }
    
    // ############################# for offer ################################
    
    // *** add offer -----------------------------------------------------------
    public function add_offer($data) {
        $this->db->insert('offer', $data);
    }
    
    // *** get offer ----------------------------------------------------------
    public function get_offer() {
        $r = $this->db->select('*')->from('offer')->get();
        return  $list = $r->result();
    }
    
    // *** update offer -------------------------------------------------------
    public function update_offer($data, $id) {
        $this->db->where("id", $id)->update("offer", $data);
    }
    
    // *** replace offer ------------------------------------------------------
    public function replace_offer_image($data, $id) {
        $this->db->where("id", $id)->update("offer",$data);
    }
    
    // *** offer delete -------------------------------------------------------
    public function get_offer_name($id){
        $r = $this->db->select('img')->from('offer')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function offer_delete($id) {
        $this->db->where("id", $id)->delete("offer");
    }
    
    
    // ############################ for subscriber ############################# 
    // *** add subs ------------------------------------------------------------
    public function add_subs($data) {
        $this->db->insert('subs', $data);
    }
    // *** get subs ------------------------------------------------------------
    public function get_subs() {
        $r = $this->db->select('*')->from('subs')->get();
        return  $list = $r->result();
    }
    // *** delete subs ---------------------------------------------------------
    public function delete_subs($id) {
        $this->db->where("id", $id)->delete("subs");
    }
    
    
    
    // ########################## for offer ####################################
    
    
    public function get_last_offer() {
        $r = $this->db->select('id, title, desc, img')->from('offer')->order_by('id, title, desc, img', 'desc')->limit(1)->get();
        return $r->row();
    }
    
    
    
}