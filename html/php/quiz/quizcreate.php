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
    <title>퀴즈 만들기</title>

    <!-- ekfvoddl0321.dothome.co.kr/php/quiz/quizCreate.php  -->

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
        <section id="quiz-type" class="section center gray">
            <div class="container">
                <h3 class="section__title">퀴즈 만들기</h3>
                <p class="section__desc">
                    문제를 만들고 같이 공유하고, 같이 공부 할 할 수 있습니다.<br>
                    문제에 대한 저작권은 본인한테 있으며, 만약 다른 부분을 참고 하였다면, 출처 부탁드립니다.
                </p>
                <div class="quiz__inner">
                   <div class="quiz__create">
                       <form action="quizCreateSave.php" name="quizCreate" method="post">
                       <fieldset>
                           <legend class="ir_so">문제 만들기 영역</legend>
                           <div>
                               <label for="quizSubject"></label>
                               <select name="quizSubject" id="quizSubject">
                                   <option value="javascript">자바스크립트</option>
                                   <option value="jquery">제이쿼리</option>
                                   <option value="html">HTML</option>
                                   <option value="css">CSS</option>
                                </select>
                           </div>
                           <div>
                               <label for="quizAsk">문제</label>
                               <textarea name="quizAsk" id="quizAsk" placeholder="문제를 작성해주세요!" require></textarea>
                           </div>
                           <div>
                                <label for="quizDesc">문제에 대한 보충 설명</label>
                                <textarea name="quizDesc" id="quizDesc" placeholder="문제에 대한 해설이나, 보기, 이미지 추가시 이용해 주세요!"></textarea>
                           </div>
                           <div>
                                <label for="quizChoice1">보기1</label>
                                <input type="text" id="quizChoice1" name="quizChoice1" placeholder="보기 1번을 작성해주세요!" required>
                                <label for="quizChoice2">보기2</label>
                                <input type="text" id="quizChoice2" name="quizChoice2" placeholder="보기 2번을 작성해주세요!" required>
                                <label for="quizChoice3">보기3</label>
                                <input type="text" id="quizChoice3" name="quizChoice3" placeholder="보기 3번을 작성해주세요!" required>
                                <label for="quizChoice4">보기4</label>
                                <input type="text" id="quizChoice4" name="quizChoice4" placeholder="보기 4번을 작성해주세요!" required>
                            </div>
                           <div>
                               <label for="quizAnswer">정답</label>
                               <select name="quizAnswer" id="quizAnswer">
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                               </select>
                           </div>
                           <div>
                               <label for="quizComment">문제에 대한 해설</label>
                               <textarea name="quizComment" id="quizComment"></textarea>
                           </div>
                           <div>
                               <label for="quizSource">출처표시(출처가 있으면 작성해주세요!)</label>
                               <textarea name="quizSource" id="quizSource" placeholder="만약 다른 문제를 인용하였다면, 출처 표시 부탁드립니다."></textarea>
                           </div>
                           <div class="quiz__btn">
                               <button type="submit" class="green right">저장하기</button>
                           </div>
                       </fieldset>
                    </form>
                   </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->


    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
</body>
</html>