<?php 

class Users extends CI_Controller {

    
    //register
    public function register() {


        $data['title'] = ' Register User';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        //check errors

        if( $this->form_validation->run() === FALSE) {

            $this->load->view('templates/header',$data);
            $this->load->view('users/register',$data);
            $this->load->view('templates/footer');

        } else {
            //create user ..
            $password = md5($this->input->post('password'));
            $this->user_model->register($password);

            //session
            $this->session->set_flashdata('user_registered', 'You are registered successfully, Please login in');
            redirect('posts');
        }
    }

    //check if email exists

    public function email_check($email) {
        $this->form_validation->set_message('email_check','This is email is used, Please choose another one');

        if( $this->user_model->email_check($email)) {
            return true ;
        } else {
            return false;
        }
    }
    //login

    public function login() {
        
        $data['title'] = ' Login User';

        
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        

        //check errors

        if( $this->form_validation->run() === FALSE) {

            $this->load->view('templates/header',$data);
            $this->load->view('users/login',$data);
            $this->load->view('templates/footer');


        } else {
            //create user ..
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            $check_login = $this->user_model->login($email, $password);

            if ($check_login) {

                  //session
                  $this->session->set_flashdata('login_success', ' Welcome again !!!');
                  redirect('posts');
            } else {
                //session
                $this->session->set_flashdata('login_failed', 'login failed');
                redirect('posts');
            }

         
        }
    }
    //logout 

    public function logout() {

        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('logout', ' SEE YOU SOON ...');
        redirect('posts');

    }
}