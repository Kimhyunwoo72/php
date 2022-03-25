<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>

        <!--  주소
        ekfvoddl0321.dothome.co.kr/php/login/login.php 
    -->
    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->

</head>
<body>
       
    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section class="join-type gray">
            <div class="member-form">
                <h3 class="mb30">로그인</h3>

                <form action="loginSave.php" name="login" method="post">
                    <fieldset>
                        <legend class="ir_so">회원가입 입력폼</legend>
                        <div class="join-box">
                            <div>
                                <label for="youEmail">이메일</label>
                                <input type="email" id="youEmail" name="youEmail" placeholder="sample@naver.com"
                                    autocomplete="off" autofocus required>
                            </div>
                            <div>
                                <label for="youPass">비밀번호</label>
                                <input type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호를 적어주세요." autocomplete="off" required>
                            </div>
                        </div>
                        <button id="joinBtn" class="join-submit" type="submit">로그인</button>
                    </fieldset>
                </form>

            </div>
        </section>
    </main>
    <!-- contents -->

    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->

</body>
</html>