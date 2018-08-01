<?php

class Comments extends CI_Controller {

    public function create() {
     
        $data['title'] = ' Create Comment';

        $id = $this->input->post('id');
        $data['post'] = $this->post_model->show_post($id);
        //validation 
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        
        if( $this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('posts/show', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->comment_model->create_comment($id);
            redirect('posts/show/' . $id);
        }
    }
}