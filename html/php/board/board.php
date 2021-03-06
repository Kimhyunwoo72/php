<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판</title>

        <!-- 주소
        ekfvoddl0321.dothome.co.kr/php/board/board.php 
        richclub9.dothome.co.kr/php/board/board.php 
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
                <h3 class="section__title">자유게시판</h3>
                <p class="section__desc">자유롭게 소통할 수 있는 게시판입니다. 자유롭게 작성해 주세요!</p>
                <div class="board__inner">
                    <div class="board__search">
                        <form action="boradSearch.php" name="boradSearch" method="get">
                            <fieldset>
                                <legend class="ir_so">게시판 검색 영역</legend>
                                <div>
                                    <input type="search" name="searchKeyword" class="search-form" placeholder="검색어를 입력하세요." aria-label="search" required>
                                </div>
                                <div>
                                    <select name="searchOption" class="search-option">
                                        <option value="title">제목</option>
                                        <option value="content">내용</option>
                                        <option value="name">등록자</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="sumit" class="search-btn">검색</button>
                                </div>
                                <div>
                                    <a href="boardWrite.php" class="search-btn black">글쓰기</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="board__table">
                        <table class="hover">
                            <thead>
                                <colgroup>
                                    <col style="width: 5%";>
                                    <col>
                                    <col style="width: 10%";>
                                    <col style="width: 12%";>
                                    <col style="width: 7%";>
                                </colgroup>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    //b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView
    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    }else {
        $page = 1;
    }

    // 게시판 불러올 갯수
    $pageView = 10;
    $pageLimit = ($pageView * $page) - $pageView;

    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m
     ON(m.memberID = b.memberID) ORDER by boardID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;

        if($count > 0) {
            for($i=1; $i<=$count; $i++){
                $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$boardInfo['boardID']."</td>";
                echo "<td class='left'><a href='boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
                echo "<td>".$boardInfo['youName']."</td>";
                echo "<td>".date('Y-m-d', $boardInfo['regTime'])."</td>";
                echo "<td>".$boardInfo['boardView']."</td>";
                echo "</tr>";
            }
        }
    }
?>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>전기차 충전소 자리 많이 비는 곳!!</td>
                                    <td>2022-03-04</td>
                                    <td>혀누</td>
                                    <td>10</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="board__pages">
                        <ul>
<?php 
   include "boardPage.php";
?>
                            
                            <!-- 
                            <li><a href="#">처음으로</a></li>
                            <li><a href="#">이전</a></li>
                            <li class="active"><a href="board.php?page=1">1</a></li>
                            <li><a href="board.php?page=2">2</a></li>
                            <li><a href="board.php?page=3">3</a></li>
                            <li><a href="board.php?page=4">4</a></li>
                            <li><a href="board.php?page=5">5</a></li>
                            <li><a href="board.php?page=6">6</a></li>
                            <li><a href="board.php?page=7">다음</a></li>
                            <li><a href="#">마지막으로</a></li> 
                            -->
                        
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