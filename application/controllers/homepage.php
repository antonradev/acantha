<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homepage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
    }

    public function index() {
        
        $this->load->helper('breadcrumb');
        
        $this->load->model('posts_model');
        $data['sidebar_links'] = $this->posts_model->get_posts_links();
        $data['posts'] = $this->posts_model->get_posts();
        $data['title'] = 'Home Page';

        $this->meta = array(
            array('name' => 'description', 'content' => $data['title']),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
        );


        $this->load->view('templates/head', array('data' => $data));
        $this->load->view('templates/header', array('data' => $data));
        $this->load->view('homepage_container', array('data' => $data));
        $this->load->view('templates/footer', array('data' => $data));
    }

}