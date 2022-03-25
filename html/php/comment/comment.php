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
    <title>댓글</title>

    <!-- 주소
        ekfvoddl0321.dothome.co.kr/php/comment/comment.php 
    -->

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
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
        <!-- section1 -->
        <section id="card-type">
            <div class="container">
                <h2>귀여운 고양이들</h2>
                <p>프론트앤드 개발자를 준비하는 현우의 사이트입니다.<br>
                    Gmarket Sans Light 22px 150% #67778A </p>
                <div class="card-inner">
                    <!-- article1 -->
                    <article class="card">
                        <div class="card_img1 card_img"></div>
                        <h3 class="section__title">고양이는</h3>
                        <p>고양이(Felis catus)는 포유류 식육목 고양이과의 동물이다.<br>
                             정착지에 나와 살던 것을 인간이 키우기 시작한 것이 오늘날 고양이의 유래다.<br><br>
                        </p>
                        <div class="card_more">더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </div>
                    </article>
                    <!-- //article1 -->

                    <!-- article2 -->
                    <article class="card">
                        <div class="card_img2 card_img"></div>
                        <h3 class="section__title">고양이 습성</h3>
                        <p>무리 생활을 하지는 않지만 자신보다 높은 서열의 고양이의 식사 순서를 지키는 등 서열 의식이 갖춰져 있다. 고양이 울음소리의 사회적 역할은 침입자에 대한 것과 나머지 세 가지 소리의 종류에 따라 다르다.</p>
                        <div class="card_more"> 더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </div>
                    </article>
                    <!-- //article2 -->

                    <!-- article3 -->
                    <article class="card">
                        <div class="card_img3 card_img"></div>
                        <h3 class="section__title">고양이의 생활</h3>
                        <p>암고양이는 주기적으로 발정을 하는데, 만일 발정할 동안에 교미를 하지 못하면 다음 발정은 더 빨리 오게 된다. 대체로 이 같은 발정은 암고양이가 임신을 하기 전까지 계속된다.</p>
                        <div class="card_more">더 자세히 보기
                            <svg width="52" height="8" viewBox="0 0 52 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M51.3536 4.35355C51.5488 4.15829 51.5488 3.84171 51.3536 3.64645L48.1716 0.464466C47.9763 0.269204 47.6597 0.269204 47.4645 0.464466C47.2692 0.659728 47.2692 0.976311 47.4645 1.17157L50.2929 4L47.4645 6.82843C47.2692 7.02369 47.2692 7.34027 47.4645 7.53553C47.6597 7.7308 47.9763 7.7308 48.1716 7.53553L51.3536 4.35355ZM0 4.5H51V3.5H0V4.5Z" fill="#5B5B5B"/>
                            </svg>
                        </div>
                    </article>
                    <!-- //article3 -->
                </div>
            </div>
        </section>
        <!-- //section1 -->

        <!-- section2 -->
        <section id="comment-type" class="section center purple">
            <h2 class="section__title">댓글 작성하기</h2>
            <p class="section__desc">누구나 댓글을 달 수 있습니다. 회원가입 하지 않아도 되므로, 자유롭게 글을 써주세요! 100글자이내로 써주세요!</p>
            <div class="comment__inner">
                <div class="comment__form">
                    <form action="commentSave.php" method="post" name="comment">
                        <fieldset>
                            <legend class="ir_so">댓글쓰기</legend>
                            <div class="comment__wrap">
                                <div>
                                    <label for="youName" class="ir_so">이름</label>
                                    <input type="text" name="youName" id="youName" class="input__style" placeholder="이름" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youText" class="ir_so">댓글 쓰기</label>
                                    <input type="text" name="youText" id="youText" class="input__style width" placeholder="하고싶은 얘기 자유롭게 써주세요!" autocomplete="off" required>
                                </div>
                                <button class="comment_btn" type="submit" value="댓글 작성하기">작성하기</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="comment__list">
                    <!-- <div class="list">
                        <p class="comment__desc">안녕하세요! 고양이가 이쁘네요!안녕하세요! 고양이가 이쁘네요!안녕하세요! 고양이가 이쁘네요!안녕하세요! 고양이가 이쁘네요!</p>
                        <div class="comment__icon">
                            <span class="face"><img src="../assets/img/face.png" alt="이미지"></span>
                            <span class="name">쓴사람</span>
                            <span class="data">2022-03-11</span>
                        </div>
                    </div> -->
                    <?php
                        $sql = "SELECT * FROM myComment";
                        $result = $connect -> query($sql);
                        // $commentInfo = $result -> fetch_array(MYSQLI_ASSOC);

                        // echo "<pre>";
                        // var_dump($commentInfo);
                        // echo "<pre>";

    if($result) {
        $count = $result -> num_rows;
        
        if($count > 0) {
            for($i=1; $i<=$count; $i++){
                $commentInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<div class='list'>";
                echo "<p class='comment__desc'>".$commentInfo['youText']."</td>";
                echo "<div class='comment__icon'>";
                echo "<span class='face'><img src='../assets/img/face.png' alt='이미지'></span>";
                echo "<span class='name'>".$commentInfo['youName']."</span>";
                echo "<span class='data'>".date('Y-m-d', $commentInfo['regTime'])."</span>";
                echo "</div>";
                echo "</div>";
            }
        }
    }
    ?>

                </div>
            </div>
        </section>
        <!-- //section2 -->
        <!-- //card-type -->
    </main>
    
    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
    <script>
            document.querySelector(".header_hidden").addEventListener("click",()=>{
            document.querySelector(".member2").classList.toggle("hid")
            document.querySelector(".menu").classList.toggle("hid")
            })
    </script>
</body>
</html>