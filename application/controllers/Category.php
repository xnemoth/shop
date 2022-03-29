<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_category()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_category', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_category()
    {
        $data                 = array();
        $data['all_categroy'] = $this->category_model->getall_category_info();
        $data['maincontent']  = $this->load->view('admin/pages/manage_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_category()
    {
        $data                         = array();
        $data['category_name']        = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status']   = $this->input->post('publication_status');

        $this->form_validation->set_rules('category_name', 'tên loại nhóm', 'trim|required');
        $this->form_validation->set_rules('category_description', 'mô tả chi tiết', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'trạng thái', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->category_model->save_category_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Thêm nhóm sản phẩm thành công');
                redirect('manage/category');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại');
                redirect('manage/category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/category');
        }

    }

    public function delete_category($id)
    {
        $result = $this->category_model->delete_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Xóa nhóm sản phẩm thành công');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại');
            redirect('manage/category');
        }
    }

    public function edit_category($id)
    {
        $data                        = array();
        $data['category_info_by_id'] = $this->category_model->edit_category_info($id);
        $data['maincontent']         = $this->load->view('admin/pages/edit_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_category($id)
    {
        $data                         = array();
        $data['category_name']        = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status']   = $this->input->post('publication_status');

        $this->form_validation->set_rules('category_name', 'tên loại nhóm', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Mô tả chi tiết', 'trim|required');
        $this->form_validation->set_rules('publication_status', 'trạng thái', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->category_model->update_category_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect('manage/category');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại');
                redirect('manage/category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/category');
        }

    }

    public function published_category($id)
    {
        $result = $this->category_model->published_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Cập nhật trạng thái hoạt động thành công');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại');
            redirect('manage/category');
        }
    }

    public function unpublished_category($id)
    {
        $result = $this->category_model->unpublished_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Cập nhật trạng thái dừng hoạt động thành công');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại');
            redirect('manage/category');
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
