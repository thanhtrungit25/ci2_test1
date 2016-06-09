<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller
{
    function index()
    {
        $data = array();

        if ($query = $this->site_model->get_records())
        {
            $data['records'] = $query;
        }
        $this->load->view('home', $data);
    }

    function members_area()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (! isset($is_logged_in) || $is_logged_in != true)
        {
            redirect('login');
        }
        $this->load->view('members_area');
    }

    function about()
    {
        $this->load->view('about');
    }

    function create()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'contents' => $this->input->post('contents'),
        );
        $this->site_model->add_record($data);
        $this->index();
    }

    function update()
    {
        $data = array(
            'title' =>  'super',
            'author' => 'man',
            'contents' => 'here',
        );
        $this->site_model->update_record($data);
        $this->index();
    }

    function delete()
    {
        $this->site_model->delete_record();
        $this->index();
    }
}