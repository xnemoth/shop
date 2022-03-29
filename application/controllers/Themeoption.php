<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Themeoption extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function index()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/theme_option', '', true);
        $this->load->view('admin/master', $data);
    }

    public function save_option()
    {

        $data                          = array();
        $data['site_contact_num']     = $this->input->post('site_contact_num');
        $data['site_facebook_link']    = $this->input->post('site_facebook_link');
        $data['site_github_link']     = $this->input->post('site_github_link');
        $data['site_email_link']       = $this->input->post('site_email_link');

        $delete_logo    = $this->input->post('delete_logo');
        $delete_favicon = $this->input->post('delete_favicon');

        $this->form_validation->set_rules('site_contact_num', '', 'trim|required');
        $this->form_validation->set_rules('site_facebook_link', '', 'trim|required');
        $this->form_validation->set_rules('site_github_link', '', 'trim|required');
        $this->form_validation->set_rules('site_email_link', '', 'trim|required');

        if (!empty($_FILES['site_logo']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 666;
            $config['max_width']     = 666;
            $config['max_height']    = 666;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('site_logo')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('theme/option');
            } else {
                unlink('uploads/' . $delete_logo);
                $post_image        = $this->upload->data();
                $data['site_logo'] = $post_image['file_name'];
            }
        }

        if (!empty($_FILES['site_favicon']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 555;
            $config['max_width']     = 555;
            $config['max_height']    = 555;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('site_favicon')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('theme/option');
            } else {
                unlink('uploads/' . $delete_favicon);
                $post_image           = $this->upload->data();
                $data['site_favicon'] = $post_image['file_name'];
            }
        }

        if ($this->form_validation->run() == true) {

            $result = $this->option_model->save_option_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect('theme/option');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
                redirect('theme/option');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('theme/option');
        }
    }

    public function get_user()
    {

        $email = $this->session->userdata('user_email');
        $name  = $this->session->userdata('user_name');
        $id    = $this->session->userdata('user_id');

        if ($email == false) {
            redirect('admin');
        }

    }

}
