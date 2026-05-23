<?php
defined('BASEPATH') or exit('No direct script access allowed');

class informasi extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		//is_logged_in();
		$this->load->model('m_info');
    }

    public function index(){
        
        
        $this->load->model('m_info', 'pasien');
        $data['vip'] = $this->pasien->getvip();
        $data['icu'] = $this->pasien->geticu();
        $data['prt'] = $this->pasien->getprt();
        $data['vk'] = $this->pasien->getvk();

        $data['knak1'] = $this->pasien->getknak1();
        $data['tnak1'] = $this->pasien->gettnak1();


        $data['knak2'] = $this->pasien->getknak2();
        $data['tnak2'] = $this->pasien->gettnak2();

        $data['knak3'] = $this->pasien->getknak3();
        $data['tnak3'] = $this->pasien->gettnak3();

        $data['kdah1'] = $this->pasien->getkdah1();
        $data['tdah1'] = $this->pasien->gettdah1();

        $data['kdah2'] = $this->pasien->getkdah2();
        $data['tdah2'] = $this->pasien->gettdah2();

        $data['kdah3'] = $this->pasien->getkdah3();
        $data['tdah3'] = $this->pasien->gettdah3();

        $data['kjan1'] = $this->pasien->getkjan1();
        $data['tjan1'] = $this->pasien->gettjan1();

        $data['kjan2'] = $this->pasien->getkjan2();
        $data['tjan2'] = $this->pasien->gettjan2();

        $data['kjan3'] = $this->pasien->getkjan3();
        $data['tjan3'] = $this->pasien->gettjan3();

        $data['kparu1'] = $this->pasien->getkparu1();
        $data['tparu1'] = $this->pasien->gettparu1();

        $data['kparu2'] = $this->pasien->getkparu2();
        $data['tparu2'] = $this->pasien->gettparu2();

        $data['kparu3'] = $this->pasien->getkparu3();
        $data['tparu3'] = $this->pasien->gettparu3();

        $data['kint1'] = $this->pasien->getkint1();
        $data['tint1'] = $this->pasien->gettint1();

        $data['kint2'] = $this->pasien->getkint2();
        $data['tint2'] = $this->pasien->gettint2();

        $data['kint3'] = $this->pasien->getkint3();
        $data['tint3'] = $this->pasien->gettint3();

        $data['kmtk1'] = $this->pasien->getkmtk1();
        $data['tmtk1'] = $this->pasien->gettmtk1();

        $data['kmtk2'] = $this->pasien->getkmtk2();
        $data['tmtk2'] = $this->pasien->gettmtk2();

        $data['kmtk3'] = $this->pasien->getkmtk3();
        $data['tmtk3'] = $this->pasien->gettmtk3();

        $data['krg1'] = $this->pasien->getkrg1();
        $data['trg1'] = $this->pasien->gettrg1();

        $data['krg2'] = $this->pasien->getkrg2();
        $data['trg2'] = $this->pasien->gettrg2();

        $data['krg3'] = $this->pasien->getkrg3();
        $data['trg3'] = $this->pasien->gettrg3();
        
        $this->load->view('informasi/index', $data);
    }

    public function laporanmas(){
        $data['title'] = 'Laporan Masalah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporanmas');
        $this->load->view('templates/footer');
        


       
    }
    
    public function inputlapmas(){

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $data = [
            'jenis_laporan' => $this->input->post('tipe_laporan'),
            'laporan' => $this->input->post('laporkan'),
            'user' => $data['user']['name'],
            'jam_input' => date('h:m:s'),
            'tgl_input' => date('Y-m-d')
        ];

        $this->db->insert('laporan_masalah', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Laporan Bersahil dibuat</div>');
        redirect('informasi/laporanmas');
    }

    public function infoinap(){

        $data['title'] = 'Informasi Inap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        
        
        $this->db->select('*, nm_kls, nmsub');
        $this->db->from('aplicare_sws1');
        $this->db->join('kelas', 'kelas.kdkls_bpjs = aplicare_sws1.kelas');
        $this->db->join('subbidang', 'subbidang.kdsub = aplicare_sws1.subbidang');
        
        //$this->db->limit(10, 20);
        $data['aplicare'] = $this->db->get()->result_array();

        //$data['aplicare'] = $this->db->get('aplicare_sws1')->result_array();
        
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('informasi/infoinap', $data);
        $this->load->view('templates/footer');

    }

    public function detailinap($sub){

        $data['title'] = 'Detail Inap ' . $sub;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        
       
        $this->db->select("*, sep.nama, kelas.nm_kls, dokter.nm_dokter, tipe_masuk.nm_tipe, ket_inap.nm_ket, datediff(current_date(),sep.tgl_sep) as lama");
        $this->db->from('rawat_inap');
        $this->db->where('ruang_rawat', $sub);
        $this->db->where('status_inap', '0');
        $this->db->join('sep', 'sep.nosep = rawat_inap.nosep');
        $this->db->join('kelas', 'kelas.kdkls_bpjs = rawat_inap.kelas');
        $this->db->join('dokter', 'dokter.id = rawat_inap.dokter');
        $this->db->join('tipe_masuk', 'tipe_masuk.kd_tipe = rawat_inap.tipe_masuk');
        $this->db->join('ket_inap', 'ket_inap.kd_ket = rawat_inap.keterangan');

        $data['inap'] = $this->db->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('informasi/detailinap', $data);
        $this->load->view('templates/footer');
    }

    public function infopulang(){
        $data['title'] = 'Informasi Pasien Pulang ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        $this->db->select('*, carapulang.nm_pulang, pascapulang.nm_pasca, sep.tgl_sep');
        $this->db->from('pulang');
        $this->db->join('carapulang', 'carapulang.kd_pulang = pulang.carakluar');
        $this->db->join('pascapulang', 'pascapulang.kd_pasca = pulang.pascapulang');
        $this->db->join('sep', 'sep.nosep = pulang.nosep');
        

        $data['pulang'] = $this->db->get()->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('informasi/infopulang', $data);
        $this->load->view('templates/footer');
    }

}