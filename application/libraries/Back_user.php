<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Back_user {
    
    // properties --------------------------------------------------------------
    var $info = array();
    var $loggedin = false;
    var $u = null;
    var $p = null;
    
    // -------------------------------------------------------------------------
    public function __construct() {
        // properties ----------------------------------------------------------
        $CI = & get_instance();
        $config = $CI->config->item("cookieprefix");
        $this->u = $CI->input->cookie($config . "un", TRUE);
        $this->p = $CI->input->cookie($config . "tkn", TRUE);
        $user = null;

        // ---------------------------------------------------------------------
        if ($this->u && $this->p) {
            $user = $CI->db->select("id, email, level, status, first_name, last_name, avatar, online_timestamp")
                    ->where("email", $this->u)->where("token", $this->p)
                    ->get("back_users");
        }
        if ($user !== null) {
            if ($user->num_rows() == 0) {
                $this->loggedin = false;
            } else {
                $this->loggedin = true;
                $this->info = $user->row();
                //  update timestamp -------------------------------------------
                if ($this->info->online_timestamp < time() - 60 * 5) {
                    $this->update_online_timestamp($this->info->id);
                }
                // if inactive -------------------------------------------------
                if ($this->info->level == -1) {
                    $CI->load->helper("cookie");
                    $this->loggedin = false;
                    $CI->session->set_flashdata("msg", lang("error_6"));
                    //$this->session->set_flashdata("globalmsg", lang("error_3"));
                    delete_cookie($config . "un");
                    delete_cookie($config . "tkn");
                    redirect(site_url("login/inactive"));
                }
            }
        }
    }
    // -------------------------------------------------------------------------
    public function getPassword() {
        $CI = & get_instance();
        $user = $CI->db->select("password")->where("id", $this->info->id)->get("back_users");
        $user = $user->row();
        return $user->password;
    }
    // -------------------------------------------------------------------------
    public function update_online_timestamp($userid) {
        $CI = & get_instance();
        $CI->db->where("id", $userid)->update("back_users", array("online_timestamp" => time()));
    }

}

?>