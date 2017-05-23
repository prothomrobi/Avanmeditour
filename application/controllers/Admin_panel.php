<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("home_model");
        $this->load->model("about_us_model");
        $this->load->model("hospital_model");
        $this->load->model("medical_treatments_model");
        $this->load->model("patient_guide_model");
        $this->load->model("tours_guide_model");
        $this->load->model("service_package_model");
        $this->load->model("article_model");
        $this->load->model("blog_model");
        $this->load->model("news_model");
        $this->load->model("events_model");
        $this->load->model("doctor_model");
        if (!$this->back_user->loggedin) {
            redirect(site_url("login"));
        }
    }

    // *** index for dashboard -------------------------------------------------
    public function index() {
        redirect(site_url('admin_panel/slider'));
    }

    // ##############################################################################################
    //  Home section
    // ##############################################################################################

    // *** slider --------------------------------------------------------------
    public function slider() {
        $this->back_temp->loadData("title", array("title" => "Slider"));
        $this->back_temp->loadData("activeLink", array("home" => array("slider" => 1)));
        if($_POST){
            $avatar = $this->common->nohtml($this->input->post("name", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $avatar);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/slider/';
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']       = FALSE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '5120';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/slider/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->home_model->add_slider($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/slider'));
                    }
                }
            }
        }else{
            $lists = $this->home_model->get_slider();
            $this->back_temp->loadCont("back/home/slider.php", array("lists" => $lists));
        }
    }


    // *** replace slider image ------------------------------------------------
    public function replace_image() {
        if ($_POST) {
            $img = $this->common->nohtml($this->input->post("img", true));

            // get file name & delete ------------------------------------------
            unlink(FCPATH.'/uploads/front/slider/' . $img);
            unlink(FCPATH.'/uploads/front/slider/thumb/' . $img);

            // name process ----------------------------------------------------
            $divide = explode('.', $img);
            $avatar = current($divide);

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/slider/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '5120';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/slider/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->home_model->replace_image($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/slider'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/slider'));
        }
    }

    // *** slider_Delete -------------------------------------------------------
    public function slider_delete() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->input->post("img", true);

            // delete from dir -------------------------------------------------
            unlink(FCPATH.'/uploads/front/slider/' . $img);
            unlink(FCPATH.'/uploads/front/slider/thumb/' . $img);

            $this->home_model->slider_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/slider'));
        } else {
            redirect(site_url('admin_panel/slider'));
        }
    }

// ********************************* add hospital ***********************************
    // *** add hospital --------------------------------------------------------
    public function add_hospital() {
        $this->back_temp->loadData("title", array("title" => "Events"));
        $this->back_temp->loadData("activeLink", array("home" => array("add_hospital" => 1)));
        if($_POST){
           // recv post data ---------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['country'] = $this->common->nohtml($this->input->post("country", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{

                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/hospital/';
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']       = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/hospital/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        $this->hospital_model->add_hospital($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_hospital'));
                    }
                }
            }
        }else{
            $names = $this->hospital_model->get_hospital_country();
            $lists = $this->hospital_model->get_hospital();
            $this->back_temp->loadCont("back/home/hospital.php", array("lists" => $lists, "names" => $names));
        }
    }

    // *** update hospital -----------------------------------------------------
    public function update_hospital() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['country'] = $this->common->nohtml($this->input->post("country", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            // renaming --------------------------------------------------------
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $first_part = str_replace(' ', '_', $form['title']);
            $first_part = strtolower($first_part);
            $form['img'] = $first_part.'.'.$ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/hospital/" . $old_img, "./uploads/front/hospital/" . $form['img']);
            rename("./uploads/front/hospital/thumb/" . $old_img, "./uploads/front/hospital/thumb/" . $form['img']);

            $this->hospital_model->update_hospital($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/add_hospital'));
        } else {
            redirect(site_url('admin_panel/add_hospital'));
        }
    }

    // *** update hospital image -----------------------------------------------
    public function replace_image_hospital() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // get file name & delete ------------------------------------------
            unlink(FCPATH.'/uploads/front/hospital/' . $img);
            unlink(FCPATH.'/uploads/front/hospital/thumb/' . $img);

            // name process ----------------------------------------------------
            $divide = explode('.', $img);
            $avatar = current($divide);

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/hospital/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/hospital/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->hospital_model->replace_image_hospital($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_3"));
                        redirect(site_url('admin_panel/add_hospital'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/add_hospital'));
        }
    }

    // *** hospital Delete -----------------------------------------------------
    public function delete_hospital() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // file delete------------------------------------------------------
            unlink(FCPATH.'/uploads/front/hospital/' . $img);
            unlink(FCPATH.'/uploads/front/hospital/thumb/' . $img);

            $this->hospital_model->hospital_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/add_hospital'));
        } else {
            redirect(site_url('admin_panel/add_hospital'));
        }
    }


