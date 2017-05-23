<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About_us {
    
    public function __construct() {
        $CI = & get_instance();
        // get medical treatments menu -----------------------------------------
        $a = $CI->db->select("title")->get("about_us");
        $this->about_us = $a->result();
    }
}

?>