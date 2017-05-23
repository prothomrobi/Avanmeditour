<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Blog_model extends CI_Model {

    // *** add blog ------------------------------------------------------------
    public function add_blog($data) {
        $this->db->insert('front_blog', $data);
    }

    // *** get blog ---------------+--------------------------------------------
    public function get_blog() {
        $r = $this->db->select('*')->from('front_blog')->get();
        return  $list = $r->result();
    }

    // *** update blog ---------------+-----------------------------------------
    public function update_blog($data, $id) {
        $this->db->where("id", $id)->update("front_blog", $data);
    }

    // *** replace blog ---------------+----------------------------------------
    public function replace_image($data, $id) {
        $this->db->where("id", $id)->update("front_blog",$data);
    }
    // *** blog delete ---------------+---------------------------------------
    public function get_name($id){
        $r = $this->db->select('img')->from('front_blog')->where('id', $id)->get();
        return $name = $r->row();
    }
    public function blog_delete($id) {
        $this->db->where("id", $id)->delete("front_blog");
    }

    // *** get front blog ------------------------------------------------------
    public function get_front_blog($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, title, desc, img, created')
                      ->from('front_blog')
                      ->order_by('id, title, desc, img, created', 'desc')
                      ->limit($per_page, $uri_segment)
                      ->get();
        return $list = $r->result();
    }

    public function get_total_blog() {
        $r = $this->db->select('id')->from('front_blog')->get();
        return $result = count($r->result_array());
    }

    public function get_front_recent_blog() {
        $r = $this->db->select('id, title, desc, img, created')
                      ->from('front_blog')
                      ->order_by('id, title, desc, img, created', 'desc')
                      ->limit(3)
                      ->get();
        return $list = $r->result();
    }



}
