<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMatkul extends CI_Model {

    public function addDataMatkul()
    {
        $data = [
            'kode' => $this->input->post('kode', true),
            'nama' => $this->input->post('nama', true),
            'sks' => $this->input->post('sks', true)
        ];

        // $this->db->insert('data_matkul', $data);
    }

}