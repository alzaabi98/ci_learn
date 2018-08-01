<?php 

class Tag_model extends CI_Model {

    public function get_tags() {

        $query = $this->db->get('tags') ;

        return $query->result_array();
    }

    public function create_tag() {

        $data = [
            'name' => $this->input->post('name')
        ] ;
    
        return $this->db->insert('tags',$data);
    }

}