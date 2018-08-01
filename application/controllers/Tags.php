<?php


class Tags extends CI_Controller {

    public function index() {
        
        $data['title'] = 'All  Tags';
        $data['tags'] = $this->tag_model->get_tags() ;

        $this->load->view('templates/header.php',$data);
        $this->load->view('tags/index',$data);
        $this->load->view('templates/footer.php');
    }

    public function create() {

        if (! $this->session->logged_in) {

            redirect('users/login');
        }


        
        $data['title'] = 'create Tag' ;

        $this->form_validation->set_rules('name','Name', 'required'); 
        if ($this->form_validation->run() === FALSE) { 

            $this->load->view('templates/header.php',$data);
            $this->load->view('tags/create',$data);
            $this->load->view('templates/footer.php');

        } else {
            $this->tag_model->create_tag() ;
            $this->session->set_flashdata('tag_created', 'The tag was created');

            redirect('posts');

        }
      
    }

    public function posts($id) {

        $data['title'] = 'All posts by Tags';
        $data['posts']  = $this->post_model->get_posts_by_tag_id($id) ;

        $this->load->view('templates/header.php',$data);
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer.php');

    }

    
}