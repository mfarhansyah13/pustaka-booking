<?php
class Matakuliah extends CI_Controller
{
    public function index()
    {
        $this->load->view('matakuliah/index');
    }

    public function data()
    {
        $this->form_validation->set_rules('kode', 'Kode Matakuliah', 
            'required|min_length[3]', [
            'required' => 'Kode Matakuliah Harus diisi',
            'min_lenght' => 'Kode terlalu pendek'
        ]);

        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 
            'required|min_length[3]', [
            'required' => 'Nama Matakuliah Harus diisi',
            'min_lenght' => 'Nama terlalu pendek'
        ]);

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('matakuliah/index');

        } else {
            
            $data = [
                'kode' => $this->input->post('kode', true),
                'nama' => $this->input->post('nama', true),
                'sks' => $this->input->post('sks', true)
            ];
            // $this->DataMatkul->addDataMatkul();
            $this->load->view('matakuliah/data', $data);
            
            // redirect('home');

        }
    }


}