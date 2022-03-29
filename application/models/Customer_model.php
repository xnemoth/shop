<?php

class Customer_Model extends CI_Model
{

    public function save_product_info($data)
    {
        return $this->db->insert('tbl_product', $data);
    }

    public function getall_customer_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $info = $this->db->get();
        return $info->result();
    }

    public function active_customer_info($id)
    {
        $this->db->set('customer_active', 1);
        $this->db->where('customer_id', $id);
        return $this->db->update('tbl_customer');
    }

    public function unactive_customer_info($id)
    {
        $this->db->set('customer_active', 0);
        $this->db->where('customer_id', $id);
        return $this->db->update('tbl_customer');
    }

}
