<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class News_model extends CI_Model {
     
    // *** add news ------------------------------------------------------------
    public function add_news($data) {
        $this->db->insert('news', $data);
    }
    
    // *** get news ---------------+--------------------------------------------
    public function get_news() {
        $r = $this->db->select('*')->from('news')->get();
        return  $list = $r->result();
    }
    
    // *** update news ---------------+-----------------------------------------
    public function update_news($data, $id) {
        $this->db->where("id", $id)->update("news", $data);
    }
    
    // *** replace news ---------------+----------------------------------------
    public function replace_image($data, $id) {
        $this->db->where("id", $id)->update("news",$data);
    }
    // *** news delete ---------------+---------------------------------------
    public function get_name($id){
        $r = $this->db->select('img')->from('news')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function news_delete($id) {
        $this->db->where("id", $id)->delete("news");
    }
    
    // *** get front news ------------------------------------------------------
    public function get_front_news($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, title, desc, img, created')
                      ->from('news')
                      ->order_by('id, title, desc, img, created', 'desc')
                      ->limit($per_page, $uri_segment)
                      ->get();
        return $list = $r->result();
    }
    
    public function get_total_news() {
        $r = $this->db->select('id')->from('news')->get();
        return $result = count($r->result_array());
    }
 
    public function get_front_recent_news() {
        $r = $this->db->select('id, title, desc, img, created')
                      ->from('news')
                      ->order_by('id, title, desc, img, created', 'desc')
                      ->limit(3)
                      ->get();
        return $list = $r->result();
    }

    
    
}