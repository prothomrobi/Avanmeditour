<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends CI_Controller {

    // *** index ---------------------------------------------------------------
    public function index() {
        $this->front_temp->loadData("title", array("title" => "Contact Us"));
        $this->front_temp->loadData("activeLink", array("contact_us" => array("contact_us" => 1)));
        $this->front_temp->loadCont("front/contact_us.php");
    }

    // *** contact -------------------------------------------------------------
    public function contact() {
        if ($_POST) {
            $rules = $this->valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("con_err_msg", lang("error_9"));
                redirect(site_url('contact_us'));
            } else {
                // recv post data ----------------------------------------------
                $info = array();
                $info['name'] = $this->common->nohtml($this->input->post("name", true));
                $info['email'] = $this->common->nohtml($this->input->post("email", true));
                $info['subject'] = $this->common->nohtml($this->input->post("subject", true));
                $info['message'] = $this->common->nohtml($this->input->post("message", true));
                // rendering amil body -----------------------------------------
                $email_body = $this->load->view('front/contact_email_body.php', $info, TRUE);
                // email sending ------------------------------------------------
                $this->load->library('email');
                $this->email->set_mailtype('html');
                $this->email->set_newline("\r\n");
                $this->email->from('contact@avanmeditour.com', 'avanmeditour.com');
                $this->email->to('ruman320@gmail.com');
                $this->email->subject('Someone want to contact');
                $this->email->message($email_body);
                if ($this->email->send()) {
                    // redirecting with succsss message ----------------
                    $this->session->set_flashdata("contact_msg", lang("sucess_6"));
                    redirect(site_url('contact_us'));
                } else {
                    // redirecting with error message ----------------
                    $this->session->set_flashdata("con_err_msg", $this->email->print_debugger());
                    redirect(site_url('contact_us'));
                }
            }
        } else {
            redirect(site_url('contact_us'));
        }
    }

    // *** contact validation --------------------------------------------------
    protected function valid() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => $this->lang->line("name"),
                'rules' => 'trim|required|xss_clean|max_length[256]'
            ),
            array(
                'field' => 'email',
                'label' => $this->lang->line("email"),
                'rules' => 'trim|required|xss_clean|max_length[256]|valid_email'
            ),
            array(
                'field' => 'subject',
                'label' => $this->lang->line("subject"),
                'rules' => 'trim|required|xss_clean|max_length[256]'
            ),
            array(
                'field' => 'message',
                'label' => $this->lang->line("message"),
                'rules' => 'trim|required|xss_clean|max_length[5000]'
            )
        );
        return $rules;
    }

}
