<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{

    public function __construct(){
        parent:: __construct();
        $this -> get_user();
    }
    
    public function manage_promo()
    {
        $data                = array();
        $data['all_promo']   = $this->promo_model->getall_promo_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_promo', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_promo()
    {
        $data                       = array();
        $data['promo_code']         = $this->input->post('promo_code');
        $data['promo_value']  = $this->input->post('promo_value');
        $data['active_code'] = $this->input->post('active_code');

        $this->form_validation->set_rules('promo_code', 'mã giảm giá', 'trim|required');
        $this->form_validation->set_rules('promo_value', 'giá trị giảm', 'trim|required');
        $this->form_validation->set_rules('active_code', 'trạng thái', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->promo_model->save_promo_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Thêm mã giảm giá thành công');
                redirect('manage/promo');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
                redirect('manage/promo');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('manage/promo');
        }

    }

    public function active_promo($id)
    {
        $result = $this->promo_model->active_promo_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Cập nhật trạng thái hoạt động thành công');
            redirect('manage/promo');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
            redirect('manage/promo');
        }
    }

    public function unactive_promo($id)
    {
        $result = $this->promo_model->unactive_promo_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Cập nhật trạng thái chờ thành công');
            redirect('manage/promo');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
            redirect('manage/promo');
        }
    }

    public function delete_promo($id)
    {
        $result = $this->promo_model->delete_promo_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Xóa thành công');
            redirect('manage/promo');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
            redirect('manage/promo');
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
