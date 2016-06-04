<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
	}

	public function index() {
		redirect('signin/login');
	}

	public function login() {

		if ($this->session->userdata('logged_in') === TRUE) {
			redirect('signin/loggedin');
		} else { // Load login form

			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email',
				'required|valid_email|min_length[5]|max_length[125]');
			$this->form_validation->set_rules('password', 'Password',
				'required|min_length[5]|max_length[125]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('signin/signin');
			} else {

				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$this->load->model('Signin_model');
				$query = $this->Signin_model->does_user_exist($email);

				if ($query->num_rows() == 1) {

					foreach ($query->result() as $row) {
						// One matching row found
						$this->load->library('encrypt');

						// Generate hash from their password
						$hash = $this->encrypt->sha1($password);
						if ($hash != $row->user_hash) {
							// Didn't match so send back to login form
							$data['login_fail'] = true;
							$this->load->view('signin/signin', $data);
						} else {
							$data = array(
								'user_id' => $row->user_id,
								'user_email' => $row->user_email,
								'logged_in' => TRUE
							);
							// Set data to session
							$this->session->set_userdata($data);
							redirect('signin/loggedin');
						}
					} // End foreach()
				} // End $query->num_rows()
			} // End else load form signin and show errors when submit fail
		} // End else user not loggedin
	} // End login method

	public function loggedin() {
		if ($this->session->userdata('logged_in') === TRUE) {
			$this->load->view('signin/loggedin');
		} else {
			redirect('signin');
		}
	}

}