<?php
defined('BASEPATH') or exit('No direct script access allowed');

class farmasi extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		//is_logged_in();
		$this->load->model('m_obat');
    }

    public function dataobat(){
        $data['title'] = 'data obat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->db->select('*');
        $this->db->from('obat');
        $data['obat'] = $this->db->get()->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('farmasi/dataobat', $data);
		$this->load->view('templates/footer'); 
	}
	
	public function iobat(){
		$data['title'] = 'data obat';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$data['satuan'] = $this->db->get('satuan_obat')->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('farmasi/iobat', $data);
		$this->load->view('templates/footer'); 
	}

	public function barangmasuk(){
		$data['title'] = 'Penerimaan Gudang Farmasi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->db->select('*, barang_pbf.nm_pbf, barang.nm_barang as namabarang');
		$this->db->from('barang_masuk');
		$this->db->join('barang_pbf', 'barang_pbf.kd_pbf = barang_masuk.kd_pbf');
		$this->db->join('barang', 'barang.kd_barang = barang_masuk.kd_barang');
		
		$data['barang'] = $this->db->get()->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gudang/barangmasuk', $data);
		$this->load->view('templates/footer'); 
	}

	public function ibarangmasuk(){
		$data['title'] = 'Input Barang Masuk';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		
		$data['pbf'] = $this->db->get('barang_pbf')->result_array();
	
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gudang/ibarangmasuk', $data);
		$this->load->view('templates/footer'); 
	}

	public function simpanbarangmasuk(){

		
		$data = [
			'tglfaktur' => $this->input->post('tglfaktur'),
			'nofaktur' => $this->input->post('nofaktur'),
			'tgljatuhtempo' => $this->input->post('jatuhtempo'),
			'kd_pbf' => $this->input->post('pbf'),
			'kd_barang' => $this->input->post('kdbarang'),
			'qty' => $this->input->post('qty'),
			'satuan' => $this->input->post('satuan'),
			'no_batch' => $this->input->post('nobatch'),
			'exp' => $this->input->post('expdate'),
			'harga_satuan' => $this->input->post('hargasatuan'),
			'jml' => $this->input->post('jumlah'),
			'jml_tagihan' => $this->input->post('jumlahtagihan'),
			'kd_pembelian' => $this->input->post('kd_pembelian')
		];
			$this->db->insert('barang_masuk', $data);
			$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
			redirect('farmasi/barangmasuk');
		
	}

	public function autobarang(){
		$cari= $_GET['term'];
		//get matched data from skills table
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->like('nm_barang', $cari);
		$this->db->limit(10);
		$hasil = $this->db->get()->result_array();

		foreach ($hasil as $h):
			$data[] =  $h['nm_barang'];
		endforeach;

		echo json_encode($data);
		
		
	}

	public function completebarang(){
		$cari = $_GET['nmbarang'];

		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('nm_barang', $cari);

		$data =  $this->db->get()->row_array();
		echo json_encode($data, true);
	}

	public function pbf(){
		$data['title'] = 'PBF';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->db->select('*');
		$this->db->from('barang_pbf');
		
		$data['pbf'] = $this->db->get()->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gudang/pbf', $data);
		$this->load->view('templates/footer'); 
	}

	public function simpanpbf(){
		$data = [
			'nm_pbf' => $this->input->post('namapbf'),
			'npwp' => $this->input->post('npwp'),
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('notlp')
		];

		$this->db->insert('barang_pbf', $data);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
			redirect('farmasi/pbf');

	}

	public function hapuspbf($kd){
		$this->db->delete('barang_pbf', ['kd_pbf' => $kd]);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Dihapus </div>');
		redirect('farmasi/pbf');
	}
	
	public function barang(){
		$data['title'] = 'Barang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->db->select('*');
		$this->db->from('barang');
		
		$data['barang'] = $this->db->get()->result_array();
		$data['satuan'] = $this->db->get('satuan_obat')->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gudang/barang', $data);
		$this->load->view('templates/footer'); 
	}

	public function simpanbarang(){

		$kode = $this->input->post('kdbarang');

		$barang = $this->db->get_where('barang', ['kd_barang' => $kode]);

		if ($barang->num_rows() >=1){
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Data sudah ada </div>');
		redirect('farmasi/barang');
		}else{
			$data = [

				'kd_barang' => $this->input->post('kdbarang'),
				'nm_barang' => $this->input->post('nmbarang'),
				'tipe_barang' => $this->input->post('tipebarang'),
				'satuan' => $this->input->post('satuan'),
				'stok' => $this->input->post('stok')
			];
	
			$this->db->insert('barang', $data);
			$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Disimpan </div>');
			redirect('farmasi/barang');
		}
	}

	public function hapusbarang($kd){
		$this->db->delete('barang', ['kd_barang' => $kd]);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Dihapus </div>');
		redirect('farmasi/barang');
	}

	public function barangkeluar(){
		$data['title'] = 'Barang Keluar Gudang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gudang/barangkeluar', $data);
		$this->load->view('templates/footer'); 

	}

	public function order(){
		$data['title'] = 'Orderan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
		$this->db->select('*');
		$this->db->from('barang_order');
		$data['order'] = $this->db->get()->result_array();
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('gudang/order', $data);
		$this->load->view('templates/footer'); 
	}

	public function tampildataorder(){
		$this->db->select('*');
		$this->db->from('barang_order');
		$this->db->where('tujuan_order', 'Gudang');
		$this->db->order_by('tgl_permintaan', 'ASC');
		$data1 = $this->db->get()->result_array();
		$i = 1;
		foreach ($data1 as $h):
			echo '<tr>';
			echo '<td>' . $i++ .  '</td>';
			echo '<td>' . $h['kd'] .  '</td>';
			echo '<td>' . $h['tgl_permintaan'] .  '</td>';
			echo '<td>' . $h['kd_barang'] .  '</td>';
			echo '<td>' . $h['qty'] .  '</td>';
			echo '<td>' . $h['user_order'] .  '</td>';
			echo '<td>' . $h['bidang'] .  '</td>';
			echo '<td>' . $h['subbidang'] .  '</td>';
			echo '<td>' . $h['status_order'] .  '</td>';
			echo "<td>";
			echo "<a href='editorder/" . $h['kd'] . "' class='badge badge-warning'>Edit</a>";
			echo "<a href='hapusorder/" . $h['kd'] . "' class='badge badge-danger'>Hapus</a>";
			echo "</td>";
			echo '</tr>';
		endforeach;

		
		
	}

	public function hapusorder($kd){
		$this->db->delete('barang_order', ['kd' => $kd]);
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Data berhasil Dihapus </div>');
		redirect('farmasi/order');

	}

	public function userorder(){
		$data['title'] = 'Permintaan Barang Gudang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('farmasi/userorder', $data);
		$this->load->view('templates/footer'); 
	}

	


}