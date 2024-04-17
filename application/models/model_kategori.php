<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_kategori extends CI_Model
{
    function getDatakategori()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }

}
