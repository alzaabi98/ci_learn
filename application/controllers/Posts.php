<?php


class Posts extends CI_Controller {


    public function index($start = 0) {

        $data['title'] = ' All Posts' ;
        //pagination 
        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        //bootstrap style
        $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] 	= '</ul></nav></div>';
        $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] 	= '</span></li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] 	= '</span></li>';
        $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] 	= '</span></li>';

        $this->pagination->initialize($config);


        $data['posts'] = $this->post_model->get_posts($config['per_page'],$start);
        

        $this->load->view('templates/header.php',$data);
        $this->load->view('posts/index',$data);
        $this->load->view('templates/footer.php');
    }

    public function show($id) {

        $data['title'] = ' show single Post' ;
        $data['post'] = $this->post_model->show_post($id);
        $data['comments'] = $this->post_model->get_comments($id);
        


        $this->load->view('templates/header.php',$data);
        $this->load->view('posts/show',$data);
        $this->load->view('templates/footer.php');
    }

    public function create() {

            if (! $this->session->logged_in) {

                redirect('users/login');
            }

    
        //set $data
        $data['title'] = 'Create Post';
        //get all tags 
        $data['tags'] = $this->post_model->get_tags();
        //set rules
        $this->form_validation->set_rules('title','Title', 'required'); 
        $this->form_validation->set_rules('body','Body', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        } else {

            //upload image
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile')) {
                $errors =  array('error' => $this->upload->display_errors());
                $post_image = 'placeholder.png';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->create_post($post_image);
            $this->session->set_flashdata('post_created', 'The post created successfully');

            redirect('posts');
        }

    }

    public function delete($id) {
        
        if (! $this->session->logged_in) {

            redirect('users/login');
        }


        $this->post_model->delete_post($id);
        $this->session->set_flashdata('post_deleted', 'Your post was deleted');

        // flash message
        redirect('posts');
    }

    public function edit($id) {

        if (! $this->session->logged_in) {

            redirect('users/login');
        }

        
        $data['title'] = 'Edit Post';
        $data['post'] = $this->post_model->show_post($id);

        $this->load->view('templates/header', $data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update() {

        if (! $this->session->logged_in) {

            redirect('users/login');
        }


        $data['title'] =  ' edit post';
        // id is hidden input
        $data['post'] = $this->post_model->show_post( $this->input->post('id'));

        $this->form_validation->set_rules('title','Title', 'required'); 
        $this->form_validation->set_rules('body','Body', 'required');



        if ($this->form_validation->run() === FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $this->post_model->post_update();
            $this->session->set_flashdata('post_updated', 'Your post was updated');

            //flash message
            redirect('posts');
        }



       
    }

}