<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller
{
	function index()
	{
		$this->load->model('site_model');
		$data['records'] = $this->site_model->getAll();

		$this->load->view('home', $data);
	}

	function about()
	{
		$this->load->view('about');
	}

}