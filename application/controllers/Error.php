<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {
    
    // *** (1) index -----------------------------------------------------------
    public function index() {
        if(!$this->user->loggedin){
            $this->client_template->loadData("title", array("title" => "404 Error"));
            $this->client_template->loadContent("client/error/hack.php");
        }else{
           $this->template->loadData("title", array("title" => "404 Error"));
            $this->template->loadData("activeLink", array("dashboard" => array("dashboard" => 1)));
            $this->template->loadContent("admin/error/error_404.php", array()); 
        }
    }
    
}