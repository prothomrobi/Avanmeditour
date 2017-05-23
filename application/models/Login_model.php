<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Login_Model extends CI_Model {
    // *** get user by email ---------------------------------------------------
    public function get_user_by_email($email) {
        return $this->db->select("id,password,token")->where("email", $email)->get("back_users");
    }
    // *** update user token ---------------------------------------------------
    public function update_user_token($id, $token) {
        $this->db->where("id", $id)->update("back_users", array("token" => $token));
    }
    // *** get user by id ------------------------------------------------------
    public function get_user_by_id($id) {
        return $this->db->select("password")->where("id", $id)->get("back_users");
    }
}
