<?
defined('BASEPATH') OR exit('직접적인 스크립트 접근은 허용되지 않습니다.');

class Articlemodel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function testDatabaseConnection() {
        $conn = $this->db->conn_id;
        if ($conn->ping()) {
            echo "
                <script>
                    alert('Database connection is successful!');
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Database connection failed!');
                </script>
            ";
        }
    }

    public function index () {

    }

    public function getArticleList () {
        $query = $this->db->get('article');
        return $query->result(); // 쿼리의 결과를 result로 담음
    }
    
    public function getArticle ($articleId) {
        $this->db->where('id', $articleId); // where문
        $query = $this->db->get('article'); // select문
        return $query->row(); // 반환된 값(게시글 row)를 row()를 통해서 담음
    }

    public function getArticleByTitleAndBody ($title, $body) {
        $this->db->where('title', $title, 'body', $body); // where문
        $query = $this->db->get('article'); // select문
        return $query->row(); // 반환된 값(게시글 row)를 row()를 통해서 담음
    }

    public function createArticle ($title, $body, $createDate, $author) {
        $data = array(
            'title' => $title, 
            'body' => $body, 
            'createDate' => $createDate,
            'author' => $author);
            $this->db->insert('article', $data);

            // 삽입된 행의 ID 값을 반환
            return $this->db->insert_id();
    }

    public function updateArticle ($articleId, $title, $body, $modifyDate, $author) {
        $data = array(
            'title' => $title, 
            'body' => $body, 
            'modifyDate' => $modifyDate,
            'author' => $author);
            $this->db->where('id', $articleId);
            $this->db->update('article', $data);

            // 삽입된 행의 ID 값을 반환
            return $this->db->insert_id();
    }
}