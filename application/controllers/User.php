<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Pasien_model');
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function view()
    {

        $data['title'] = 'VIEW';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/view', $data);
        $this->load->view('templates/footer');
    }

    public function ubahstatus($kk)
    {
        $data['title'] = 'Ubah Status Pasien Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->Pasien_model->getPasienByNo($kk);

        $this->form_validation->set_rules('status', 'Status Kamar', 'required');
        $this->form_validation->set_rules('statusdata', 'Status Data', 'required');
        $this->form_validation->set_rules('statuspulang', 'Status Pulang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahstatus', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pasien_model->ubahStatusPasien();
            redirect('user/pasien');
        }
    }

    public function hapuspsn($p)
    {
        $this->load->model('Pasien_model', 'pasien');
        $data['pas'] = $this->pasien->hapusDataPasien($p);
        //$this->session->set_flashdata('flash', 'Dihapus');
        redirect('user/pasien');
    }

    public function cari()
    {
        $data['title'] = 'Input Pasien Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->Pasien_model->getpasien();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pasien', $data);
        $this->load->view('templates/footer');
    }

    public function carimasuk()
    {
        $data['title'] = 'Input Pasien Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien_masuk'] = $this->Pasien_model->getpasien_masuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pasien_masuk', $data);
        $this->load->view('templates/footer');
    }


    public function gantipassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('passlama', 'Password Lama', 'required|trim', [
            'required' => 'Password Lama Tidak Boleh Kosong',
        ]);

        $this->form_validation->set_rules('passbaru', 'Password', 'required|trim|min_length[8]', [

            'min_length' => 'Password terlalu pendek',
            'required' => 'Data Tidak Boleh Kosong',
        ]);
        $this->form_validation->set_rules('ulangpass', 'password', 'required|trim|matches[passbaru]', [
            'required' => 'Data Tidak Boleh Kosong',
            'matches' => 'password tidak sama',
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/gantipassword', $data);
            $this->load->view('templates/footer');

        } else {

            $plama = $this->input->post('passlama');
            $pbaru = $this->input->post('passbaru');

            if (!password_verify($plama, $data['user']['password'])) {
                $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Password lama salah</div>');
                redirect('user/gantipassword');
            } else {
                if ($plama == $pbaru) {
                    $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">password baru tidak boleh sama dengan password lama</div>');
                    redirect('user/gantipassword');
                } else {
                    $this->db->set('password', password_hash($pbaru, PASSWORD_DEFAULT));
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">password berhasil diganti</div>');
                    redirect('user/gantipassword');
                }

            }
        }
    }
}
