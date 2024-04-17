<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class masyarakat extends CI_Controller {

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

		$this->load->view('_partials/header_form');
		$this->load->view('pages/form/login_masyarakat');
		$this->load->view('_partials/footer_form');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();
		$pw = $this->db->get_where('masyarakat', ['password' => $password])->row_array();

		if ($user) {

			if ($pw) {
				$data = [

					'username' => $user['username']

				];
				$this->session->set_userdata($data);
				redirect('dashboard');
			} else {

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">wrong password!</div>');
				redirect('');
			}

		} else {

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username is not registered!</div>');
			redirect('');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">congratulation! your account has been logout.</div>');
		redirect('masyarakat');
	}

	public function register()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[masyarakat.username]', [
			'is_unique' => 'this username has already registered!'
		]);

		$this->form_validation->set_rules(
			'password1',
			'password',
			'required|trim|min_length[3]|matches[password2]',
			[
				'matches' => 'password dont match!',
				'min_length' => 'password to short!'
			]
		);

		$this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('_partials/header_form');
			$this->load->view('pages/form/register_masyarakat');
			$this->load->view('_partials/footer_form');
		} else {

			$data = [
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => htmlspecialchars($this->input->post('password1', PASSWORD_DEFAULT)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'telepon' => htmlspecialchars($this->input->post('telepon', true))
			];

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">congratulation! your account has been created. please login!</div>');
			redirect('masyarakat');
		}
	}
}
