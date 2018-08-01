<?php


class User_model extends CI_model {

    public function register($password) {

        $data = [

            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $password

        ];

        return $this->db->insert('users', $data);
    }

    public function email_check($email) {

        $query = $this->db->get_where('users', array('email' => $email)) ;

        if( empty( $query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    //login method

    public function login($email, $password) {

        $query = $this->db->get_where('users', array('email' => $email, 'password' => $password) );

        if ($query->num_rows() == 1) {

            $user = array(
                'user_id' => $query->row()->id,
                'email' => $query->row()->email,
                'name'=>$query->row()->name,
                'logged_in' => true
                
            );

            $this->session->set_userdata($user);
            return true;
        } else  {
            return false;
        }
    }
}