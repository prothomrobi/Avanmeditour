<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("user_model");
        if ($this->back_user->loggedin) {
            redirect(site_url('admin_panel'));
        }
    }

    // *** index ---------------------------------------------------------------
    public function index() {
        $this->back_temp->loadData("title", array("title" => "Login"));
        $this->back_temp->set_layout("layout/login_layout.php");
        $this->back_temp->loadCont("back/login/login.php");
    }

    // *** login check ---------------------------------------------------------
    public function logincheck() {
        $this->back_temp->set_error_view("back/login/login_error.php");
        $this->back_temp->set_layout("layout/login_layout.php");
        // check ip block
        if ($this->user_model->check_block_ip()) {
            $this->back_temp->error(lang("error_1"));
        }
        // retrive logged info from cookie 
        $config = $this->config->item("cookieprefix");
        if ($this->back_user->loggedin) {
            $this->back_temp->error(lang("error_2"));
        }
        // user, pass, remember input from post
        $email = $this->input->post("email", true);
        $pass = $this->common->nohtml($this->input->post("pass", true));
        $rem = $this->input->post("rem", true);
        // check email and pass blank
        if (empty($email) || empty($pass)) {
            $this->back_temp->error(lang("error_3"));
        }
        // email matching from db
        $login = $this->login_model->get_user_by_email($email);
        if ($login->num_rows() == 0) {
            $this->back_temp->error(lang("error_4"));
        }
        // user info load 
        $r = $login->row();
        $id = $r->id;
        //pass hashing kora
        $phpass = new PasswordHash(12, false);
        if (!$phpass->CheckPassword($pass, $r->password)) {
            $this->back_temp->error(lang("error_4"));
        }
        // generate a token and update it
        $token = rand(1, 100000) . $email;
        $token = md5(sha1($token));
        $this->login_model->update_user_token($id, $token);
        // if remenber create cookies
        if ($rem == 1) {
            $ttl = 3600 * 12;
        } else {
            $ttl = 3600 * 12;
        }
        setcookie($config . "un", $email, time() + $ttl, "/");
        setcookie($config . "tkn", $token, time() + $ttl, "/");
        redirect(site_url('admin_panel'));
    }
    
    // *** inactive ------------------------------------------------------------
    public function inactive() {
        $this->back_temp->set_layout("layout/login_layout.php");
        $this->back_temp->loadCont("back/login/inactive.php");
    }

}