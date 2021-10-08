<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Note extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Note_model');
    }
    public function show()
    {
        $this->load->view('templates/header', [
            'navbar' => true,
            'base_url' => base_url()

        ]);
        $this->load->view('v_note', []);
        $this->load->view('templates/footer');
    }
    public function show_edit()
    {
        $id = $this->input->post('id');
        $note = $this->Note_model->get($id);
        $note = $note->result()[0];
        $this->load->view('templates/header', [
            'navbar' => true,
            'base_url' => base_url()
        ]);
        $this->load->view('v_note_edit', [

            'note' => $note
        ]);
        $this->load->view('templates/footer');
    }
    public function show_search()

    {   
        $id=$this->session->userdata('id');
        $notes=$this->Note_model->select_note_by_create_by($id);
        $notes=$notes->result();
        $dates= [];

        foreach($notes as $note){
            $dates = [...$dates, $note->date_alert];
        }


        $this->load->view('templates/header', [
            'navbar' => true,
            'base_url' => base_url(),
            'dates'=>$dates
        ]);
        $this->load->view('v_note_search', []);
        $this->load->view('templates/footer');
    }
    public function show_search_table()
    {
        $data = $this->input->post();
        $date = DateTime::createFromFormat('d/m/Y',$data['date_alert']);
        $data['date_alert']=$date->format('Y-m-d');
        
        $date_alert = $data['date_alert'];
        $id = $this->session->userdata('id');
        $query = $this->Note_model->select_note_by_date_alert($date_alert, $id);
        $notes = $query->result();
        $this->load->view('templates/header', [
            'navbar' => true,
            'base_url' => base_url()

        ]);
        $this->load->view('v_note_search_table', [
            'notes' => $notes

        ]);
        $this->load->view('templates/footer');
    }
    public function save()
    {
        $data = $this->input->post();
        $data['create_by'] = $this->session->userdata('id');
        $data['update_by'] = $this->session->userdata('id');
        $this->Note_model->add($data);
        redirect('http://localhost/dev/demo/index.php/Note/show', 'refresh');
    }
    public function delete()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $this->Note_model->del($id);
        redirect('http://localhost/dev/demo/index.php/Note/show_search_table', 'refresh');
    }
    public function update()
    {
        $data = $this->input->post();
        date_default_timezone_set('Asia/Bangkok');
        
        $date = date('Y-m-d h:i:s', time());
        $data['update_date'] = $date;

        $id= $this->session->userdata('id');
        $data['update_by'] = $id;

        $this->Note_model->update($data);
        redirect('http://localhost/dev/demo/index.php/Note/show', 'refresh');
    }
}
    
    /* End of file Note.php */
