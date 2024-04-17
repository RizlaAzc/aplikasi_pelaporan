<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_laporan extends CI_Model
{
    function insertDatalaporan($data)
    {
        $this->db->insert('pengaduan', $data);
    }

}
