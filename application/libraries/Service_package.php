<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service_package {
    
    public function __construct() {
        $CI = & get_instance();
        // get service packages menu -------------------------------------------
        $a = $CI->db->select("title, id")->get("service_package");
        $this->service_package = $a->result();
	}
}

?>