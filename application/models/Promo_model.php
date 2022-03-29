<?php

class Promo_Model extends CI_Model
{

    public function save_promo_info($data)
    {
        return $this->db->insert('tbl_promo', $data);
    }

    public function getall_promo_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_promo');
        $info = $this->db->get();
        return $info->result();
    }

    public function active_promo_info($id)
    {
        $this->db->set('active_code', 1);
        $this->db->where('promo_id', $id);
        return $this->db->update('tbl_promo');
    }

    public function unactive_promo_info($id)
    {
        $this->db->set('active_code', 0);
        $this->db->where('promo_id', $id);
        return $this->db->update('tbl_promo');
    }

    public function delete_promo_info($id)
    {
        $this->db->where('promo_id', $id);
        return $this->db->delete('tbl_promo');
    }

}
