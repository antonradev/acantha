<?php

class Posts_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_posts($slug = FALSE) {
        if ($slug === FALSE) {
            $this->db->select('id, title, published_date, slug, excerpt, picture');
            $this->db->from('posts');
            $this->db->order_by("id", "desc");
            $this->db->limit(10);
            $query = $this->db->get();
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_posts_links() {

        $this->db->select('id, title, slug');
        $this->db->from('posts');
        $this->db->order_by("id", "desc");
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_comments($post_id) {

        $this->db->select('id, post_id, rating_count, author_name, author_email, posted_date, comment')->from('comments')->where('post_id', $post_id)->order_by("posted_date", "desc")->limit(100);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_like($comment_id) {

        $this->db->where('id', $comment_id);
        $this->db->set('rating_count', 'rating_count + 1', FALSE);
        $this->db->update('comments');
    }

    public function set_dislike($comment_id) {

        $this->db->where('id', $comment_id);
        $this->db->set('rating_count', 'rating_count - 1', FALSE);
        $this->db->update('comments');
    }

    public function set_comment($post_id) {
        $data = array(
            'post_id' => $this->input->post('post_id'),
            'author_name' => $this->input->post('author_name'),
            'author_email' => $this->input->post('author_email'),
            'comment' => $this->input->post('comment')
        );
        return $this->db->insert('comments', $data);
    }

}

?>