<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function index()
    {
        $data['main_content'] = 'login_form';
        $this->load->view('includes/template', $data);
    }

    function validate_credentials()
    {
        $this->load->model('membership_model');
        $query = $this->membership_model->validate();

        if ($query)
        {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($data);
            redirect('site/members_area');
        }
        else
        {
            // Load login form again with errors
            $this->index();
        }
    }

    function signup()
    {
        $data['main_content'] = 'signup_form';
        $this->load->view('includes/template', $data);
    }

    function create_member()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|require');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|require');
        $this->form_validation->set_rules('email_address', 'Email address', 'trim|require|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|require|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|require|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Password Confirm', 'trim|require|min_length[4]|max_length[32]|matches[password');

        if($this->form_validation->run() === FALSE)
        {
            $this->signup();
        }
        else
        {
            $this->load->model('membership_model');
            if ($this->membership_model->create_member())
            {
                $data['main_content'] = 'signup_successful';
                $this->load->view('includes/template', $data);

            }
        }

    }


}