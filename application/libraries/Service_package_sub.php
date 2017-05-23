<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service_package_sub {
    
    public function __construct() {
        $CI = & get_instance();
        // get service packages sub menu ---------------------------------------
        $a = $CI->db->select("title, sub_id")->get("service_package_sub");
        $this->service_package_sub = $a->result();
	}
}

?>