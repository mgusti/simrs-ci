<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->where('id !=', 1);
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function insertrole()
	{
		$data = [
			'role' => $this->input->post('role')
		];
		$this->db->insert('user_role', $data);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Role berhasil ditambahkan</div>');
		redirect('admin/role');
	}

	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{

		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [

			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {

			$this->db->insert('user_access_menu', $data);
		} else {

			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}

	public function inputuser()
	{
		$data['title'] = 'Input User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['iuser'] = $this->db->get('user')->result_array();



		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/inputuser', $data);
		$this->load->view('templates/footer');
	}

	public function edituser($id)
	{
		$data['title'] = 'Edit User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['iuser'] = $this->db->get_where('user', ['id' => $id])->row_array();
		$data['jrole'] = $this->db->get_where('user_role', ['id' => $data['iuser']['role_id']])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['isub'] = $this->db->get_where('subbidang', ['kdsub' => $data['iuser']['subbidang']])->row_array();
		$data['sub'] = $this->db->get('subbidang')->result_array();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edituser', $data);
		$this->load->view('templates/footer');
	}

	public function deleteuser($id)
	{
		$this->db->delete('user', ['id' => $id]);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
		redirect('admin/inputuser');
	}

	public function caribidang()
	{
		$role = $_POST['role'];
		$this->db->select('*');
		$this->db->from('subbidang');
		$this->db->where('role', $role);
		$role1 = $this->db->get()->result_array();
		foreach ($role1 as $s) :
			echo "<option value='" . $s['kdsub'] . "' >" . $s['nmsub'] . "</option>";
		endforeach;
	}

	public function edituseraksi($id)
	{
		$pass = $this->input->post('password');
		$this->db->set('name', $this->input->post('nama'));
		$this->db->set('email', $this->input->post('email'));
		$this->db->set('nik', $this->input->post('nik'));
		$this->db->set('tgllahir', $this->input->post('tgllahir'));
		$this->db->set('role_id', $this->input->post('role'));
		$this->db->set('subbidang', $this->input->post('subbidang'));
		$this->db->set('jenkel', $this->input->post('jenkel'));
		$this->db->set('is_active', $this->input->post('aktifasi'));
		$this->db->set('pendidikan', $this->input->post('pendidikan'));
		$this->db->set('jabatan', $this->input->post('jabatan'));
		$this->db->where('id', $id);
		$this->db->update('user');
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data Berhasil di update</div>');
		redirect('admin/edituser/' . $id);
	}

	public function subbidang()
	{
		$data['title'] = 'Subbidang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->db->select('*, user_role.role as rolea');
		$this->db->from('subbidang');
		$this->db->join('user_role', 'user_role.id = subbidang.role');
		$data['subbidang'] = $this->db->get()->result_array();

		$data['role'] = $this->db->get('user_role')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/subbidang', $data);
		$this->load->view('templates/footer');
	}

	public function insertsub()
	{
		$data = [
			'kdsub' => $this->input->post('kodesub'),
			'nmsub' => $this->input->post('subbidang'),
			'role' => $this->input->post('userrole'),
		];

		$this->db->insert('subbidang', $data);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil ditambahkan</div>');
		redirect('admin/subbidang');
	}

	public function delsub($kd)
	{
		$this->db->delete('subbidang', ['kdsub' => $kd]);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">data berhasil dihapus</div>');
		redirect('admin/subbidang');
	}

	public function resetpass($id)
	{
		$pass = "12345678";
		$hash_pass = password_hash($pass, PASSWORD_DEFAULT);
		$this->db->set('password', $hash_pass);
		$this->db->where('id', $id);
		$this->db->update('user');

		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Password Berhasil direset</div>');
		redirect('admin/inputuser');
	}
}
