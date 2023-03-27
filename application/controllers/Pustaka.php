<?php

class Pustaka extends CI_Controller {
    public function index()
    {
        $data["title"] = "Psutaka";
        $this->load->view("templates/header", $data);
        $this->load->view("pustaka/index");
        $this->load->view("templates/footer");
    }
}