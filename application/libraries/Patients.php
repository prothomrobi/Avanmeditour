<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patients {
    
    public function __construct() {
        $CI = & get_instance();
        // get medical treatments menu -----------------------------------------
        $a = $CI->db->select("title")->get("patient_guide");
        $this->patients = $a->result();
    }
}

?>