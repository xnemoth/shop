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

        if (isset($_GET['brd'])) {
            $brd = $_GET['brd'];
        } else {
            $brd = null;
        }

        if (isset($_GET['prc'])) {
            $prc = $_GET['prc'];
        } else {
            $prc = 999999999;
        }

        $data                    = array();
        $data['get_all_product'] = $this->web_model->get_all_product_pagi($config['per_page'], $this->uri->segment('3'), $brd, $prc);
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }

    public function single($id)
    {
        $data                       = array();
        $data['get_single_product'] = $this->web_model->get_single_product($id);
        if ($data['get_single_product']) {
            $this->load->view('web/inc/header');
            $this->load->view('web/pages/single', $data);
            $this->load->view('web/inc/footer');
        } else {
            redirect('error');
        }
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

        if (isset($_GET['brd'])) {
            $brd = $_GET['brd'];
        } else {
            $brd = null;
        }

        if (isset($_GET['prc'])) {
            $prc = $_GET['prc'];
        } else {
            $prc = 999999999;
        }

        $data['get_all_product'] = $this->web_model->get_all_product_by_cat($id, $brd, $prc);

        $data['categ_name'] = $this->web_model->get_cat_name($id);
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }

    public function brand_post($id)
    {
        $this->load->library('pagination');
        $data                    = array();
        if (isset($_GET['prc'])) {
            $prc = $_GET['prc'];
        } else {
            $prc = 999999999;
        }

        if (isset($_GET['brd'])) {
            $id = $_GET['brd'];
        }

        $data['get_all_product'] = $this->web_model->get_all_product_by_brand($id, $prc);
        $data['brd_name'] = $this->web_model->get_brd_name($id);
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }

    public function customer_info()
    {
        $data                    = array();
        $data['user_info'] = $this->web_model->get_self_customer_info($this->session->userdata('customer_id'));
        $data['order_history'] = $this->web_model->get_order_history($this->session->userdata('customer_id'));
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/info', $data);
        $this->load->view('web/inc/footer');
    }

    public function delete_order($id)
    {
        $result = $this->web_model->delete_order_info($id);
        if ($result == 1) {
            $prd_back = array();
            $all_details_of_order = $this->web_model->get_all_order_detail_by_order($id);
            foreach ($all_details_of_order as $single_detail) {
                $prd_back['product_id']             = $single_detail->product_id;
                $prd_back['qtt_back']               = $single_detail->product_sales_quantity;
                $qtt_update['product_quantity'] = $this->web_model->get_product_by_id($prd_back['product_id'])->product_quantity + $prd_back['qtt_back'];
                $this->web_model->update_product_when_buy($qtt_update, $prd_back['product_id']);
            }
            $this->web_model->delete_order_details_info($id);

            $id_ship = $this->input->post('rowid');
            $this->web_model->delete_shipping_info($id_ship);

            $this->session->set_flashdata('del_ord', 'H???y ????n h??ng th??nh c??ng');
            redirect('user/info');
        } else {
            $this->session->set_flashdata('del_ord', '????n h??ng ???? ???????c x??c nh???n, vui l??ng li??n h??? shop ????? h???y!');
            redirect('user/info');
        }
    }


    public function save_cart()
    {
        $data       = array();
        $product_id = $this->input->post('product_id');
        $results    = $this->web_model->get_product_by_id($product_id);

        $data['id']      = $results->product_id;
        $data['name']    = $results->product_title;
        $data['price']   = $results->product_price;
        $data['qty']     = $this->input->post('qty') >= 0 ? $this->input->post('qty') : 0;
        $data['options'] = array('product_image' => $results->product_image);

        $this->cart->insert($data);
        redirect('cart');
    }

    public function update_cart()
    {
        $data          = array();
        $data['qty']   = $this->input->post('qty') >= 0 ? $this->input->post('qty') : 0;
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

    public function get_promo()
    {
        $data = $this->web_model->get_promo_value($this->input->post('promo_code'));
        if ($data) {
            $this->session->set_flashdata('promo_value', $data->promo_value);
        }
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

        $this->form_validation->set_rules('customer_name', 'h??? v?? t??n', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'm???t kh???u', 'trim|required');
        $this->form_validation->set_rules('customer_address', '?????a ch???', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 's??? ??i???n tho???i', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_customer_info($data);
            if ($result) {
                $this->session->set_flashdata('customer_name', $data['customer_name']);
                $this->session->set_flashdata('customer_email', $data['customer_email']);
                redirect('register/success');
            } else {
                $this->session->set_flashdata('message', 'C?? l???i x???y ra vui l??ng th??? l???i!');
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

        $this->form_validation->set_rules('customer_email', 't??n t??i kho???n', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'm???t kh???u', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_email', $data['customer_email']);
                redirect('/');
            } else {
                $this->session->set_flashdata('message', 'C?? l???i x???y ra vui l??ng th??? l???i!');
                redirect('customer/login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/login');
        }
    }

    public function customer_update_info()
    {
        $data                      = array();
        $check_data                      = array();
        $check_data['customer_id'] = $this->session->userdata('customer_id');

        $data['customer_name']     = $this->input->post('customer_name');
        if ($this->input->post('customer_password') !== "") {
            $check_data['customer_password'] =  md5($this->input->post('customer_password'));
            $this->form_validation->set_rules('customer_new_password', 'm???t kh???u', 'trim|required');
            if ($this->web_model->get_customer_info($check_data)) {
                $data['customer_password'] = md5($this->input->post('customer_new_password'));
            } else {
                $this->session->set_flashdata('message', 'M???t kh???u hi???n t???i ch??a ????ng!');
                redirect('user/info');
            }
        }
        $data['customer_address']  = $this->input->post('customer_address');
        $data['customer_phone']    = $this->input->post('customer_phone');

        $this->form_validation->set_rules('customer_name', 'h??? v?? t??n', 'trim|required');
        $this->form_validation->set_rules('customer_address', '?????a ch???', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 's??? ??i???n tho???i', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->update_self_customer_info($data, $check_data['customer_id']);
            if ($result) {
                $this->session->set_flashdata('message', 'C???p nh???t th??ng tin th??nh c??ng!');
                redirect('user/info');
            } else {
                $this->session->set_flashdata('message', 'C?? l???i x???y ra vui l??ng th??? l???i!');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('user/info');
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
        $data['customer_id']   = $this->session->userdata('customer_id');

        $this->form_validation->set_rules('shipping_name', 't??n ng?????i nh???n', 'trim|required');
        $this->form_validation->set_rules('shipping_email', 'email', 'trim|required|valid_email[tbl_shipping.shipping_email]');
        $this->form_validation->set_rules('shipping_address', '?????a ch??? nh???n h??ng', 'trim|required');
        $this->form_validation->set_rules('shipping_phone', 's??? ??i???n tho???i', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_shipping_address($data);
            $this->session->set_userdata('shipping_id', $result);
            if ($result) {
                redirect('checkout');
            } else {
                $this->session->set_flashdata('message', 'C?? l???i x???y ra vui l??ng th??? l???i');
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

        $this->form_validation->set_rules('payment', 'ph????ng th???c thanh to??n', 'trim|required');

        if ($this->form_validation->run() == true) {
            $odata                = array();
            $odata['customer_id'] = $this->session->userdata('customer_id');
            $odata['shipping_id'] = $this->session->userdata('shipping_id');
            $odata['sale_off']                  = $this->session->userdata('sale_off');
            $odata['order_total'] = $this->cart->total();
            $odata['date_created'] = date('Y-m-d');

            $order_id = $this->web_model->save_order_info($odata);
            $this->session->unset_userdata('sale_off');
            $oddata = array();

            $myoddata = $this->cart->contents();
            $qtt_after = array();

            foreach ($myoddata as $oddatas) {

                $oddata['order_id']               = $order_id;
                $oddata['product_id']             = $oddatas['id'];
                $oddata['product_name']           = $oddatas['name'];
                $oddata['product_price']          = $oddatas['price'];
                $oddata['product_sales_quantity'] = $oddatas['qty'];
                $oddata['product_image']          = $oddatas['options']['product_image'];
                $this->web_model->save_order_details_info($oddata);
                $qtt_after['product_quantity'] = $this->web_model->get_product_by_id($oddatas['id'])->product_quantity - $oddatas['qty'];
                if ($qtt_after['product_quantity'] < 0) {
                    $qtt_after['product_quantity'] = 0;
                }
                $this->web_model->update_product_when_buy($qtt_after, $oddatas['id']);
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

    public function news_post()
    {
        $this->load->view('web/inc/header');
        $this->load->view('web/pages/news');
        $this->load->view('web/inc/footer');
    }

    public function load_more_news()
    {
        $data= array();
        $data['Page'] = $this->input->get('Page');
        $this->load->view('web/pages/morenews', $data);
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
