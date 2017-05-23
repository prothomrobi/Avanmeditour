<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Events_model extends CI_Model {
     
    // *** add events -----------------------------------------------------------
    public function add_events($data) {
        $this->db->insert('events', $data);
    }
    
    // *** get events ----------------------------------------------------------
    public function get_events() {
        $r = $this->db->select('*')->from('events')->get();
        return  $list = $r->result();
    }
    
    // *** update events -------------------------------------------------------
    public function update_events($data, $id) {
        $this->db->where("id", $id)->update("events", $data);
    }
    
    // *** replace events ------------------------------------------------------
    public function replace_image($data, $id) {
        $this->db->where("id", $id)->update("events",$data);
    }
    // *** events delete -------------------------------------------------------
    public function get_name($id){
        $r = $this->db->select('img')->from('events')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function events_delete($id) {
        $this->db->where("id", $id)->delete("events");
    }
    
    // *** get front events ----------------------------------------------------
    public function get_front_events($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, title, desc, img, created')
                      ->from('events')
                      ->order_by('id, title, desc, img, created', 'desc')
                      ->limit($per_page, $uri_segment)
                      ->get();
        return $list = $r->result();
    }
    
    public function get_total_events() {
        $r = $this->db->select('id')->from('events')->get();
        return $result = count($r->result_array());
    }
 
    public function get_front_recent_events() {
        $r = $this->db->select('id, title, desc, img, created')
                      ->from('events')
                      ->order_by('id, title, desc, img, created', 'desc')
                      ->limit(3)
                      ->get();
        return $list = $r->result();
    }

    
    
}