<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Article_model extends CI_Model {
     
    // *** add article ------------------------------------------------------------
    public function add_article($data) {
        $this->db->insert('front_article', $data);
    }
    
    // *** get article ---------------+--------------------------------------------
    public function get_article() {
        $r = $this->db->select('*')->from('front_article')->get();
        return  $list = $r->result();
    }
    
    // *** update article ---------------+-----------------------------------------
    public function update_article($data, $id) {
        $this->db->where("id", $id)->update("front_article", $data);
    }
    // *** replace article ---------------+----------------------------------------
    public function replace_image($data, $id) {
        $this->db->where("id", $id)->update("front_article",$data);
    }
    // *** article delete ---------------+---------------------------------------
    public function get_name($id){
        $r = $this->db->select('img')->from('front_article')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function article_delete($id) {
        $this->db->where("id", $id)->delete("front_article");
    }
    
    // *** get front article ------------------------------------------------------
    public function get_front_article($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, title, desc, img, created')
                      ->from('front_article')
                      ->order_by('id, title, desc, img, created', 'desc')
                      ->limit($per_page, $uri_segment)
                      ->get();
        return $list = $r->result();
    }
    public function get_total_article() {
        $r = $this->db->select('id')->from('front_article')->get();
        return $result = count($r->result_array());
    }
    public function get_front_recent_article() {
        $r = $this->db->select('id, title, desc, img, created')
                      ->from('front_article')
                      ->order_by('id, title, desc, img, created', 'desc')
                      ->limit(3)
                      ->get();
        return $list = $r->result();
    }

    
    
}