<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'email tidak boleh kosong',
            'valid_email' => 'format email salah',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong',

        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'BILLING';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');

                } else {

                    $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email ini belum diaktivasi!</div>');
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Data Tidak Boleh Kosong',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah terdaftar',
            'required' => 'Data Tidak Boleh Kosong',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [

            'min_length' => 'Password Terlalu Pendek, Minimal 8 Karakter',
            'required' => 'Password Tidak Boleh Kosong',
        ]);
        $this->form_validation->set_rules('cpassword', 'password', 'required|trim|matches[password]', [
            'required' => 'Password Tidak Boleh Kosong',
            'matches' => 'Password Tidak Sama',
        ]);

        $this->form_validation->set_rules('role_id', 'Role', 'required', [
            'required' => 'Silahkan Pilih Role',
        ]);

        $this->form_validation->set_rules('subbidang', 'Sub Bidang', 'required', [
            'required' => 'Silahkan Pilih Sub Bidang',
        ]);
        if ($this->form_validation->run() == false) {
            // $data['role'] = $this->db->get('user_role')->result_array();
            $data['subbidang'] = $this->db->get('subbidang')->result_array();
            $data['title'] = 'Registration BILLING';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'subbidang' => $this->input->post('subbidang'),
                'is_active' => 0,
                'date_created' => time(),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">Akun telah didaftarkan, silahkan hubungi IT SIMRS untuk aktivasi</div>');
            redirect('auth/registration');
        }
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Anda berhasi keluar
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('auth');
    }
}
