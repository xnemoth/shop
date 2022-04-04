<?php

defined('BASEPATH') or exit('No direct script access allowed');

//use Dompdf\Dompdf;

class Web extends CI_Controller
{

    public function index()
    {
        $data                          = array();
        $data['all_featured_products'] = $this->web_model->get_all_featured_product();
        $data['all_new_products']      = $this->web_model->get_all_new_product();
        $this->load->view('web/inc/header');
        $this->load->view('web/inc/slider');
        $this->load->view('web/pages/home', $data);
        $this->load->view('web/inc/footer');
    }

    public function cart()
    {
        $data                  = array();
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/cart', $data);
        $this->load->view('web/inc/footer');
    }

    public function product()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('web/product');
        $config['total_rows'] = $this->db->get('tbl_product')->num_rows();
        $config['per_page'] = 8;
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = FALSE;
        
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['prev_link'] = '<i class="fas fa-chevron-right" style="transform: rotate(180deg);"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = false;
        $config['next_link'] = '<i class="fas fa-chevron-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        
        $data                    = array();
        $data['get_all_product'] = $this->web_model->get_all_product_pagi($config['per_page'], $this->uri->segment('3'));
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }

    public function single($id)
    {
        $data                       = array();
        $data['get_single_product'] = $this->web_model->get_single_product($id);
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/single', $data);
        $this->load->view('web/inc/footer');
    }

    public function error()
    {
        $data = array();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/error');
        $this->load->view('web/inc/footer');
    }

    public function category_post($id)
    {
        $this->load->library('pagination');
        $data                    = array();
        $data['get_all_product'] = $this->web_model->get_all_product_by_cat($id);
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }
    
    public function brand_post($id)
    {
        $this->load->library('pagination');
        $data                    = array();
        $data['get_all_product'] = $this->web_model->get_all_product_by_brand($id);
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }

    public function customer_info(){
        $data                    = array();
        $data['user_info'] = $this->web_model->get_self_customer_info($this->session->userdata('customer_id'));
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/info', $data);
        $this->load->view('web/inc/footer');
    }


    public function save_cart()
    {
        $data       = array();
        $product_id = $this->input->post('product_id');
        $results    = $this->web_model->get_product_by_id($product_id);

        $data['id']      = $results->product_id;
        $data['name']    = $results->product_title;
        $data['price']   = $results->product_price;
        $data['qty']     = $this->input->post('qty');
        $data['options'] = array('product_image' => $results->product_image);

        $this->cart->insert($data);
        redirect('cart');
    }

    public function update_cart()
    {
        $data          = array();
        $data['qty']   = $this->input->post('qty');
        $data['rowid'] = $this->input->post('rowid');

        $this->cart->update($data);
        redirect('cart');
    }

    public function remove_cart()
    {

        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('cart');
    }

    public function register_success()
    {
        $customer_name = $this->session->flashdata('customer_name');
        if (!$customer_name) {
            redirect('customer/register');
        }
        $data = array();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/register_success');
        $this->load->view('web/inc/footer');
    }

    public function user_form()
    {
        $data = array();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/user_form');
        $this->load->view('web/inc/footer');
    }

    public function customer_register()
    {
        $data = array();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/customer_register');
        $this->load->view('web/inc/footer');
    }

    public function customer_login()
    {
        $data = array();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/customer_login');
        $this->load->view('web/inc/footer');
    }

    public function customer_save()
    {
        $data                      = array();
        $data['customer_name']     = $this->input->post('customer_name');
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));
        $data['customer_address']  = $this->input->post('customer_address');
        $data['customer_phone']    = $this->input->post('customer_phone');

        $this->form_validation->set_rules('customer_name', 'họ và tên', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'mật khẩu', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'địa chỉ', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 'số điện thoại', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_customer_info($data);
            if ($result) {
                $this->session->set_flashdata('customer_name', $data['customer_name']);
                $this->session->set_flashdata('customer_email', $data['customer_email']);
                redirect('register/success');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại!');
                redirect('customer/register');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/register');
        }
    }

    public function customer_logincheck()
    {
        $data                      = array();
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));

        $this->form_validation->set_rules('customer_email', 'tên tài khoản', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'mật khẩu', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_email', $data['customer_email']);
                redirect('/');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại!');
                redirect('customer/login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/login');
        }
    }

    public function customer_shipping()
    {
        $data = array();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/customer_shipping');
        $this->load->view('web/inc/footer');
    }

    public function save_shipping_address()
    {
        $data                     = array();
        $data['shipping_name']    = $this->input->post('shipping_name');
        $data['shipping_email']   = $this->input->post('shipping_email');
        $data['shipping_address'] = $this->input->post('shipping_address');
        $data['shipping_phone']   = $this->input->post('shipping_phone');

        $this->form_validation->set_rules('shipping_name', 'tên người nhận', 'trim|required');
        $this->form_validation->set_rules('shipping_email', 'email', 'trim|required|valid_email|is_unique[tbl_shipping.shipping_email]');
        $this->form_validation->set_rules('shipping_address', 'địa chỉ nhận hàng', 'trim|required');
        $this->form_validation->set_rules('shipping_phone', 'số điện thoại', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_shipping_address($data);
            $this->session->set_userdata('shipping_id', $result);
            if ($result) {
                redirect('checkout');
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra vui lòng thử lại');
                redirect('customer/shipping');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/shipping');
        }
    }

    public function checkout()
    {
        $data = array();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/checkout');
        $this->load->view('web/inc/footer');
    }

    public function payment()
    {
        $data = array();
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/payment');
        $this->load->view('web/inc/footer');
    }

    public function save_order()
    {
        $data['payment_type'] = $this->input->post('payment');

        $this->form_validation->set_rules('payment', 'phương thức thanh toán', 'trim|required');

        if ($this->form_validation->run() == true) {
            $odata                = array();
            $odata['customer_id'] = $this->session->userdata('customer_id');
            $odata['shipping_id'] = $this->session->userdata('shipping_id');
            $tax                  = ($this->cart->total() * 15) / 100;
            $odata['order_total'] = $tax + $this->cart->total();
            $odata['date_created'] = date('Y-m-d');

            $order_id = $this->web_model->save_order_info($odata);

            $oddata = array();

            $myoddata = $this->cart->contents();

            foreach ($myoddata as $oddatas) {

                $oddata['order_id']               = $order_id;
                $oddata['product_id']             = $oddatas['id'];
                $oddata['product_name']           = $oddatas['name'];
                $oddata['product_price']          = $oddatas['price'];
                $oddata['product_sales_quantity'] = $oddatas['qty'];
                $oddata['product_image']          = $oddatas['options']['product_image'];
                $this->web_model->save_order_details_info($oddata);
            }

            $this->cart->destroy();

            redirect('congrat');
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('checkout');
        }
    }

    public function search()
    {
        $this->load->library('pagination');

        $search = $this->input->get('search');

        if (!empty($search)) {
            $data                    = array();
            $data['get_all_product'] = $this->web_model->get_all_search_product($search);
            $data['search']          = $search;

            if ($data['get_all_product']) {
                $this->load->view('web/inc/header');
                $this->load->view('web/pages/search', $data);
                $this->load->view('web/inc/footer');
            } else {
                redirect('error');
            }
        } else {
            redirect('error');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('customer_email');
        redirect('customer/login');
    }
}


    // public function pdf($order_id)
    // {
    //     $data        = array();
    //     $order_info  = $this->manageorder_model->order_info_by_id($order_id);
    //     $customer_id = $order_info->customer_id;
    //     $shipping_id = $order_info->shipping_id;
    //     $payment_id  = $order_info->payment_id;

    //     $data['customer_info']      = $this->manageorder_model->customer_info_by_id($customer_id);
    //     $data['shipping_info']      = $this->manageorder_model->shipping_info_by_id($shipping_id);
    //     $data['payment_info']       = $this->manageorder_model->payment_info_by_id($payment_id);
    //     $data['order_details_info'] = $this->manageorder_model->orderdetails_info_by_id($order_id);
    //     $data['order_info']         = $this->manageorder_model->order_info_by_id($order_id);

    //     $this->load->library('pdf');
    //     $dompdf = new Dompdf();
    //     $this->pdf->load_view('admin/pages/pdf', $data);
    //     $this->pdf->setPaper('A4', 'portrait');
    //     $this->pdf->render();
    //     $this->pdf->stream("welcome.pdf");
    // }
