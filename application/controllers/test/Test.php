<?php
class Test extends CI_Controller {

    public $test = "asd";
    
    public function __construct() {
        parent::__construct();

        $this->test = "asdfgh";

    }

    public function index() {
        
        echo $this->test;
    }

    public function articleList() {
        echo "articleList";
    }

}