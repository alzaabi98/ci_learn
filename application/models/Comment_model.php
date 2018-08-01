<?php 

class Comment_model extends CI_Model {

    public function create_comment($id) {

        $data= [
            'post_id' => $id ,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'body' => $this->input->post('body')
        ] ;
        
       
        return $this->db->insert('comments', $data);
    }
}