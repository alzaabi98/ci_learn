<?php

class Post_model extends  CI_Model {

    public function get_posts($limit = false, $start = false){

        //$query = $this->db->get('posts');
        if( $limit) {
            $this->db->limit($limit,$start);
        }
        $this->db->select('posts.*, tags.name');
        $this->db->from('posts' );
        $this->db->join('tags', 'posts.tag_id = tags.id');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function show_post($id) {

        $query = $this->db->get_where('posts', array('id' => $id)) ;

        return $query->row_array();
    }

    public function create_post($post_image) {

        $data = [
            'tag_id' => $this->input->post('tag_id'), 
            'user_id' => $this->session->user_id, 
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'image' => $post_image,
            
        ] ;
    
        return $this->db->insert('posts',$data);
    }

    public function delete_post($id) {
        $this->db->delete('posts', array('id' => $id));

        return true;
    }

    public function post_update() {
     
        $id = $this->input->post('id');

        $data= [
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
        ];

        $this->db->where('id',$id);
        return $this->db->update('posts', $data);

    }

    public function get_tags() {

        $this->db->order_by('name');
        $query = $this->db->get('tags');

        return $query->result_array();

    }

   public function get_posts_by_tag_id($id) {
    
    $this->db->select('*');
    $this->db->join('tags', 'posts.tag_id = tags.id');

    $query = $this->db->get_where('posts',array('tag_id' => $id)) ;
    return $query->result_array();
   }

   public function get_comments($id) {

        $query = $this->db->get_where('comments', array('post_id' =>  $id)) ;

        return $query->result_array();
   }

}