<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		if ($this->session->userdata('username')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">please logout!</div>');
			redirect('dashboard');
		}

		$this->load->view('_partials/header_login');
		$this->load->view('pages/form/login_admin');
		$this->load->view('_partials/footer_login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('petugas', ['username' => $username])->row_array();
		$pw = $this->db->get_where('petugas', ['password' => $password])->row_array();

		if ($user) {

			if ($pw) {
				$data = [

					'username' => $user['username'],
					'level' => $user['level']

				];
				$this->session->set_userdata($data);
				redirect('dashboard');
			} else {

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">wrong password!</div>');
				redirect('admin');
			}

		} else {

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username is not registered!</div>');
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">congratulation! your account has been logout.</div>');
		redirect('admin');
	}
}
