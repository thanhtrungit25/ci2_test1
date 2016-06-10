<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{
    function index()
    {
        $data['main_content'] = 'contact_form';
        $this->load->view('includes/template', $data);
    }

    function submit()
    {

        $name = $this->input->post('name');
        $email = $this->input->post('email');

        $data['main_content'] = 'contact_submitted';
        
        if ($this->input->post('ajax')) {

            $this->load->view($data['main_content']);

        } else {

            $this->load->view('includes/template', $data);

        }


    }

}