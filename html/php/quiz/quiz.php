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
    <title>Quiz 사이트</title>
<!-- 주소
        ekfvoddl0321.dothome.co.kr/php/quiz/quiz.php 
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

        <!-- layer -->
    <div class="layer_bg"></div>
    <div class="layer">
        <h2>제목</h2>
        <a href="javascript:;" class="close">닫기</a>
    </div>

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="quiz-type" class="section center gray">
            <div class="container">
                <h3 class="section__title"><span>오늘의 </span> 퀴즈</h3>
                <p class="section__desc">한번 도전해 보세요!!</p>
                <div class="quiz__inner">
                    <div class="quiz__header">
                        <div class="quiz__subject">
                            <label for="quizSubject">과목 선택</label>
                            <select name="quizSubject" id="quizSubject">
                                <option value="javascript">javascript</option>
                                <option value="jquery">jquery</option>
                                <option value="html">html</option>
                                <option value="css">css</option>
                            </select>
                        </div>
                    </div>
                    <div class="quiz__body">
                        <div class="title">
                            <span class="quiz__num"></span>. 
                            <span class="quiz__ask"></span>
                            <div class="quiz__desc">
                                
                            </div>
                        </div>
                        <div class="contents">
                            <div class="quiz__selects">
                                <label for="select1">
                                    <input class="select" type="radio" id="select1" name="select" value="1">
                                    <span class="choice"></span>
                                </label>
                                <label for="select2">
                                    <input class="select" type="radio" id="select2" name="select" value="2">
                                    <span class="choice"></span>
                                </label>
                                <label for="select3">
                                    <input class="select" type="radio" id="select3" name="select" value="3">
                                    <span class="choice"></span>
                                </label>
                                <label for="select4">
                                    <input class="select" type="radio" id="select4" name="select" value="4">
                                    <span class="choice"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="quiz__footer">
                        <div class="quiz__btn">
                            <button class="comment green none layer-show">해설보기</button>
                            <button class="next orange right ml10 none">다음 문제</button>
                            <button class="confirm green right">정답 확인</button>
                        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let quizAnswer = "";
        function quizView(view){
            $(".quiz__num").text(view.quizID);
            $(".quiz__ask").text(view.quizAsk);
            $("#select1 + span").text(view.quizChoice1);
            $("#select2 + span").text(view.quizChoice2);
            $("#select3 + span").text(view.quizChoice3);
            $("#select4 + span").text(view.quizChoice4);
            $(".layer h2").text(view.quizComment);
            quizAnswer = view.quizAnswer;
        }

        //정답 체크
        function quizCheck() {
            let selectCheck = $(".quiz__selects input:checked").val()
            //값을 가져오는지 확인
            // alert(selectCheck)
            
            //정답을 체크 안했으면 체크해달라고 안내
            if(selectCheck == null || selectCheck == ''){
                alert("정답을 체크해주세요!")
                return
            } else {
                $(".quiz__btn .next").fadeIn();
                $(".quiz__btn .comment").fadeIn();
                //정답을 체크 햇으면 맞는지 않맞는지 판단
                if(selectCheck == quizAnswer){
                    //정답
                    $(".quiz__selects #select" + quizAnswer).addClass("correct");
                    $(".quiz__selects input").attr("disabled",true)
                } else {
                    //오답
                    $(".quiz__selects #select" + selectCheck).addClass("incorrect");
                    $(".quiz__selects #select" + quizAnswer).addClass("correct");
                    $(".quiz__selects input").attr("disabled",true)
                }
            }
        }
        
        //문제 데이터 가져오기
        function quizData(){
            let quizSubject = $("#quizSubject").val();
            // option:selected

            // alert(quiz__subject)

            $.ajax({
                url: "quizinfo.php",
                method: "POST",
                data: {"quizSubject": quizSubject},
                dataType: "json",
                success: function(data){
                    console.log(data.quiz);
                    quizView(data.quiz)
                },
                error: function(reqeust, status, error) {
                    console.log(reqeust + reqeust);
                    console.log(status + status);
                    console.log(error + error);
                }
            })
        }
        quizData()

        //과목 선택
        $("#quizSubject").change(function(){
            quizData();
                $(".quiz__selects input").attr("disabled",false)
                $(".quiz__selects input").prop("checked", false);
                $(".quiz__selects input").removeClass("correct");
                $(".quiz__selects input").removeClass("incorrect");
                $(".quiz__btn .next").fadeOut();
                $(".quiz__btn .comment").fadeOut();
        })

        //정답 확인
        $(".quiz__btn .confirm").click(function() {
            //정답을 클릭 했는지 안했는지 판단
            quizCheck();

            //보여지는거 
            // $(".quiz__btn .next").fadeIn();//fadeOut //fadeToggle

            // $(".quiz__btn .next").slideDown();
            // $(".quiz__btn .next").show();

            //해설보기 -> 틀렸을때 나와야함
            // $(".quiz__btn .comment").fadeIn();


            //다음문제 버튼
            $(".quiz__btn .next").click(function(){
                quizData();
                $(".quiz__selects input").attr("disabled",false)
                $(".quiz__selects input").prop("checked", false);
                $(".quiz__selects input").removeClass("correct");
                $(".quiz__selects input").removeClass("incorrect");
                $(".quiz__btn .next").fadeOut();
                $(".quiz__btn .comment").fadeOut();
            })
        })

        // layer
        $(".layer-show").click(function () {
            $(".layer").slideDown(300);
            $(".layer_bg").show();
        })
        $(".layer .close").click(function () {
            $(".layer").slideUp(300);
            $(".layer_bg").hide();
        })
    </script>
</body>
</html>