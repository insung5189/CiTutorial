<!-- article_detail.php -->
<!-- 게시물 상세 내용 표시 -->
<div style="margin-top: 20px;">
    <h2><?php echo $article->title; ?></h2>
    <p>작성자: <?php echo $article->author; ?></p>
    <p>작성일: <?php echo $article->createDate; ?></p>
    <?php if ($article->modifyDate) : ?>
        <p>수정일: <?php echo $article->modifyDate; ?></p>
    <?php endif; ?>
    <hr>
    <p><?php echo $article->body; ?></p>
</div>

<button>
    <a href="/article/articlecontroller/articleEdit/<?php echo $article->id; ?>">
    <?php echo $article->id; ?>번 게시글 수정하기
    </a>
</button>

<button>
    <a href="/article/articlecontroller/processArticleDelete/<?php echo $article->id; ?>">
    <?php echo $article->id; ?>번 게시글 삭제하기
    </a>
</button>