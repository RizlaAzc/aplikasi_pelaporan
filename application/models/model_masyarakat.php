<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_masyarakat extends CI_Model
{
    function getDatamasyarakat()
    {
        $query = $this->db->get('masyarakat');
        return $query->result();
    }

    function insertDatamasyarakat($data)
    {
        $this->db->insert('masyarakat', $data);
    }

    function getDatamasyarakatDetail($id)
    {
        $this->db->where('id', $id);
        $query =  $this->db->get('masyarakat');
        return $query->row();
    }

    function updateDatamasyarakat($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
    }

    function hapusDatamasyarakat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('masyarakat');
    }
}
