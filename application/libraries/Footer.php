<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Footer {
    // get footer blog ---------------------------------------------------------
    public function __construct() {
        // for footer blog -----------------------------------------------------
        $CI = & get_instance();
        $r = $CI->db->select('id, title, desc, img, created')
                    ->from('front_blog')
                    ->order_by('id, title, desc, img, created', 'desc')
                    ->limit(2)
                    ->get();
        $this->footer = $r->result();
    }
}

?>