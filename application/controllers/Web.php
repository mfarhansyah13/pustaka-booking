<?php

class Web extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data["title"] = "Halaman Depan";
        $this->load->view("templates/header", $data);
        $this->load->view("web/index", $data);
        $this->load->view("templates/footer", $data);
    }

    public function about()
    {
        $data["title"] = "Halaman About";
        $this->load->view("templates/header", $data);
        $this->load->view("web/index", $data);
        $this->load->view("templates/footer", $data);
    }



}