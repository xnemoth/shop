<?php

class Web_Model extends CI_Model
{

    public function get_all_featured_product()
    {
        $this->db->select('*,tbl_product.publication_status as pstatus');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'ASC');
        $this->db->where('tbl_product.publication_status', 1);
        $this->db->where('product_feature', 1);
        $this->db->where("tbl_product.product_quantity > 0");
        $this->db->limit(8);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_new_product()
    {
        $this->db->select('*,tbl_product.publication_status as pstatus');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        $this->db->where("tbl_product.product_quantity > 0");
        $this->db->limit(8);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        $this->db->where("tbl_product.product_quantity > 0");
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_product_pagi($limit, $offset, $brd, $prc)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        if ($brd != null) {
            $this->db->where('tbl_product.product_brand', $brd);
        }

        if ($prc != null) {
            $this->db->where('tbl_product.product_price <', $prc);
        }
        $this->db->where("tbl_product.product_quantity > 0");
        $this->db->limit($limit, $offset);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_single_product($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->where('tbl_product.product_id', $id);
        $this->db->where("tbl_product.product_quantity > 0");
        $info = $this->db->get();
        return $info->row();
    }

    public function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status', 1);
        $this->db->order_by('tbl_category.id', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->order_by('tbl_brand.brand_id', 'DESC');
        $this->db->where('publication_status', 1);
        $this->db->limit(6);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_full_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->order_by('tbl_brand.brand_id', 'DESC');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_product_by_cat($id, $brd, $prc)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        if ($brd != null) {
            $this->db->where('tbl_product.product_brand', $brd);
        }

        if ($prc != null) {
            $this->db->where('tbl_product.product_price <', $prc);
        }
        $this->db->where("tbl_product.product_quantity > 0");
        $this->db->where('tbl_category.id', $id);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_cat_name($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_brd_name($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('brand_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_all_product_by_brand($id, $prc)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        if ($prc != null) {
            $this->db->where('tbl_product.product_price <', $prc);
        }
        $this->db->where("tbl_product.product_quantity > 0");
        $this->db->where('tbl_brand.brand_id', $id);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_product_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.publication_status', 1);
        $this->db->where("tbl_product.product_quantity > 0");
        $this->db->where('tbl_product.product_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function update_product_when_buy($data, $id)
    {
        $this->db->where('product_id', $id);
        return $this->db->update('tbl_product', $data);
    }

    public function save_customer_info($data)
    {
        $this->db->insert('tbl_customer', $data);
        return $this->db->insert_id();
    }

    public function save_shipping_address($data)
    {
        $this->db->insert('tbl_shipping', $data);
        return $this->db->insert_id();
    }

    public function get_customer_info($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where($data);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_self_customer_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('tbl_customer.customer_id', $id);;
        $info = $this->db->get();
        return $info->row();
    }

    public function get_order_history($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->join('tbl_shipping', 'tbl_shipping.shipping_id=tbl_order.shipping_id');
        $this->db->where('tbl_order.customer_id', $id);
        $info = $this->db->get();
        return $info->result();
    }

    public function update_self_customer_info($data, $id)
    {
        $this->db->where('customer_id', $id);
        return $this->db->update('tbl_customer', $data);
    }

    public function delete_order_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('order_id', $id);
        $this->db->where('actions', 0);
        $info = $this->db->get();
        if ($info->num_rows()) {
            $this->db->where('order_id', $id);
            $this->db->where('actions', 0);
            $this->db->delete('tbl_order');
            return 1;
        } else {
            return 0;
        }
    }

    public function get_all_order_detail_by_order($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order_details');
        $this->db->where('tbl_order_details.order_id', $id);
        $info = $this->db->get();
        return $info->result();
    }

    public function delete_order_details_info($id)
    {
        $this->db->where('order_id', $id);
        return $this->db->delete('tbl_order_details');
    }

    public function delete_shipping_info($id)
    {
        $this->db->where('shipping_id', $id);
        return $this->db->delete('tbl_shipping');
    }

    public function get_promo_value($data)
    {
        $this->db->select('promo_value');
        $this->db->from('tbl_promo');
        $this->db->where('tbl_promo.promo_code', $data);
        $this->db->where('tbl_promo.active_code', 1);
        $info = $this->db->get();
        return $info->row();
    }

    public function save_order_info($data)
    {
        $this->db->insert('tbl_order', $data);
        return $this->db->insert_id();
    }

    public function save_order_details_info($oddata)
    {
        $this->db->insert('tbl_order_details', $oddata);
    }

    public function get_all_slider_post()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_popular_posts()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('publication_status', 1);
        $this->db->where("product_quantity > 0");
        $this->db->limit(4);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_search_product($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_category.id=tbl_product.product_category');
        $this->db->join('tbl_brand', 'tbl_brand.brand_id=tbl_product.product_brand');
        $this->db->order_by('tbl_product.product_id', 'DESC');
        $this->db->where('tbl_product.product_quantity > ', 0);
        $this->db->where('tbl_product.publication_status', 1);
        $this->db->like('tbl_product.product_title', $search, 'both');
        $this->db->or_like('tbl_product.product_short_description', $search, 'both');
        $this->db->or_like('tbl_product.product_long_description', $search, 'both');
        $this->db->or_like('tbl_category.category_name', $search, 'both');
        $this->db->or_like('tbl_brand.brand_name', $search, 'both');
        $info = $this->db->get();
        return $info->result();
    }
}
