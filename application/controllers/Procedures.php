<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Procedures extends CI_Controller {
    
    // index -------------------------------------------------------------------
    public function index() {
        $this->front_temp->loadData("title", array("title" => "Procedures"));
        $this->front_temp->loadData("activeLink", array("procedures" => array("procedures" => 1)));
        $this->front_temp->loadCont("front/procedures.php");
        
    }
    

}