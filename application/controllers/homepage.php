<?php
defined('BASEPATH') or exit('No direct script access allowed');

class homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function setting()
    {
        $data['title'] = 'Setting Homepage';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('setting_home_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('homepage/setting');
        $this->load->view('templates/footer');
    }

    public function inpmenu()
    {
        $uploadimg = $_FILES['gmbr']['name'];

        $config['file_name'] = $uploadimg;
        $config['upload_path'] = './assets/img/fotomenu';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']     = '20000'; //artinya 2mb 

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gmbr')) {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">periksa lagi ukuran foto</div>');
            redirect('homepage/setting');
        } else {
            $namabaru = $this->upload->data('file_name');
            $data = [
                'gambar' => $namabaru,
                'nama' => $this->input->post('nama'),
                'link' => $this->input->post('link'),
                'warna' => $this->input->post('warna')
            ];


            $this->db->insert('setting_home_menu', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil di ditambah</div>');
            redirect('homepage/setting');
        }
    }

    public function delmenu($id)
    {
        $_id = $this->db->get_where('setting_home_menu', ['id_menu' => $id])->row();
        $query = $this->db->delete('setting_home_menu', ['id_menu' => $id]);
        if ($query) {
            unlink("./assets/img/fotomenu/" . $_id->gambar);
        }
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil di dihapus</div>');
        redirect('homepage/setting');
    }
}
