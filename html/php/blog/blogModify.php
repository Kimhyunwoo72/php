<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 수정하기</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/php/board/boardModify.php 
    -->

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->

    <style>
        #footer {
            background-color: #f5f5f5;
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
                <h3 class="section__title">게시글 수정하기</h3>
                <p class="section__desc">작성한 글을 수정할 수 있습니다.</p>
                <div class="board__inner">
                    <div class="board__modify">
                        <form action="blogModifySave.php" name="blogModifySave" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="ir_so">게시글 수정 영역</legend>
<?php
    $blogID = $_GET['blogID'];

    // 쿼리문 작성(해당 ID값의 제목, 내용을 출력)
    $sql = "SELECT * FROM myBlog WHERE blogID = {$blogID}";
    $result = $connect -> query($sql);

    if($result) {
        $blogInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<div><label for='blogID'>번호</label><input type='text' name='blogID' id='blogID' value='".$blogInfo[$blogID]."'></div>";
        // echo "<div><label for='blogTitle'>제목</label><input type='text' name='blogTitle' id='blogTitle'>".$blogInfo[$blogTitle]."</div>";
        // echo "<div><label for='blogContents'>내용</label><textarea name='blogContents' id='blogContents' rows='15'>".$blogInfo[$blogContents]."</textarea></div>";
        // echo "<div><label for='blogPass'>비밀번호</label><input type='password' name='blogPass' id='blogPass' placeholder='로그인 비밀번호를 입력해 주세요!'></div>";
        
        echo "<div style='display:none;'><label for='blogID'>번호</label><input type='text' name='blogID' id='blogID' value='".$blogInfo['blogID']."'></div>";
        echo "
            <div>
                <label for='blogCategory'>카테고리</label>
                <select name='blogCategory' id='blogCategory' class='blogCategory'>
                    <option value='javascript'>javascript</option>
                    <option value='jquery'>jquery</option>
                    <option value='html'>html</option>
                    <option value='css'>css</option>
                </select>
            </div>
        ";
        echo "<div><label for='blogTitle'>제목</label><input type='text' name='blogTitle' id='blogTitle' value='".$blogInfo['blogTitle']."'></div>";
        echo "<div><label for='blogContents'>내용</label><textarea name='blogContents' id='blogContents'>".$blogInfo['blogContents']."</textarea></div>";
        echo "<div><label for='blogImgFile'>파일</label><input type='file' name='blogImgFile' id='blogImgFile' placeholder='사진을 넣어주세요. 사진은 jpg, gif, png 파일만 지원이 됩니다.'></div>";
        echo "<div><label for='youPass'>비밀번호</label><input type='password' name='youPass' id='youPass' placeholder='로그인 비밀번호를 입력해주세요!!' autocomplete='off' required></div>";
    }

?>

                                <div class="board__btn">
                                    <button type="submit" value="수정하기">수정하기</button>
                                    <a href="blog.php">목록보기</a>
                                </div>
                            </fieldset>
                        </form>
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