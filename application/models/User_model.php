<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class User_Model extends CI_Model {

    // *** check block ip ------------------------------------------------------
    public function check_block_ip() {
        $s = $this->db->where("IP", $_SERVER['REMOTE_ADDR'])->get("ip_black_list");
        if ($s->num_rows() == 0)
            return false;
        return true;
    }
    
    // *** get total user  -----------------------------------------------------
    public function get_total_user() {
        return $this->db->where('status', 1)->count_all_results('back_users');
    }
    
    // *** get user list -------------------------------------------------------
    public function get_user_list($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, username, first_name, last_name, email, phn, level')->where('status', 1)->from('back_users')->limit($per_page, $uri_segment)->get();
        $results = $r->result();
        return $results;
    }
    
    // *** user inactive ---------------------------------------------------------
    public function user_inactive($id) {
        return $this->db->where('id', $id)->set('status', '0')->update('back_users');
    }
    
    // *** get total inactive user  -----------------------------------------------------
    public function get_total_inactive_user() {
        return $this->db->where('status', 0)->count_all_results('back_users');
    }
    
    // *** get user list -------------------------------------------------------
    public function get_inactive_user_list($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, username, first_name, last_name, email, phn, level')->where('status', 0)->from('back_users')->limit($per_page, $uri_segment)->get();
        $results = $r->result();
        return $results;
    }
    
    // *** user active ---------------------------------------------------------
    public function user_active($id) {
        return $this->db->where('id', $id)->set('status', '1')->update('back_users');
    }

    // *** user delete ---------------------------------------------------------
    public function user_delete($id) {
        return $this->db->where("id", $id)->delete("back_users");
    }
    
    // *** add_new_user --------------------------------------------------------
    public function add_new_user($data) {
        $this->db->insert('users', $data);
    }

    // *** get user by id ------------------------------------------------------
    public function get_user_by_id($id) {
        return $this->db->select('id, username, level, status, first_name, last_name, phn, email, address, avatar, joined_date, online_timestamp')->where("id", $id)->get("back_users");
    }

    // *** update info ---------------------------------------------------------
    public function update_info($id, $data) {
        $this->db->where('id', $id)->update('back_users', $data);
    }

    // *** update pass ---------------------------------------------------------
    public function update_pass($id, $password) {
        $this->db->where('id', $id)->set('password', $password)->update('back_users');
    }
    
    // check user name form database -------------------------------------------
    public function check_username_is_free($username) {
        $s = $this->db->where("username", $username)->get("back_users");
        if ($s->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
}