<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>
            <!-- 주소
         ekfvoddl0321.dothome.co.kr/php/blog/blog.php 
        richclub9.dothome.co.kr/php/board/board.php 
    -->

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
    <style>
        #footer {
            background: #f5f5f5;
        }
    </style>
 
</head>
<body>
<?php
        include "../include/skip.php";
    ?>
    <!-- skip -->

        <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <!-- section -->
        <section id="board-type" class="section center mb100">
        <div class="container">
                <h3 class="section__title">블로그</h3>
                <p class="section__desc">자유롭게 소통할 수 있는 게시판입니다. 자유롭게 작성해 주세요!</p>
                <div class="blog__inner">
                    <div class="blog__search">
                        <form action="blogSearch.php" name="boradSearch" method="get">
                            <fieldset>
                                <legend class="ir_so">검색 영역</legend>
                                <input type="search" name="searchKeyword" id="blogSearch" class="search-form" placeholder="검색어를 입력하세요." aria-label="search" required>
                                <label for="blogSearch" class="ir_so">검색</label>
                                <button class="button"></button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="blog__cont">
<?php
    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 5;
    $pageLimit = ($pageView * $page) - $pageView;

$sql = "SELECT * FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";

    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;

        if($count > 0) {
            
            $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);
        }
    }
?>
<!-- 작성된 게시판 불러오기 -->
            <?php foreach($result as $blog){ ?>
                      <article class='blog'>
                        <figuer class='blog__header'>
                            <a href="blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>")></a>
                            </figuer>
                            <div class='blog__body'>
                                <span class='blog__cate'><?=$blog['blogCategory']?></span>
                                <div class="blog__title"><a href="blogView.php?blogID=<?=$blog['blogID']?>"><?=$blog['blogTitle']?></a></div>
                                <span class='author'><?=$blog['blogContents']?></span>
                                <div class='blog__info'>
                                    <span class='author'><a href='#'><?=$blog['blogAuthor']?></a></span>
                                    <span class='date'><?=date('Y-m-d', $blog['blogRegTime'])?></span>
                                    <span class='modify'><a href='blogModify.php?blogID=<?=$blog['blogID']?>'>수정</a></span>
                                    <span class='delete'><a href='blogRemove.php?blogID=<?=$blog['blogID']?>'>삭제</a></span>
                                </div>
                            </div>
                        </article>
               <?php } ?>

                    </div>
                    <div class="blog__btn">
                        <a href="blogWrite.php">글쓰기</a>
                    </div>
                    <div class="board__pages">
                        <ul>
<?php 
   include "blogPage.php";
?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        </main>
            <!-- footer -->
            <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>