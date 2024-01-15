<!-- article_list.php -->
    <h1>게시글 리스트</h1>
    <table style="border:solid 1px; width:1000px; text-align:center;">
        <th style="border:solid 1px; width:60px;">글번호</th>
        <th style="border:solid 1px; width:300px;">제목</th>
        <th style="border:solid 1px; width:180px;">작성일</th>
        <th style="border:solid 1px; width:180px;">수정일</th>
        <th style="border:solid 1px; width:100px;">작성자</th>
                
        <?php
        $modified = "(수정됨)"; 
        foreach ($articles as $article): 
            if (!$article->modifyDate) {
                $article->modifyDate = "-";
                $modified = " ";
            }?> <!--articles는 ArticleController에서 정의된 $data['articles']이다.-->
        <tr style="border:solid 1px;">
            <td style="border:solid 1px; min-width:60px; width:auto;">
                <a href="/article/articleController/articleDetail/<?php echo $article->id; ?>">
                    <?php echo $article->id; ?>
                </a>
            </td>
            <td style="border:solid 1px; min-width:60px; width:auto;">
                <a href="/article/articleController/articleDetail/<?php echo $article->id; ?>">
                    <?php echo $modified.$article->title; ?>
                </a>
            </td>
            <td style="border:solid 1px; min-width:60px; width:auto;">
                <a href="/article/articleController/articleDetail/<?php echo $article->id; ?>">
                    <?php echo $article->createDate; ?>
                </a>
            </td>
            <td style="border:solid 1px; min-width:60px; width:auto;">
                <a href="/article/articleController/articleDetail/<?php echo $article->id; ?>">
                    <?php echo $article->modifyDate; ?>
                </a>
            </td>
            <td style="border:solid 1px; min-width:60px; width:auto;">
                <a href="/article/articleController/articleDetail/<?php echo $article->id; ?>">
                    <?php echo $article->author; ?>
                </a>
            </td>
        </tr>
            <?php endforeach; ?>
    </table>