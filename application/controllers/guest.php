<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guest extends CI_Controller {
	
	public function __construct() {

		parent::__construct();
		// if (!$this->session->userdata('username')) {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">please login!</div>');
        //     redirect('masyarakat');
        // }

		$this->load->model('model_kategori');
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
		$profil['username'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$profil['querykategori'] = $this->model_kategori->getDatakategori();
		// $data['profil'] = $this->model_profil->getdataprofil();
		$this->load->view('_partials/header');
		$this->load->view('_partials/guest/navbar', $profil);
		$this->load->view('pages/dashboard');
		// $this->load->view('_partials/footer');
	}
}
