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
        richclub9.dothome.co.kr/php/blog/board.php 
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
        <section id="board-type" class="center">
<?php
    $blogID = $_GET['blogID'];
    $sql = "SELECT * FROM myBlog WHERE blogID = {$blogID}";

    $connect -> query($sql);
    $result = $connect -> query($sql);
    
    if($result){
        $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);
        $data2 = nl2br($blogInfo['blogContents']);
    }
?>
<?php foreach($result as $blogInfo){ ?>
        <div class='blog__label' style='background-image:url(../assets/img/blog/<?=$blogInfo['blogImgFile']?>)'>
            <h3 class='section__title'><?=$blogInfo['blogTitle']?></h3>
            <div>
                <span class='author'><a href='#'><?=$blogInfo['blogAuthor']?></a></span>
                <span class='date'><?=date('Y-m-d', $blogInfo['blogRegTime'])?></span><br>
                <span class='modify'><a href='blogModify.php?blogID=<?=$blogInfo['blogID']?>'>수정</a></span>
                <span class='delete'><a href='blogRemove.php?blogID=<?=$blogInfo['blogID']?>'>삭제</a></span>
            </div>
        </div>
        <div class='container'>
            <div class='blog__layout'>
                <div class='blog__left'>
                <h4><?=$blogInfo['blogTitle']?></h4>
                <div><?=$data2?></div>
            </div>
            <div class='blog__right'>
                <div>
                    <iframe src='https://ads-partners.coupang.com/widgets.html?id=572084&template=carousel&trackingCode=AF7093069&subId=&width=300&height=300' width='300' height='300' frameborder='0' scrolling='no' referrerpolicy='unsafe-url'></iframe>
                </div>
                </div>
            </div>
        </div>
<?php } ?>

            <!-- </div> -->
        </section>
    </main>
            <!-- footer -->
            <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>