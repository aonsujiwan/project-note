<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
    }
    public function show()
    {
        $this->load->view('templates/header');
        $this->load->view('v_register', [
            'base_url' => base_url()
        ]);
        $this->load->view('templates/footer');
    }
    public function save()
    {
        $data = $this->input->post();
        unset($data['re_password']);
        $data['password'] = sha1($data['password']);
        $this->Users_model->add($data);
        redirect('http://localhost/dev/demo/index.php/Authen/show', 'refresh');
    }
}
    
    /* End of file Register.php */
