<?php

class Posts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
    }

    public function view($slug) {
        
        $this->load->helper('breadcrumb');
        
        $data['sidebar_links'] = $this->posts_model->get_posts_links();
        $data['posts_item'] = $this->posts_model->get_posts($slug);

        $data['comments'] = $this->posts_model->get_comments($data['posts_item']['id']);

        if (empty($data['posts_item'])) {
            show_404();
        }

        // CAPTCHA
        //
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'font_path' => './assets/fonts/opensans.ttf',
            'expiration' => 7200
        );
        $cap = create_captcha($vals);
        $data_captcha = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $data['cap'] = create_captcha($vals);
        $query = $this->db->insert_string('captcha', $data_captcha);
        $this->db->query($query);
        // END CAPTCHA
        //

        $data['title'] = $data['posts_item']['title'];

        $this->meta = array(
            array('name' => 'description', 'content' => $data['posts_item']['meta_description']),
            array('name' => 'keywords', 'content' => $data['posts_item']['meta_keywords']),
            array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
        );

        $this->load->view('templates/head', array('data' => $data));
        $this->load->view('templates/header', array('data' => $data));
        $this->load->view('posts/view', array('data' => $data));
        $this->load->view('templates/footer', array('data' => $data));
    }

    public function like_comment($comment_id) {

        $this->posts_model->set_like($comment_id);

        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->session->set_userdata('prev_url', $_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_userdata('prev_url', base_url());
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function dislike_comment($comment_id) {

        $this->posts_model->set_dislike($comment_id);

        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->session->set_userdata('prev_url', $_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_userdata('prev_url', base_url());
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_comment($post_id) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('author_name', 'Name', 'required');
        $this->form_validation->set_rules('author_email', 'E-mail', 'required');
        $this->form_validation->set_rules('comment', 'Comment', 'required');
//        $this->form_validation->set_rules('captcha', 'Captcha', 'required');

        if ($this->form_validation->run() === FALSE) {
            print "Something is not so great! It means error!";
//		$this->load->view('templates/header', $data);
//		$this->load->view('news/create');
//		$this->load->view('templates/footer');
        } else {

            // CAPTCHA
            // First, delete old captchas
//            $expiration = time() - 7200;
//            $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);
            // Then see if a captcha exists:
//            $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
//            $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
//            $query = $this->db->query($sql, $binds);
//            $row = $query->row();
//            if ($row->count == 0) {
            // Error
//                echo "You must submit the word that appears in the image";
//                if (isset($_SERVER['HTTP_REFERER'])) {
//                    $this->session->set_userdata('prev_url', $_SERVER['HTTP_REFERER']);
//                } else {
//                    $this->session->set_userdata('prev_url', base_url());
//                }
//                redirect($_SERVER['HTTP_REFERER']);
//            } else {

            $this->posts_model->set_comment($post_id);

            if (isset($_SERVER['HTTP_REFERER'])) {
                $this->session->set_userdata('prev_url', $_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_userdata('prev_url', base_url());
            }
            redirect($_SERVER['HTTP_REFERER']);


//                }
        }
    }

}

?>