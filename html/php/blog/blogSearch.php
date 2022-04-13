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
                    <div class="blog__cont">
<?php
    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }

    function msg($alert){
        echo "<p class='result'>총 ".$alert." 건이 검색되었습니다.</p>";
    }
     // 게시판 불러올 갯수
     $pageView = 5;
     $pageLimit = ($pageView * $page) - $pageView;
 
    $searchKeyword = $_GET['searchKeyword'];
    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    //쿼리문 작성
    $sql = "SELECT * FROM myBlog b JOIN myMember m ON(b.memberID = m.memberID) WHERE b.blogTitle LIKE '%{$searchKeyword}%' ORDER BY blogID DESC" ;
    switch($searchKeyword){
        case 'title':
            $sql .= "WHERE b.blogTitle LIKE '%{$searchKeyword}%' ORDER BY blogID DESC";
            break;
        case 'content':
            $sql .= "WHERE b.blogContents LIKE '%{$searchKeyword}%' ORDER BY blogID DESC";
            break;
        case 'name':
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY blogID DESC";
            break;
    }
    $result = $connect -> query($sql);
    //갯수파악
    if($result){
        $count2 = $result -> num_rows;
        msg($count2);
    }
?>
<!-- 작성된 게시판 불러오기 -->
            <?php foreach($result as $blog){ ?>
                      <article class='blog'>
                        <figuer class='blog__header'>
                            <a href="blogView.php?blogID=<?=$blog['blogID']?>" style="background-image:url(../assets/img/blog/<?=$blog['blogImgFile']?>")></a>
                            </figuer>
                            <div class='blog__body'>
                                <span class='blog__cate'>HTML</span>
                                <div class='blog__title'><?=$blog['blogCategory']?></div>
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
                    <div class="board__pages">
                        <ul>
                        <ul>
<?php
    $sql = "SELECT count(blogID) FROM myBlog";
    $result = $connect -> query($sql);
    //맨위에 있는 count 값 (검색해서 나오는 갯수)
    $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $count2;
    //총 페이지 갯수
    $boardCount = ceil($boardCount/$pageView);
    echo "";

    //현재 페이지를 기준으로 보여주고싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page +$pageCurrent;

    //처음 페이지 초기화(마이너스 값 안나오게)
    if($startPage < 1){
        $startPage = 1;
    }
    //마지막 페이지 초기화(30넘어서 안나오게)
    if($boardCount <= $endPage){
        $endPage = $boardCount;
    }
    //처음으로 페이지
    if($page != 1){
       $prevPage = $page - 1;
        echo "<li><a href='blogSearch.php?page=1&searchKeyword={$searchKeyword}'>처음으로</a></li>";
    }
    //이전 페이지
    if($page != 1){
        $prevPage = $page -1;
        echo "<li><a href='blogSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}'>이전</a></li>";
    }
    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page){
            $active = "active";
        }
        echo "<li class='{$active}'><a href='blogSearch.php?page={$i}&searchKeyword={$searchKeyword}'>{$i}</a></li>";
    }
    //다음 페이지
    if($page != $endPage && $startPage < 1){
        $nextPage = $page +1;
        echo "<li><a href='blogSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}'>다음</a></li>";
    }
    //마지막 페이지
    if($page != $endPage && $startPage < 1){
        $prevPage = $page + 1;
        echo "<li><a href='blogSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}'>마지막으로</a></li>";
    }
?>
                        </ul>
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