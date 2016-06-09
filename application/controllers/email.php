<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('newsletter');
    }

    function send()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() === FALSE)
        {
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->load->view('newsletter');
        }
        else
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $this->load->library('email');
            $this->email->set_newline("\r\n");

            $this->email->from('thanhtrung.it25@gmail.com', 'Thanh Trung Dang');
            $this->email->to($email);
            $this->email->subject('This is an email test');
            $this->email->message('It is working. Great');

            $path = $this->config->item('server_root');
            $file = $path . 'ci2_test1/attachments/yourinfo.txt';

            $this->email->attach($file);

            if ($this->email->send())
            {
                echo "Your email has been send.";
            }
            else
            {
                show_error($this->email->print_debugger());
            }
        }
    }
}