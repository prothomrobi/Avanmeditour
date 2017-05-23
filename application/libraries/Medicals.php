<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medicals {
    
    public function __construct() {
        $CI = & get_instance();
        // get medical treatments menu -----------------------------------------
        $a = $CI->db->select("title")->get("medical_treatments");
        $this->medicals = $a->result();
    }
}

?>