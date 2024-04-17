<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_profil extends CI_Model
{
    function getdataprofil()
    {
        $query = $this->db->get('masyarakat');
        return $query->result();
    }

    function insertdataprofil($data)
    {
        $this->db->insert('masyarakat', $data);
    }

    function getdataprofilDetail($id)
    {
        $this->db->where('id', $id);
        $query =  $this->db->get('masyarakat');
        return $query->row();
    }

    function updatedataprofil($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
    }

    function hapusdataprofil($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('masyarakat');
    }
}
