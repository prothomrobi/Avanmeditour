<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tours_guides {
    
    public function __construct() {
        $CI = & get_instance();
        // get medical treatments menu -----------------------------------------
        $a = $CI->db->select("title")->get("tours_country");
        $this->tours_guides = $a->result();
    }
}

?>