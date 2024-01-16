<?
defined('BASEPATH') OR exit('직접적인 스크립트 접근은 허용되지 않습니다.');

class Articlemodel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function testDatabaseConnection() {
        try {
            $conn = $this->db->conn_id;
            if ($conn->ping()) {
                echo "
                    <script>
                        alert('DB연결 성공!');
                    </script>
                ";
                return true;  // DB 연결 성공
            } else {
                echo "
                    <script>
                        alert('DB연결 실패!');
                    </script>
                ";
                throw new Exception("DB 연결 실패");
            }
        } catch (Exception $e){
            log_message('error', $e->getMessage());
            return false; // DB 연결 실패
        }
    }

    public function index () {

    }

    public function getArticleList() {
        $this->db->order_by('id', 'DESC'); // order_by는 쿼리빌더 클래스에 속해있기 때문에 3.xx버전에서는 쿼리빌더 클래스를 이용해서 작성해야 함.
        $query = $this->db->get('article');
        return $query->result();
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

    public function deleteArticle($articleId) {
        $this->db->where('id', $articleId);
        $this->db->delete('article');
    }
}