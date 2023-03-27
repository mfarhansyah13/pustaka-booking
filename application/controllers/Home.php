<?php

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    // Katalog buku
    public function index()
    {
        $data = [
            'title' => "Pustaka Booking | Katalog Buku",
            'buku' => $this->ModelBuku->getBuku()->result(),
        ];
        if ($this->session->userdata('email')) {
            $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            // $data['user'] = $user['nama'];
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer', $data);
        } else {
            $data['user'] = 'Pengunjung';
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer', $data);
        }
           
    }

    // Detail buku
    public function detailBuku() 
    {
        $id = $this->uri->segment(3);
        $buku = $this->ModelBuku->joinKategoriBuku(['buku.id' => $id])->result();
        $data['user'] = "Pengunjung";
        $data['title'] = "Detail Buku";

        foreach ($buku as $fields) {
            $data['buku'] = $fields->judul_buku;
            $data['pengarang'] = $fields->pengarang;
            $data['penerbit'] = $fields->penerbit;
            $data['kategori'] = $fields->kategori;
            $data['tahun'] = $fields->tahun_terbit;
            $data['isbn'] = $fields->isbn;
            $data['gambar'] = $fields->image;
            $data['dipinjam'] = $fields->dipinjam;
            $data['dibooking'] = $fields->dibooking;
            $data['stok'] = $fields->stok;
            $data['id'] = $id;
        }
        
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('buku/detailbuku', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }
}