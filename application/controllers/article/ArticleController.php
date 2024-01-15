<?php
defined('BASEPATH') OR exit('직접적인 스크립트 접근은 허용되지 않습니다.');

class ArticleController extends CI_Controller {
    public $home ="홈 화면입니다.";

    public function __construct() { // 부모 생성자(여기선 컨트롤러)를 상속받는 역할.
        parent::__construct();
        $this->load->database(); // 생성자에 직접 db 연결정보를 넣어줘서 클래스가 읽힐 때 무조건 db부터 조회하도록 함.
    }

    public function dbConn() {
        $this->load->model('articlemodel');
        $this->articlemodel->testDatabaseConnection();  // 모델의 메서드 호출
        echo "
            <script>
                location.href='/article/articleController/articlelist';
            </script>
        ";
     }

    public function index() {
        $this->load->model('articlemodel'); 
        $data['articles'] = $this->articlemodel;  // 모델의 메서드 호출
        $this->load->view('templates/header', $data);
        echo $this->home;
        $this->load->view('templates/footer', $data);
    }

    public function articleList() {
        echo '게시글 목록 화면입니다.';
        $this->load->model('articlemodel'); 
        $data['articles'] = $this->articlemodel->getArticleList();  // 모델의 메서드 호출
     
        $this->load->view('templates/header', $data);
        $this->load->view('article/article_list', $data);
        $this->load->view('templates/footer', $data);
     }

     public function articleDetail($articleId) {
        // 특정 Article의 상세 정보를 보여주는 코드 (GET)
        echo "$articleId 번 글 상세보기 페이지 입니다.";

        $this->load->model('articlemodel'); 
        $data['article'] = $this->articlemodel->getArticle($articleId);  // 모델의 메서드 호출
     
        $this->load->view('templates/header', $data);
        $this->load->view('article/article_detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function articleWrite() {
        // Article 작성 폼을 보여주는 코드 (GET)
        $this->load->view('templates/header');
        $this->load->view('article/article_write');
        $this->load->view('templates/footer');
    }

    public function processArticleWrite() {
        // Article 작성을 처리하는 코드 (POST)
        $title = $this->input->post('title');
        $body = $this->input->post('body');
        $createDate = date('Y-m-d H:i');
        $author = $this->input->post('author');

        $this->load->model('articlemodel'); 
        $insertedId = $this->articlemodel->createArticle($title, $body, $createDate, $author);
            
            // 글 작성 후에는 해당 게시글 상세보기 페이지로 이동
            if ($insertedId) {
                echo "
                    <script>
                        location.href='/article/articleController/articleDetail/$insertedId';
                    </script>
                ";
            } else { // 오류 발생 시 게시글 리스트로 이동
                echo "
                <script>
                    alert('등록중 오류가 발생했습니다. 게시물 리스트 페이지로 이동합니다.');
                    location.href='/article/articleController/articleList';
                </script>
            ";
            }
    }

    public function articleEdit($articleId) {
        // Article 수정 폼을 보여주는 코드 (GET)

        $this->load->model('articlemodel'); 
        $data['article'] = $this->articlemodel->getArticle($articleId);  // 모델의 메서드 호출

        $this->load->view('templates/header', $data);
        $this->load->view('article/article_edit', $data);
        $this->load->view('templates/footer', $data);
    }
















    public function processArticleEdit($articleId) {
        // Article 수정을 처리하는 코드 (POST)
        $title = $this->input->post('title');
        $body = $this->input->post('body');
        $modifyDate = date('Y-m-d H:i');
        $author = $this->input->post('author');

        $this->load->model('articlemodel');
        $this->articlemodel->updateArticle($articleId, $title, $body, $modifyDate, $author);

        // 글 수정 후에는 해당 게시글 상세보기 페이지로 이동
        if ($articleId) {
            echo "
                <script>
                alert('게시물이 정상적으로 수정되었습니다.');
                    location.href='/article/articleController/articleDetail/$articleId';
                </script>
            ";
        } else { // 오류 발생 시 게시글 리스트로 이동
            echo "
            <script>
                alert('등록중 오류가 발생했습니다. 게시물 리스트 페이지로 이동합니다.');
                location.href='/article/articleController/articleList';
            </script>
        ";
        }
    }

    public function processArticleDelete($articleId) {
        // Article 삭제를 처리하는 코드 (GET)
    }
}