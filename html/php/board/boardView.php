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
    <title>게시판 보기</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/php/board/boardView.php 
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
                <h3 class="section__title">게시판 보기</h3>
                <p class="section__desc">자유게시판의 글을 볼 수 있습니다.</p>
                <div class="board__inner">
                    <div class="board__table">
                        <table>
                            <colgroup>
                                <col style="width: 30%">
                                <col style="width: 70%">
                            </colgroup>
                            <tbody>
<?php
    $boardID = $_GET['boardID'];

    // echo $boardID; //화면에 누른게시글 아이디값이 나오는지 확인

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myMember m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";
    $result = $connect -> query($sql);

    $sql = "UPDATE myBoard SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    $connect -> query($sql);

    if($result){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($boardInfo);
        // echo "<pre>";

        echo "<tr><th>제목</th><td class='left'>".$boardInfo['boardTitle']."</td></tr>";
        echo "<tr><th>글쓴이</th><td class='left'>".$boardInfo['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td class='left'>".$boardInfo['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='left height'>".$boardInfo['boardContents']."</td></tr>";
    }

?>
                            </tbody>
                        </table>
                    </div>
                    <div class="board__btn">
                        <a href="board.php">목록보기</a>
                        <a href="boardRemove.php?boardID=<?=$boardID?>" onclick="return noticeRemove();">삭제하기</a>
                        <a href="boardModify.php?boardID=<?=$boardID?>">수정하기</a>
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

    <script>
        function noticeRemove() {
            let notice = confirm("정말 삭제하시겠습니까?","");
            return notice;
        }
    </script>
</body>
</html>