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
                        <form action="blogSearch.php" method="get">
                            <fieldset>
                                <legend class="ir_so">검색 영역</legend>
                                <input type="search" name="blogSearch" id="blogSearch" class="search" placeholder="검색어를 입력해 주세요!"> 
                                <label for="blogSearch" class="ir_so">검색</label>
                                <button class="button"></button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="blog__btn">
                        <a href="blogWrite.php">글쓰기</a>
                        </div>
                    <div class="blog__cont">
<?php
   $pageView = 10;
   $pageLimit = ($pageView * $page) - $pageView;

// $sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', '1', '$regTime')";
$sql = "SELECT * FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC";
    // $sql = "SELECT b.memberID, b.blogID, b.blogTitle, m.youName, b.blogRegTime, b.blogContents, b.blogCategory, b.blogAuthor, b.blogView, b.blogImgFile, b.blogImgSize, b.blogRegTime FROM myBlog b JOIN myMember m
    //  ON(m.memberID = b.memberID) ORDER by blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    // 정보가 뜨는지 확인
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
    if($result) {
        $count = $result -> num_rows;

        if($count > 0) {
            
            $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);

            // for($i=1; $i<=$count; $i++){
            //     $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);

            //     echo "<article class='blog'>";
            //     echo "<figuer class='blog__header'>";
            //     echo "<img src='../assets/img/blog/".$blogInfo['blogImgFile']."' alt='블로그 이미지'>";
            //     echo "</figuer>";
            //     echo "<div class='blog__body'>";
            //     echo "<span class='blog__cate'>HTML</span>";
            //     echo "<div class='blog__title'>".$blogInfo['blogTitle']."</div>";
            //     echo "<div class='blog__desc'>".$blogInfo['blogContents']."</div>";
            //     echo "<div class='blog__info'>";
            //     echo "<span class='author'><a href='#'>".$blogInfo['youName']."</a></span>";
            //     echo "<span class='date'>".$blogInfo['blogRegTime']."</span>";
            //     echo "<span class='modify'><a href='#'>수정</a></span>";
            //     echo "<span class='delete'><a href='#'>삭제</a></span>";
            //     echo "</div>";
            //     echo "</div>";
            //     echo "</article>";
            // }
        }
    }
?>
<!-- 작성된 게시판 불러오기 -->
            <?php foreach($result as $blog){ ?>
                      <article class='blog'>
                        <figuer class='blog__header'>
                            <img src='../assets/img/blog/<?=$blog['blogImgFile']?>' alt='블로그 이미지'>
                            </figuer>
                            <div class='blog__body'>
                                <span class='blog__cate'>HTML</span>
                                <div class='blog__title'><?=$blog['blogCategory']?></div>
                                <div class='blog__desc'><?=$blog['blogTitle']?></div>
                                <span class='author'><?=$blog['blogContents']?></span>
                                <div class='blog__info'>
                                    <span class='author'><a href='#'><?=$blog['blogAuthor']?></a></span>
                                    <span class='date'><?=date('Y-m-d', $blog['blogRegTime'])?></span>
                                    <span class='modify'><a href='#'>수정</a></span>
                                    <span class='delete'><a href='#'>삭제</a></span>
                                </div>
                            </div>
                        </article>
               <?php } ?>


                    <!-- <article class='blog'>
                            <figuer class='blog__header'>
                                <img src='../assets/img/blog_img/blog_img.jpeg' alt='블로그 이미지'>
                            </figuer>
                            <div class='blog__body'>
                                <span class='blog__cate'>HTML</span>
                                <div class='blog__title'>&lt;wbr&gt; 태그는 줄바꿈 할 위치를 정의할 때 사용합니다.</div>
                                <div class='blog__desc'>&lt;wbr&gt; 태그의 사용은 제한적입니다.</div>
                                <div class='blog__info'>
                                    <span class='author'><a href='#'>황상연</a></span>
                                    <span class='date'>2022-02-02 21:03</span>
                                    <span class='modify'><a href='#'>수정</a></span>
                                    <span class='delete'><a href='#'>삭제</a></span>
                                </div>
                            </div>
                        </article> -->
                    </div>
                    <div class="blog__pages">
                        <ul>
                            <li><a href="#">&lt;&lt;</a></li>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><a href="board.php?page=1">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">&gt;</a></li>
                            <li><a href="#">&gt;&gt;</a></li> 
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