<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tulis_laporan extends CI_Controller {
	
	public function __construct() {

		parent::__construct();
		if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">please login!</div>');
            redirect('masyarakat');
        }

        $this->load->model('model_laporan');
        $this->load->model('model_kategori');
		date_default_timezone_set('Asia/Jakarta');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$data['querykategori'] = $this->model_kategori->getDatakategori();

		$this->load->view('_partials/header');
		$this->load->view('_partials/navbar');
		$this->load->view('pages/laporan/tulis_laporan', $data);
		$this->load->view('_partials/footer');
	}

	public function lapor()
	{
        $nik = $this->input->post('nik');
        $judul_pengaduan = $this->input->post('judul_pengaduan');
        $deskripsi_pengaduan = $this->input->post('deskripsi_pengaduan');
        $foto = $_FILES['foto'];

        if ($foto = '') {
        } else {
            $config['upload_path'] = 'assets/foto/laporan';
            $config['allowed_types'] = 'jpg|png|gif|jpeg|svg';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $id_kategori = $this->input->post('id_kategori');
        for ($i = 0; $i < count($id_kategori); $i++) {
            $id_kategori = $id_kategori[$i];
            // $ArrInsertKategori = array(
            // );
            // $this->model_laporan->insertDatalaporan($ArrInsertKategori);
            $ArrInsert = array(
                'id_kategori' => $id_kategori,
                'nik' => $nik,
                'judul_pengaduan' => $judul_pengaduan,
                'deskripsi_pengaduan' => $deskripsi_pengaduan,
                'foto' => $foto,
                'waktu_pengaduan' => date('Y-m-d H:i:s')
            );
        }
            
		$this->model_laporan->insertDatalaporan($ArrInsert);


        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Laporan Berhasil Dikirim!</div>');
        redirect($_SERVER['HTTP_REFERER']);
	}
}
