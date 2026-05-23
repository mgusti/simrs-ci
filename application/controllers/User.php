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

    public function pasien()
    {

        $data['title'] = 'Input Pasien Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pasien_model', 'pasien');

        $data['pas'] = $this->pasien->getKamar();

        $data['pasien'] = $this->db->get('kamar_inap1')->result_array();
        $data['kamar'] = $this->db->get('kamar')->result_array();

        $this->form_validation->set_rules('namapasien', 'Nama Pasien', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pasien', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pasien' => $this->input->post('namapasien'),
                'kd_kamar' => $this->input->post('kdkamar'),
                'status' => $this->input->post('status'),
                'statusdata' => $this->input->post('statusdata'),
                'stts_pulang' => $this->input->post('statuspulang'),
            ];
            $this->db->insert('kamar_inap1', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Sub Menu baru ditambahkan!</div>');
            redirect('user/pasien');
        }
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

    public function edituser()
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['jabatan'] = $this->db->get('jabatan')->result_array();
        // $this->form_validation->set_rules('name', 'name', 'required|trim');
        // $this->form_validation->set_rules('nik', 'nik', 'required|trim');

        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('user/edituser', $data);
        //     $this->load->view('templates/footer');
        // } else {

        //     $uploadimg = $_FILES['image']['name'];
        //     if ($uploadimg) {
        //         $config['upload_path'] = './assets/img/profile';
        //         $config['allowed_types'] = 'jpg|png';
        //         $config['max_size'] = '2000'; //artinya 2mb

        //         $this->load->library('upload', $config);

        //         if ($this->upload->do_upload('image')) {

        //             $lama = $data['user']['image'];
        //             if ($lama != 'default.jpg') {
        //                 unlink(FCPATH . 'assets/img/profile/' . $lama);
        //             }
        //             $new_image = $this->upload->data('file_name');
        //             $this->db->set('image', $new_image);

        //         } else {
        //             $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">periksa lagi ukuran foto</div>');
        //             redirect('user/edituser');
        //         }

        //     }
        $this->db->set('name', $this->input->post('name'));
        $this->db->set('nik', $this->input->post('nik'));
        $this->db->set('tgllahir', $this->input->post('tgllahir'));

        $this->db->set('jenkel', $this->input->post('jenkel'));

        $this->db->where('email', $this->input->post('email'));
        $this->db->update('user');
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil di update</div>');
        redirect('user/edituser');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edituser', $data);
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
