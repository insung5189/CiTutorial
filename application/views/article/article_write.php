<!-- article_write.php -->
<div class="flex-row">
  <div class="col">
    <h1 class="ml-2 mb-4">글 작성하기</h1>
    <!-- class 에 row 추가 -->
    <section class="col-10">
      <form action="/article/articleController/processArticleWrite" method="post">
        <div class="form-group row">
          <label for="author" class="col-sm-1 col-form-label">작성자</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="author" name="author" placeholder="작성자 이름을 작성해주세요." required>
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-1 col-form-label">제목</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="제목을 작성해주세요." required>
          </div>
        </div>

        <div class="form-group row">
          <label for="body" class="col-sm-1 col-form-label">내용</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="body" name="body" rows="6" placeholder="내용을 작성해주세요." required></textarea>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
            <div style="margin-top: 20px;">
              <button type="submit" class="btn btn-primary">등록하기</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>