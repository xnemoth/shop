<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct(){
        parent:: __construct();
        $this -> get_user();
    }
    
    public function manage_customer()
    {
        $data                = array();
        $data['all_customer']   = $this->customer_model->getall_customer_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_customer', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function active_customer($id)
    {
        $result = $this->customer_model->active_customer_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Cập nhật trạng thái hoạt động thành công');
            redirect('manage/customer');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
            redirect('manage/customer');
        }
    }

    public function unactive_customer($id)
    {
        $result = $this->customer_model->unactive_customer_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Cập nhật trạng thái chờ thành công');
            redirect('manage/customer');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
            redirect('manage/customer');
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
