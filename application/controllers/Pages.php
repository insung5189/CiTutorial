<?php
defined('BASEPATH') OR exit('직접적인 스크립트 접근은 허용되지 않습니다.');
class Pages extends CI_Controller {

        public function view($page = 'home') { // localhost/pages/view/home을 불러온 결과이지만 home을 생략해도 가능.
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                // Whoops, we don't have a page for that!
                phpinfo();
        }

        // $data['title'] = ucfirst($page); // Capitalize the first letter

        $array = array();
        $data = [
                "title" => "Home",
                "test" => "test"
        ];

        // echo $array['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        }
}