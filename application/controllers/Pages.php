<?php 


class Pages extends  CI_Controller {

    public function view($page = 'home') {

        $data['title'] = $page ;
        
        $this->load->view('templates/header.php',$data);
        $this->load->view('pages/' . $page,$data);
        $this->load->view('templates/footer.php');
    }
}