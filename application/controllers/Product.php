<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_product()
    {
        $data                           = array();
        $data['all_published_category'] = $this->product_model->get_all_published_category();
        $data['all_published_brand']    = $this->product_model->get_all_published_brand();
        $data['maincontent']            = $this->load->view('admin/pages/add_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_product()
    {
        $data                    = array();
        $data['get_all_product'] = $this->product_model->get_all_product();
        $data['maincontent']     = $this->load->view('admin/pages/manage_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_product()
    {
        $data                              = array();
        $data['product_title']             = $this->input->post('product_title');
        $data['product_short_description'] = $this->input->post('product_short_description');
        $data['product_long_description']  = $this->input->post('product_long_description');
        $data['product_price']             = $this->input->post('product_price');
        $data['product_quantity']          = $this->input->post('product_quantity');
        $data['product_category']          = $this->input->post('product_category');
        $data['product_brand']             = $this->input->post('product_brand');
        $data['product_feature']           = $this->input->post('product_feature');
        $data['publication_status']        = $this->input->post('publication_status');

        $this->form_validation->set_rules('product_title', 'tên sản phẩm', 'trim|required');
        $this->form_validation->set_rules('product_short_description', 'mô tả chung', 'trim|required');
        $this->form_validation->set_rules('product_long_description', 'chi tiết sản phẩm', 'trim|required');
        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        $this->form_validation->set_rules('product_price', 'giá bán', 'trim|required');
        $this->form_validation->set_rules('product_quantity', 'số lượng', 'trim|required');
        $this->form_validation->set_rules('product_category', 'nhóm hàng', 'trim|required');
        $this->form_validation->set_rules('product_brand', 'thương hiệu', 'trim|required');
        $this->form_validation->set_rules('product_feature', 'nhóm hiển thị', 'trim');
        $this->form_validation->set_rules('publication_status', 'trạng thái', 'trim|required');

        if (!empty($_FILES['product_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('product_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/product');
            } else {
                $post_image            = $this->upload->data();
                $data['product_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->product_model->save_product_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Thêm sản phẩm thành công');
                redirect('manage/product');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
                redirect('manage/product');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/product');
        }
    }

    public function published_product($id)
    {
        $result = $this->product_model->published_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Cập nhật trạng thái hoạt động thành công');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
            redirect('manage/product');
        }
    }
    public function unpublished_product($id)
    {
        $result = $this->product_model->unpublished_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Cập nhật trạng thái chờ thành công');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
            redirect('manage/product');
        }
    }

    public function edit_product($id)
    {
        $data                           = array();
        $data['all_published_category'] = $this->product_model->get_all_published_category();
        $data['all_published_brand']    = $this->product_model->get_all_published_brand();
        $data['product_info_by_id']     = $this->product_model->edit_product_info($id);
        $data['maincontent']            = $this->load->view('admin/pages/edit_product', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_product($id)
    {
        $data                              = array();
        $data['product_title']             = $this->input->post('product_title');
        $data['product_short_description'] = $this->input->post('product_short_description');
        $data['product_long_description']  = $this->input->post('product_long_description');
        $data['product_price']             = $this->input->post('product_price');
        $data['product_quantity']          = $this->input->post('product_quantity');
        $data['product_category']          = $this->input->post('product_category');
        $data['product_brand']             = $this->input->post('product_brand');
        $data['product_feature']           = $this->input->post('product_feature');
        $data['publication_status']        = $this->input->post('publication_status');

        $product_delete_image = $this->input->post('product_delete_image');

        $delete_image = substr($product_delete_image, strlen(base_url()));

        $this->form_validation->set_rules('product_title', 'tên sản phẩm', 'trim|required');
        $this->form_validation->set_rules('product_short_description', 'mô tả chung', 'trim|required');
        $this->form_validation->set_rules('product_long_description', 'chi tiết sản phẩm', 'trim|required');
        // $this->form_validation->set_rules('product_image', 'Product Image', 'trim|required');
        $this->form_validation->set_rules('product_price', 'giá bán', 'trim|required');
        $this->form_validation->set_rules('product_quantity', 'số lượng', 'trim|required');
        $this->form_validation->set_rules('product_category', 'nhóm hàng', 'trim|required');
        $this->form_validation->set_rules('product_brand', 'thương hiệu', 'trim|required');
        $this->form_validation->set_rules('product_feature', 'nhóm hiển thị', 'trim');
        $this->form_validation->set_rules('publication_status', 'trạng thái', 'trim|required');

        if (!empty($_FILES['product_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('product_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/product');
            } else {
                $post_image            = $this->upload->data();
                $data['product_image'] = $post_image['file_name'];
                unlink($delete_image);
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->product_model->update_product_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'Cập nhật sản phẩm thành công');
                redirect('manage/product');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
                redirect('manage/product');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/product');
        }
    }

    public function delete_product($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->product_image);
        $result = $this->product_model->delete_product_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Đã xóa sản phẩm');
            redirect('manage/product');
        } else {
            $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
            redirect('manage/product');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('product_image');
        $this->db->from('tbl_product');
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
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