// ********************************** add_hos_country ********************************
    // *** add hos country -----------------------------------------------------
    public function add_hos_country() {
        $this->back_temp->loadData("title", array("title" => "Add Country"));
        $this->back_temp->loadData("activeLink", array("home" => array("add_hos_country" => 1)));
        if($_POST){
           // recv post data ---------------------------------------------------
            $form = array();
            $form['country'] = $this->common->nohtml($this->input->post("country", true));
            $this->hospital_model->add_country($form);
            $this->session->set_flashdata("globalmsg", lang("sucess_1"));
            redirect(site_url('admin_panel/add_hos_country'));
        }else{
            $lists = $this->hospital_model->get_country();
            $this->back_temp->loadCont("back/home/add_hos_country.php", array("lists" => $lists));
        }
    }

    // *** update country ------------------------------------------------------
    public function update_hos_country() {
        if ($_POST) {
            $form = array();
            $form['country'] = $this->common->nohtml($this->input->post("country", true));
            $id = $this->common->nohtml($this->input->post("id", true));
            $this->hospital_model->update_country($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/add_hos_country'));
        } else {
            redirect(site_url('admin_panel/add_hos_country'));
        }
    }

    // *** country Delete ---------------------------------------------------------
    public function delete_hos_country() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $this->hospital_model->country_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/add_hos_country'));
        } else {
            redirect(site_url('admin_panel/add_hos_country'));
        }
    }

    // ********************************* add doctor ***********************************
    // *** add doctor ----------------------------------------------------------
    public function add_doctor() {
        $this->back_temp->loadData("title", array("title" => "Add Doctor"));
        $this->back_temp->loadData("activeLink", array("home" => array("add_doctor" => 1)));
        if($_POST){

            // recv post data ---------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['expert'] = $this->common->nohtml($this->input->post("expert", true));
            $form['country'] = $this->common->nohtml($this->input->post("country", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/doctor/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/doctor/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        $this->hospital_model->add_doctor($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_doctor'));
                    }
                }
            }
        }else{
            $experts = $this->doctor_model->get_expert_all();
            $names = $this->hospital_model->get_hospital_country();
            $lists = $this->hospital_model->get_doctor();
            $this->back_temp->loadCont("back/home/doctor.php", array("lists" => $lists, "names" => $names, "experts" => $experts));
        }
    }

    // *** update hospital -----------------------------------------------------
    public function update_doctor() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['expert'] = $this->common->nohtml($this->input->post("expert", true));
            $form['country'] = $this->common->nohtml($this->input->post("country", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            // renaming --------------------------------------------------------
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $first_part = str_replace(' ', '_', $form['title']);
            $first_part = strtolower($first_part);
            $form['img'] = $first_part.'.'.$ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/doctor/" . $old_img, "./uploads/front/doctor/" . $form['img']);
            rename("./uploads/front/doctor/thumb/" . $old_img, "./uploads/front/doctor/thumb/" . $form['img']);

            $this->hospital_model->update_doctor($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/add_doctor'));
        } else {
            redirect(site_url('admin_panel/add_doctor'));
        }
    }

    // *** update hospital image -----------------------------------------------
    public function replace_image_doctor() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // get file name & delete ------------------------------------------
            unlink(FCPATH.'/uploads/front/doctor/' . $img);
            unlink(FCPATH.'/uploads/front/doctor/thumb/' . $img);

            // name process ----------------------------------------------------
            $divide = explode('.', $img);
            $avatar = current($divide);

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/doctor/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/doctor/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->hospital_model->replace_image_doctor($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_doctor'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/add_doctor'));
        }
    }

    // *** hospital Delete -----------------------------------------------------
    public function delete_doctor() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // file delete------------------------------------------------------
            unlink(FCPATH.'/uploads/front/doctor/' . $img);
            unlink(FCPATH.'/uploads/front/doctor/thumb/' . $img);


            $this->hospital_model->doctor_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/add_doctor'));
        } else {
            redirect(site_url('admin_panel/add_doctor'));
        }
    }

    // ********************************* add offer ***********************************
    public function add_offer() {
        $this->back_temp->loadData("title", array("title" => "Add offer"));
        $this->back_temp->loadData("activeLink", array("home" => array("offer" => 1)));
        if($_POST){
           // recv post data ---------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/offer/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/offer/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        $this->home_model->add_offer($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_offer'));
                    }
                }
            }
        }else{
            $lists = $this->home_model->get_offer();
            $this->back_temp->loadCont("back/home/offer.php", array("lists" => $lists));
        }
    }

    // *** update events -------------------------------------------------------
    public function update_offer() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            // renaming --------------------------------------------------------
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $first_part = str_replace(' ', '_', $form['title']);
            $first_part = strtolower($first_part);
            $form['img'] = $first_part.'.'.$ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/offer/" . $old_img, "./uploads/front/offer/" . $form['img']);
            rename("./uploads/front/offer/thumb/" . $old_img, "./uploads/front/offer/thumb/" . $form['img']);

            $this->home_model->update_offer($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/add_offer'));
        } else {
            redirect(site_url('admin_panel/add_offer'));
        }
    }

    // *** update events image -------------------------------------------------
    public function replace_image_offer() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // get file name & delete ------------------------------------------
            unlink(FCPATH.'/uploads/front/offer/' . $img);
            unlink(FCPATH.'/uploads/front/offer/thumb/' . $img);

            // name process ----------------------------------------------------
            $divide = explode('.', $img);
            $avatar = current($divide);

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $avatar = strtolower($title);
                $path = strtolower($_FILES['img']['name']);
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/offer/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/offer/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->home_model->replace_offer_image($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_offer'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/add_offer'));
        }
    }

    // *** news Delete ---------------------------------------------------------
    public function delete_offer() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            unlink(FCPATH.'/uploads/front/offer/' . $img);
            unlink(FCPATH.'/uploads/front/offer/thumb/' . $img);

            $this->home_model->offer_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/add_offer'));
        } else {
            redirect(site_url('admin_panel/add_offer'));
        }
    }

    // ##############################################################################################
    //  about us section
    // ##############################################################################################

    // *** about_us ------------------------------------------------------------
    public function about_us() {
        $this->back_temp->loadData("title", array("title" => "About us"));
        $this->back_temp->loadData("activeLink", array("about_us" => array("about_us" => 1)));

        if($_POST){
            // recv post data --------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);

            // name process ----------------------------------------------------
            $url = str_replace(' ', '_', $form['title']);
            $form['url'] = strtolower($url);

            // post data save --------------------------------------------------
            $this->about_us_model->add_about_us($form);
            $this->session->set_flashdata("globalmsg", lang("sucess_1"));
            redirect(site_url('admin_panel/about_us'));

        }else{
            $lists = $this->about_us_model->get_about_us();
            $this->back_temp->loadCont("back/about_us/about_us.php", array("lists" => $lists));
        }
    }

    // *** update about us -----------------------------------------------------
    public function update_about_us() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);
            $id = $this->common->nohtml($this->input->post("id", true));

            // url update ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;

            // save & redirecting ---------------------------
            $this->about_us_model->update_about_us($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/about_us'));
        } else {
            redirect(site_url('admin_panel/about_us'));
        }
    }

    // *** about us delete -----------------------------------------------------
    public function delete_about_us() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $this->about_us_model->delete_about_us($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/about_us'));
        } else {
            redirect(site_url('admin_panel/about_us'));
        }
    }

    // ##############################################################################################
    //  Medical Treatments section
    // ##############################################################################################

    // *** medical_treatments ------------------------------------------------------------
    public function medical_treatments() {
        $this->back_temp->loadData("title", array("title" => "Medical Treatments"));
        $this->back_temp->loadData("activeLink", array("medical_treatments" => array("medical_treatments" => 1)));
        if($_POST){
            // recv post data --------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);
            $form['table'] = $this->input->post("table", true);

            // image processor for thumb image ---------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{

                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/medical_treatments/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '5120';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/medical_treatments/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        $form['img'] = $file_name;
                        // url ---------------------------
                        $x = strtolower($avatar);
                        $url = str_replace(' ', '_', $x);
                        $form['url'] = $url;
                        // save & redirecting ---------------------------
                        $this->medical_treatments_model->add_medical_treatments($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/medical_treatments'));
                    }
                }
            }
        }else{
            $lists = $this->medical_treatments_model->get_medical_treatments();
            $this->back_temp->loadCont("back/medical_treatment/medical_treatment.php", array("lists" => $lists));
        }
    }

    // *** (7) user details ---------------------------------------------------
    public function medical_treatments_details($id){

        $this->back_temp->loadData("title", array("title" => "Medical Treatment Details"));
        $this->back_temp->loadData("activeLink", array("medical_treatments" => array("medical_treatments" => 1)));

        $list = $this->medical_treatments_model->get_medical_treatments_details_by_id($id);
        $this->back_temp->loadCont("back/medical_treatment/medical_treatment_details.php", array("list" => $list));

    }

    // *** update medical treatments -------------------------------------------
    public function update_medical_treatments() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);
            $form['table'] = $this->input->post("table", true);
            $id = $this->common->nohtml($this->input->post("id", true));

            // url update ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;

            // image update ---------------------------
            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $form['img'] = $form['url'] . '.' . $ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/medical_treatments/" . $old_img, "./uploads/front/medical_treatments/" . $form['img']);
            rename("./uploads/front/medical_treatments/thumb/" . $old_img, "./uploads/front/medical_treatments/thumb/" . $form['img']);

            // save & redirecting ---------------------------
            $this->medical_treatments_model->update_medical_treatment($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/medical_treatments'));
        } else {
            redirect(site_url('admin_panel/medical_treatments'));
        }
    }

    // *** replace medical treatment image -------------------------------------
    public function replace_image_medical_treatments() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{

                // delete previous file ----------------------------------------
                unlink(FCPATH.'/uploads/front/medical_treatments/' . $img);
                unlink(FCPATH.'/uploads/front/medical_treatments/thumb/' . $img);

                // name process ------------------------------------------------
                $divide = explode('.', $img);
                $avatar = current($divide);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/medical_treatments/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '5120';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/medical_treatments/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->medical_treatments_model->replace_medical_treatment_image($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/medical_treatments'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/medical_treatments'));
        }
    }

    // *** medical treatments delete -------------------------------------------
    public function delete_medical_treatments() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
            // delete file
            unlink(FCPATH.'/uploads/front/medical_treatments/' . $img);
            unlink(FCPATH.'/uploads/front/medical_treatments/thumb/' . $img);
            $this->medical_treatments_model->delete_medical_treatments($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/medical_treatments'));
        } else {
            redirect(site_url('admin_panel/medical_treatments'));
        }
    }


    // ##############################################################################################
    //  patient guide section
    // ##############################################################################################

    // *** patient_guide -------------------------------------------------------
    public function patient_guide() {
        $this->back_temp->loadData("title", array("title" => "Patient Guide"));
        $this->back_temp->loadData("activeLink", array("patient_guide" => array("patient_guide" => 1)));
        if($_POST){
            // recv post data --------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);
            // url ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;
            // save & redirecting ---------------------------
            $this->patient_guide_model->add_patient_guide($form);
            $this->session->set_flashdata("globalmsg", lang("sucess_1"));
            redirect(site_url('admin_panel/patient_guide'));
        }else{
            $lists = $this->patient_guide_model->get_patient_guide();
            $this->back_temp->loadCont("back/patient_guide/patient_guide.php", array("lists" => $lists));
        }
    }

    // *** update patient guide ------------------------------------------------
    public function update_patient_guide() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);
            // url ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;
            $id = $this->common->nohtml($this->input->post("id", true));
            // save & redirecting ---------------------------
            $this->patient_guide_model->update_patient_guide($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/patient_guide'));
        } else {
            redirect(site_url('admin_panel/patient_guide'));
        }
    }

    // *** delete patient guide ------------------------------------------------
    public function delete_patient_guide() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $this->patient_guide_model->delete_patient_guide($id);
            // save & redirecting ---------------------------
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/patient_guide'));
        } else {
            redirect(site_url('admin_panel/patient_guide'));
        }
    }

    // ##############################################################################################
    //  tours guide section
    // ##############################################################################################

    // ******************************* tours service *****************************
    // *** add tours_service ---------------------------------------------------
    public function add_tours_service() {
        $this->back_temp->loadData("title", array("title" => "Add Tours Service"));
        $this->back_temp->loadData("activeLink", array("tours" => array("tours_service" => 1)));
        if($_POST){
           // recv post data ---------------------------------------------------
            $form = array();
            $form['country'] = $this->common->nohtml($this->input->post("country", true));
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{

                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/tours_guide/tours_service/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/tours_guide/tours_service/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        // url ---------------------------
                        $form['url'] = $avatar;
                        $this->tours_guide_model->add_tours_service($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_tours_service'));
                    }
                }
            }
        }else{
            $names = $this->tours_guide_model->get_country_name_for_service();
            $lists = $this->tours_guide_model->get_tours_service();
            $this->back_temp->loadCont("back/tours_guide/tours_service.php", array("lists" => $lists, "names" => $names));
        }
    }

    // *** update events -------------------------------------------------------
    public function update_tours_service() {
        if ($_POST) {
            $form = array();
            $form['country'] = $this->common->nohtml($this->input->post("country", true));
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            // renaming --------------------------------------------------------
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $first_part = str_replace(' ', '_', $form['title']);
            $first_part = strtolower($first_part);
            $form['img'] = $first_part.'.'.$ext;
            // renaming --------------------------------------------------------
            rename("./uploads/front/tours_guide/tours_service/" . $old_img, "./uploads/front/tours_guide/tours_service/" . $form['img']);
            rename("./uploads/front/tours_guide/tours_service/thumb/" . $old_img, "./uploads/front/tours_guide/tours_service/thumb/" . $form['img']);

            // url update ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;

            $this->tours_guide_model->update_tours_service($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/add_tours_service'));
        } else {
            redirect(site_url('admin_panel/add_tours_service'));
        }
    }

    // *** update events image -------------------------------------------------
    public function replace_image_tours_service() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // get file name & delete ------------------------------------------
            unlink(FCPATH.'/uploads/front/tours_guide/tours_service/' . $img);
            unlink(FCPATH.'/uploads/front/tours_guide/tours_service/thumb/' . $img);

            // name process ----------------------------------------------------
            $divide = explode('.', $img);
            $avatar = current($divide);

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $avatar = strtolower($title);
                $path = strtolower($_FILES['img']['name']);
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/tours_guide/tours_service/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/tours_guide/tours_service/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->tours_guide_model->replace_image_tours_service($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_tours_service'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/add_tours_service'));
        }
    }

    // *** news Delete ---------------------------------------------------------
    public function delete_tours_service() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
           // delete file
            unlink(FCPATH.'/uploads/front/tours_guide/tours_service/' . $img);
            unlink(FCPATH.'/uploads/front/tours_guide/tours_service/thumb/' . $img);

            $this->tours_guide_model->tours_service_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/add_tours_service'));
        } else {
            redirect(site_url('admin_panel/add_tours_service'));
        }
    }


    // ##############################################################################################
    //  tours place section
    // ##############################################################################################

    // ******************************* tours place *****************************
    // *** add tours place---------------------------------------------------
    public function add_tours_place() {
        $this->back_temp->loadData("title", array("title" => "Add Tours Place"));
        $this->back_temp->loadData("activeLink", array("tours" => array("tours_place" => 1)));
        if($_POST){
           // recv post data ---------------------------------------------------
            $form = array();
            $form['country'] = $this->common->nohtml($this->input->post("country", true));
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{

                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/tours_guide/tours_place/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/tours_guide/tours_place/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        // url ---------------------------
                        $form['url'] = $avatar;
                        $this->tours_guide_model->add_tours_place($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_tours_place'));
                    }
                }
            }
        }else{
            $names = $this->tours_guide_model->get_country_name_for_service();
            $lists = $this->tours_guide_model->get_tours_place();
            $this->back_temp->loadCont("back/tours_guide/tours_place.php", array("lists" => $lists, "names" => $names));
        }
    }

    // *** tours place Delete ---------------------------------------------------------
    public function delete_tours_place() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
           // delete file
            unlink(FCPATH.'/uploads/front/tours_guide/tours_place/' . $img);
            unlink(FCPATH.'/uploads/front/tours_guide/tours_place/thumb/' . $img);

            $this->tours_guide_model->tours_place_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/add_tours_place'));
        } else {
            redirect(site_url('admin_panel/add_tours_place'));
        }
    }
    // *** update PLACE image -------------------------------------------------
    public function replace_image_tours_place() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // get file name & delete ------------------------------------------
            unlink(FCPATH.'/uploads/front/tours_guide/tours_place/' . $img);
            unlink(FCPATH.'/uploads/front/tours_guide/tours_place/thumb/' . $img);

            // name process ----------------------------------------------------
            $divide = explode('.', $img);
            $avatar = current($divide);

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $avatar = strtolower($title);
                $path = strtolower($_FILES['img']['name']);
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/tours_guide/tours_place/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/tours_guide/tours_place/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->tours_guide_model->replace_image_tours_place($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_tours_place'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/add_tours_place'));
        }
    }
    // *** update events -------------------------------------------------------
    public function update_tours_place() {
        if ($_POST) {
            $form = array();
            $form['country'] = $this->common->nohtml($this->input->post("country", true));
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            // renaming --------------------------------------------------------
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $first_part = str_replace(' ', '_', $form['title']);
            $first_part = strtolower($first_part);
            $form['img'] = $first_part.'.'.$ext;
            // renaming --------------------------------------------------------
            rename("./uploads/front/tours_guide/tours_place/" . $old_img, "./uploads/front/tours_guide/tours_place/" . $form['img']);
            rename("./uploads/front/tours_guide/tours_place/thumb/" . $old_img, "./uploads/front/tours_guide/tours_place/thumb/" . $form['img']);

            // url update ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;

            $this->tours_guide_model->update_tours_place($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/add_tours_place'));
        } else {
            redirect(site_url('admin_panel/add_tours_place'));
        }
    }
    // ******************************* add country *****************************
    // *** add country ---------------------------------------------------------
    public function add_country() {
        $this->back_temp->loadData("title", array("title" => "Add Country"));
        $this->back_temp->loadData("activeLink", array("tours" => array("add_country" => 1)));
        if($_POST){
           // recv post data ---------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/tours_guide/add_country/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/tours_guide/add_country/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        // url ---------------------------
                        $form['url'] = $avatar;

                        $this->tours_guide_model->add_country($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_country'));
                    }
                }
            }
        }else{
            $lists = $this->tours_guide_model->get_country();
            $this->back_temp->loadCont("back/tours_guide/add_country.php", array("lists" => $lists));
        }
    }

    // *** update country ------------------------------------------------------
    public function update_country() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            // renaming --------------------------------------------------------
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $first_part = str_replace(' ', '_', $form['title']);
            $first_part = strtolower($first_part);
            $form['img'] = $first_part.'.'.$ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/tours_guide/add_country/" . $old_img, "./uploads/front/tours_guide/add_country/" . $form['img']);
            rename("./uploads/front/tours_guide/add_country/thumb/" . $old_img, "./uploads/front/tours_guide/add_country/thumb/" . $form['img']);

            // url update ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;

            $this->tours_guide_model->update_country($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/add_country'));
        } else {
            redirect(site_url('admin_panel/add_country'));
        }
    }

    // *** update country image ------------------------------------------------
    public function replace_image_country() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // get file name & delete ------------------------------------------
            unlink(FCPATH.'/uploads/front/tours_guide/add_country/' . $img);
            unlink(FCPATH.'/uploads/front/tours_guide/add_country/thumb/' . $img);

            // name process ----------------------------------------------------
            $divide = explode('.', $img);
            $avatar = current($divide);

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/tours_guide/add_country/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/tours_guide/add_country/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->tours_guide_model->replace_image_country($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_country'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/add_country'));
        }
    }

    // *** country Delete ---------------------------------------------------------
    public function delete_country() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->tours_guide_model->get_country_name($img);

            unlink(FCPATH.'/uploads/front/tours_guide/add_country/' . $img);
            unlink(FCPATH.'/uploads/front/tours_guide/add_country/thumb/' . $img);

            $this->tours_guide_model->country_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/add_country'));
        } else {
            redirect(site_url('admin_panel/add_country'));
        }
    }

    // ******************************* add expert *****************************
    // *** add expert ---------------------------------------------------------
    public function add_expert() {

        $this->back_temp->loadData("title", array("title" => "Add Expert"));
        $this->back_temp->loadData("activeLink", array("home" => array("add_expert" => 1)));
        if($_POST){
           // recv post data ---------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/expert/add_expert/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/expert/add_expert/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        // url ---------------------------
                        $form['url'] = $avatar;

                        $this->doctor_model->add_expert($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_expert'));
                    }
                }
            }
        }else{
            $lists = $this->doctor_model->get_expert_all();
            $this->back_temp->loadCont("back/expert/add_expert.php", array("lists" => $lists));
        }
    }

    // *** update country ------------------------------------------------------
    public function update_expert() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            // renaming --------------------------------------------------------
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $first_part = str_replace(' ', '_', $form['title']);
            $first_part = strtolower($first_part);
            $form['img'] = $first_part.'.'.$ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/expert/add_expert/" . $old_img, "./uploads/front/expert/add_expert/" . $form['img']);
            rename("./uploads/front/expert/add_expert/thumb/" . $old_img, "./uploads/front/expert/add_expert/thumb/" . $form['img']);

            // url update ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;

            $this->doctor_model->update_expert($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/add_expert'));
        } else {
            redirect(site_url('admin_panel/add_expert'));
        }
    }

    // *** update country image ------------------------------------------------
    public function replace_image_expert() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            // get file name & delete ------------------------------------------
            unlink(FCPATH.'/uploads/front/expert/add_expert/' . $img);
            unlink(FCPATH.'/uploads/front/expert/add_expert/thumb/' . $img);

            // name process ----------------------------------------------------
            $divide = explode('.', $img);
            $avatar = current($divide);

            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/expert/add_expert/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/expert/add_expert/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->doctor_model->replace_image_expert($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/add_expert'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/add_expert'));
        }
    }

    // *** expert Delete ---------------------------------------------------------
    public function delete_expert() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->doctor_model->get_expert_name($img);

            unlink(FCPATH.'/uploads/front/expert/add_expert/' . $img);
            unlink(FCPATH.'/uploads/front/expert/add_expert/thumb/' . $img);

            $this->doctor_model->expert_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/add_expert'));
        } else {
            redirect(site_url('admin_panel/add_expert'));
        }
    }

    // ##############################################################################################
    //  service & package section
    // ##############################################################################################

    // *** service_package -----------------------------------------------------
    public function service_package() {
        $this->back_temp->loadData("title", array("title" => "Service Package"));
        $this->back_temp->loadData("activeLink", array("service_package" => array("service_package" => 1)));

        if($_POST){
            // recv post data --------------------------------------------------
            $sub = array();
            $sub['sub_id'] = $this->common->nohtml($this->input->post("sub_id", true));

            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);
            $form['table'] = $this->input->post("table", true);

            // post data save ------------------------------------------
            if($sub['sub_id'] == '---'){

                // image processor for thumb image ---------------------------------
                if(empty($_FILES['img']['name'])){
                    $this->back_temp->error(lang("error_7"));
                }else{
                    // name process ------------------------------------------------
                    $img_name = str_replace(' ', '_', $form['title']);
                    $avatar = strtolower($img_name);

                    // config ------------------------------------------------------
                    $config['upload_path']     = './uploads/front/service_package/';
                    $config['file_ext_tolower'] = TRUE;
                    $config['file_name']       = $avatar;
                    $config['remove_spaces']   = TRUE;
                    $config['allowed_types']   = 'jpg|png';
                    $config['xss_clean']       = TRUE;
                    $this->load->library('upload', $config);
                    // uploading ---------------------------------------------------
                    if($this->upload->do_upload('img')){
                        // image name ----------
                        $up_data = array('upload_data' => $this->upload->data());
                        $file_name = $up_data['upload_data']['file_name'];
                        $form['img'] = $file_name;
                        // url ---------------------------
                        $form['url'] = $avatar;

                        // data save --------------
                        $this->service_package_model->add_service_package($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/service_package'));
                    }else{
                        $this->back_temp->error($this->upload->display_errors());
                    }
                }

            }else{
                // pick id -----------------------------------------------------
                $form['sub_id'] = $sub['sub_id'];

                // image processor for thumb image -----------------------------
                if(empty($_FILES['img']['name'])){
                    $this->back_temp->error(lang("error_7"));
                }else{
                    // name process --------------------------------------------
                    $img_name = str_replace(' ', '_', $form['title']);
                    $avatar = strtolower($img_name);

                    // config --------------------------------------------------
                    $config['upload_path']     = './uploads/front/service_package/sub/';
                    $config['file_ext_tolower'] = TRUE;
                    $config['file_name']       = $avatar;
                    $config['remove_spaces']   = TRUE;
                    $config['allowed_types']   = 'jpg|png';
                    $config['xss_clean']       = TRUE;
                    $this->load->library('upload', $config);
                    // uploading -----------------------------------------------
                    if($this->upload->do_upload('img')){
                        // image name ----------
                        $up_data = array('upload_data' => $this->upload->data());
                        $file_name = $up_data['upload_data']['file_name'];
                        $form['img'] = $file_name;
                        // url ---------------------------
                        $form['url'] = $avatar;

                        // data save --------------
                        $this->service_package_model->add_service_package_sub($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/service_package'));
                    }else{
                        $this->back_temp->error($this->upload->display_errors());
                    }
                }

            }
        }else{
            $lists = $this->service_package_model->get_service_package();
            $sub_lists = $this->service_package_model->get_service_package_sub();
            $this->back_temp->loadCont("back/service_package/service_package.php", array("lists" => $lists, "sub_lists" => $sub_lists));
        }
    }

    // *** update about us -----------------------------------------------------
    public function update_service_package() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);
            $form['table'] = $this->input->post("table", true);
            $id = $this->common->nohtml($this->input->post("id", true));

            // url update ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;

            // image update ---------------------------
            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $form['img'] = $form['url'] . '.' . $ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/service_package/" . $old_img, "./uploads/front/service_package/" . $form['img']);
            // save & redirecting ---------------------------
            $this->service_package_model->update_service_package($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/service_package'));
        } else {
            redirect(site_url('admin_panel/service_package'));
        }
    }

    // *** replace about us image ----------------------------------------------
    public function replace_image_service_package() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // delete previous file ----------------------------------------
                unlink(FCPATH.'/uploads/front/service_package/' . $img);
                // name process ------------------------------------------------
                $divide = explode('.', $img);
                $avatar = current($divide);
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/service_package/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if($this->upload->do_upload('img')){
                    $up_data = array('upload_data' => $this->upload->data());
                    $file_name = $up_data['upload_data']['file_name'];
                    $data['img'] = $file_name;
                    // save & redirecting --------------------------------------
                    $this->service_package_model->replace_service_package_image($data, $id);
                    $this->session->set_flashdata("globalmsg", lang("sucess_3"));
                    redirect('admin_panel/service_package');
                }else{
                    $this->back_temp->error($this->upload->display_errors());
                }
            }
         } else {
            redirect(site_url('admin_panel/service_package'));
        }
    }

    // *** about us delete -----------------------------------------------------
    public function delete_service_package() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            unlink(FCPATH.'/uploads/front/service_package/' . $img);

            $this->service_package_model->delete_service_package($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/service_package'));
        } else {
            redirect(site_url('admin_panel/service_package'));
        }
    }

    // *** update service package sub ------------------------------------------
    public function update_service_package_sub() {
        if ($_POST) {

            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->input->post("desc", true);
            $form['table'] = $this->input->post("table", true);
            $id = $this->common->nohtml($this->input->post("id", true));

            // url update ---------------------------
            $x = strtolower($form['title']);
            $url = str_replace(' ', '_', $x);
            $form['url'] = $url;

            // image update ---------------------------
            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $divide = explode('.', $old_img);
            $ext = end($divide);
            $form['img'] = $form['url'] . '.' . $ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/service_package/sub/" . $old_img, "./uploads/front/service_package/sub/" . $form['img']);

            // save & redirecting ---------------------------
            $this->service_package_model->update_service_package_sub($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/service_package'));
        } else {
            redirect(site_url('admin_panel/service_package'));
        }
    }

    // *** replace image service package sub -----------------------------------
    public function replace_image_service_package_sub() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // delete previous file ----------------------------------------
                unlink(FCPATH.'/uploads/front/service_package/sub/' . $img);
                // name process ------------------------------------------------
                $divide = explode('.', $img);
                $avatar = current($divide);
                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/service_package/sub/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if($this->upload->do_upload('img')){
                    $up_data = array('upload_data' => $this->upload->data());
                    $file_name = $up_data['upload_data']['file_name'];
                    $data['img'] = $file_name;
                    // save & redirecting --------------------------------------
                    $this->service_package_model->replace_service_package_image_sub($data, $id);
                    $this->session->set_flashdata("globalmsg", lang("sucess_3"));
                    redirect('admin_panel/service_package');
                }else{
                    $this->back_temp->error($this->upload->display_errors());
                }
            }
         } else {
            redirect(site_url('admin_panel/service_package'));
        }
    }

    // *** delete_service_package delete ---------------------------------------
    public function delete_service_package_sub() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            unlink(FCPATH.'/uploads/front/service_package/sub/' . $img);

            $this->service_package_model->delete_service_package_sub($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/service_package'));
        } else {
            redirect(site_url('admin_panel/service_package'));
        }
    }

    // ##############################################################################################
    //  Article section
    // ##############################################################################################

    // *** article ----------------------------------------------------------------
    public function article() {
        $this->back_temp->loadData("title", array("title" => "Article"));
        $this->back_temp->loadData("activeLink", array("article" => array("article" => 1)));
        if($_POST){
           // recv post data --------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/article/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/article/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        $this->article_model->add_article($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/article'));
                    }
                }
            }
        }else{
            $lists = $this->article_model->get_article();
            $this->back_temp->loadCont("back/article/article.php", array("lists" => $lists));
        }
    }

    // *** update article ---------------------------------------------------------
    public function update_article() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            $divide = explode('.', $old_img);
            $ext = end($divide);
            $title = str_replace(' ', '_', $form['title']);
            $form['img'] = $title.'.'.$ext; // main_cap.ext

            // renaming --------------------------------------------------------
            rename("./uploads/front/article/" . $old_img, "./uploads/front/article/" . $form['img']);
            rename("./uploads/front/article/thumb/" . $old_img, "./uploads/front/article/thumb/" . $form['img']);

            $this->article_model->update_article($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/article'));
        } else {
            redirect(site_url('admin_panel/article'));
        }
    }

    // *** update article image ---------------------------------------------------
    public function replace_image_article() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{

                // delete previous file ----------------------------------------
                unlink(FCPATH.'/uploads/front/article/' . $img);
                unlink(FCPATH.'/uploads/front/article/thumb/' . $img);

                // name process ------------------------------------------------
                $divide = explode('.', $img);
                $avatar = current($divide);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/article/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/article/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->article_model->replace_image($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/article'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/article'));
        }
    }

    // *** article Delete ---------------------------------------------------------
    public function delete_article() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
            // delete file
            unlink(FCPATH.'/uploads/front/article/' . $img);
            unlink(FCPATH.'/uploads/front/article/thumb/' . $img);
            $this->article_model->article_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/article'));
        } else {
            redirect(site_url('admin_panel/article'));
        }
    }


    // ##############################################################################################
    //  Blog section
    // ##############################################################################################

    // *** blog ----------------------------------------------------------------
    public function blog() {
        $this->back_temp->loadData("title", array("title" => "Blog"));
        $this->back_temp->loadData("activeLink", array("blog" => array("blog" => 1)));
        if($_POST){
           // recv post data --------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/blog/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/blog/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        $this->blog_model->add_blog($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/blog'));
                    }
                }
            }
        }else{
            $lists = $this->blog_model->get_blog();
            $this->back_temp->loadCont("back/blog/blog.php", array("lists" => $lists));
        }
    }

    // *** update blog ---------------------------------------------------------
    public function update_blog() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            $divide = explode('.', $old_img);
            $ext = end($divide);
            $title = str_replace(' ', '_', $form['title']);
            $form['img'] = $title.'.'.$ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/blog/" . $old_img, "./uploads/front/blog/" . $form['img']);
            rename("./uploads/front/blog/thumb/" . $old_img, "./uploads/front/blog/thumb/" . $form['img']);

            $this->blog_model->update_blog($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/blog'));
        } else {
            redirect(site_url('admin_panel/blog'));
        }
    }

    // *** update blog image ---------------------------------------------------
    public function replace_image_blog() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // delete previous file ----------------------------------------
                unlink(FCPATH.'/uploads/front/blog/' . $img);
                unlink(FCPATH.'/uploads/front/blog/thumb/' . $img);

                // name process ------------------------------------------------
                $divide = explode('.', $img);
                $avatar = current($divide);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/blog/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/blog/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->blog_model->replace_image($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/blog'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/blog'));
        }
    }

    // *** blog Delete ---------------------------------------------------------
    public function delete_blog() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            unlink(FCPATH.'/uploads/front/blog/' . $img);
            unlink(FCPATH.'/uploads/front/blog/thumb/' . $img);

            $this->blog_model->blog_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/blog'));
        } else {
            redirect(site_url('admin_panel/blog'));
        }
    }

    // ##############################################################################################
    //  News section
    // ##############################################################################################

    // *** news ----------------------------------------------------------------
    public function news() {
        $this->back_temp->loadData("title", array("title" => "News"));
        $this->back_temp->loadData("activeLink", array("news" => array("news" => 1)));
        if($_POST){
           // recv post data --------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/news/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/news/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        $this->news_model->add_news($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/news'));
                    }
                }
            }
        }else{
            $lists = $this->news_model->get_news();
            $this->back_temp->loadCont("back/news/news.php", array("lists" => $lists));
        }
    }

    // *** update news ---------------------------------------------------------
    public function update_news() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            $divide = explode('.', $old_img);
            $ext = end($divide);
            $title = str_replace(' ', '_', $form['title']);
            $form['img'] = $title.'.'.$ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/news/" . $old_img, "./uploads/front/news/" . $form['img']);
            rename("./uploads/front/news/thumb/" . $old_img, "./uploads/front/news/thumb/" . $form['img']);
            $this->news_model->update_news($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/news'));
        } else {
            redirect(site_url('admin_panel/news'));
        }
    }

    // *** update news image ---------------------------------------------------
    public function replace_image_news() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{

                // delete previous file ----------------------------------------
                unlink(FCPATH.'/uploads/front/news/' . $img);
                unlink(FCPATH.'/uploads/front/news/thumb/' . $img);

                // name process ------------------------------------------------
                $divide = explode('.', $img);
                $avatar = current($divide);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/news/';
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']       = TRUE;
                $config['max_filename']    = 512;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/news/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->news_model->replace_image($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/news'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/news'));
        }
    }

    // *** news Delete ---------------------------------------------------------
    public function delete_news() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            unlink(FCPATH.'/uploads/front/news/' . $img);
            unlink(FCPATH.'/uploads/front/news/thumb/' . $img);

            $this->news_model->news_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/news'));
        } else {
            redirect(site_url('admin_panel/news'));
        }
    }


    // ##############################################################################################
    //  Events section
    // ##############################################################################################

    // *** events --------------------------------------------------------------
    public function events() {
        $this->back_temp->loadData("title", array("title" => "Events"));
        $this->back_temp->loadData("activeLink", array("events" => array("events" => 1)));
        if($_POST){
           // recv post data ---------------------------------------------------
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{
                // name process ------------------------------------------------
                $img_name = str_replace(' ', '_', $form['title']);
                $avatar = strtolower($img_name);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/events/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/events/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form['img'] = $file_name;
                        $this->events_model->add_events($form);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/events'));
                    }
                }
            }
        }else{
            $lists = $this->events_model->get_events();
            $this->back_temp->loadCont("back/events/events.php", array("lists" => $lists));
        }
    }

    // *** update events -------------------------------------------------------
    public function update_events() {
        if ($_POST) {
            $form = array();
            $form['title'] = $this->common->nohtml($this->input->post("title", true));
            $form['desc'] = $this->common->nohtml($this->input->post("desc", true));

            $old_img = $this->common->nohtml($this->input->post("old_img", true));
            $id = $this->common->nohtml($this->input->post("id", true));

            $divide = explode('.', $old_img);
            $ext = end($divide);
            $title = str_replace(' ', '_', $form['title']);
            $form['img'] = $title.'.'.$ext;

            // renaming --------------------------------------------------------
            rename("./uploads/front/events/" . $old_img, "./uploads/front/events/" . $form['img']);
            rename("./uploads/front/events/thumb/" . $old_img, "./uploads/front/events/thumb/" . $form['img']);

            $this->events_model->update_events($form, $id);
            $this->session->set_flashdata("globalmsg", lang("sucess_3"));
            redirect(site_url('admin_panel/events'));
        } else {
            redirect(site_url('admin_panel/events'));
        }
    }

    // *** update events image -------------------------------------------------
    public function replace_image_events() {
        if ($_POST) {
            // recv post data --------------------------------------------------
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));
            // image processor -------------------------------------------------
            if(empty($_FILES['img']['name'])){
                $this->back_temp->error(lang("error_7"));
            }else{

                // delete previous file ----------------------------------------
                unlink(FCPATH.'/uploads/front/events/' . $img);
                unlink(FCPATH.'/uploads/front/events/thumb/' . $img);

                // name process ------------------------------------------------
                $divide = explode('.', $img);
                $avatar = current($divide);

                // config ------------------------------------------------------
                $config['upload_path']     = './uploads/front/events/';
                $config['file_ext_tolower'] = TRUE;
                $config['file_name']       = $avatar;
                $config['remove_spaces']   = TRUE;
                $config['allowed_types']   = 'jpg|png';
                $config['max_size']        = '1024';
                $config['xss_clean']       = TRUE;
                $this->load->library('upload', $config);
                // uploading ---------------------------------------------------
                if(!$this->upload->do_upload('img')){
                    $this->back_temp->error($this->upload->display_errors());
                }else{
                    // Image resizing ------------------------------------------
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['full_path'];
                    $file_name = $data['upload_data']['file_name'];
                    // config --------------------------------------------------
                    $config_resize['image_library']   = 'gd2';
                    $config_resize['source_image']    = $path;
                    $config_resize['maintain_ratio']  = TRUE;
                    $config_resize['quality']         = '70%';
                    $config_resize['width']           = 120;
                    $config_resize['height']          = 120;
                    $config_resize['new_image']       = "./uploads/front/events/thumb/";
                    // laod config ---------------------------------------------
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config_resize);
                    // Image resizing ------------------------------------------
                    if(!$this->image_lib->resize()){
                        $this->back_temp->error($this->image_lib->display_errors());
                    }else{
                        // save into db ----------------------------------------
                        $form = array();
                        $form['img'] = $file_name;
                        $this->events_model->replace_image($form, $id);
                        $this->session->set_flashdata("globalmsg", lang("sucess_1"));
                        redirect(site_url('admin_panel/events'));
                    }
                }
            }
        } else {
            redirect(site_url('admin_panel/events'));
        }
    }

    // *** news Delete ---------------------------------------------------------
    public function delete_events() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $img = $this->common->nohtml($this->input->post("img", true));

            unlink(FCPATH.'/uploads/front/events/' . $img);
            unlink(FCPATH.'/uploads/front/events/thumb/' . $img);

            $this->events_model->events_delete($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/events'));
        } else {
            redirect(site_url('admin_panel/events'));
        }
    }

    // ##############################################################################################
    //  subscriber section
    // ##############################################################################################

    // *** get subscriber list -------------------------------------------------
    public function subs() {
        $this->back_temp->loadData("title", array("title" => "Our subscriber"));
        $this->back_temp->loadData("activeLink", array("subs" => array("subs" => 1)));
        $lists = $this->home_model->get_subs();
        $this->back_temp->loadCont("back/subscriber/subscriber.php", array("lists" => $lists));
    }
    // *** delete subs ---------------------------------------------------------
    public function delete_subs() {
        if ($_POST) {
            $id = $this->common->nohtml($this->input->post("id", true));
            $this->home_model->delete_subs($id);
            $this->session->set_flashdata("globalmsg", lang("sucess_2"));
            redirect(site_url('admin_panel/subs'));
        } else {
            redirect(site_url('admin_panel/subs'));
        }
    }

    // *** logout --------------------------------------------------------------
    public function logout($hash) {
        $this->back_temp->set_error_view("errors/login_error.php");
        $config = $this->config->item("cookieprefix");
        $this->load->helper("cookie");
        if ($hash != $this->security->get_csrf_hash()) {
            $this->back_temp->error(lang("error_6")); // error text fixed
        }
        delete_cookie($config . "un");
        delete_cookie($config . "tkn");
        $this->session->sess_destroy();
        redirect('login');
    }


}
