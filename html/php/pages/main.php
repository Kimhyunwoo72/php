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
    <title>PHP 사이트</title>
<!-- 주소
        ekfvoddl0321.dothome.co.kr/php/pages/main.php 
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
        <section id="sliderType03">
            <div class="slider__wrap">
                <div class="slider__img">
                    <div class="slider__inner">
                        <div class="slider s1">
                            <div class="slideImg_text">
                                <span>DEVELOPER</span>
                                <h2>MY NEW WORK</h2>
                                <p>먼 훗날 되돌아본다면 그렇게 고통스러웠던 이 순간이 모두 잔인할 만큼 아름다운 추억이 되어있을 것이다.</p>
                                <a class="btn1" href="#">자세히 보기</a>
                                <a class="btn2" href="#">사이트 보기</a>
                            </div>    
                            <img src="../assets/img/bg01.jpg" alt="베너"></div>
                        <div class="slider s2">
                            <div class="slideImg_text">
                                <span>DEVELOPER</span>
                                <h2>MY NEW WORK</h2>
                                <p>사람은 힘들 때 엉뚱한 곳에서 답을 찾으려 해. 이미 자신이 경험하고 느끼고 깨달았으며 그에 따른 해답은 본인이 가장 잘 알고 있거늘. </p>
                                <a class="btn1" href="#">자세히 보기</a>
                                <a class="btn2" href="#">사이트 보기</a>
                            </div>
                            <img src="../assets/img/bg02.jpg" alt="베너"></div>
                        <div class="slider s3">
                            <div class="slideImg_text">
                                <span>DEVELOPER</span>
                                <h2>MY NEW WORK</h2>
                                <p>포기하지만 않는다면 시간 차이일 뿐이다!!</p>
                                <a class="btn1" href="#">자세히 보기</a>
                                <a class="btn2" href="#">사이트 보기</a>
                            </div>
                            <img src="../assets/img/bg03.jpg" alt="베너"></div>
                        <div class="slider s4">
                            <div class="slideImg_text">
                                <span>DEVELOPER</span>
                                <h2>MY NEW WORK</h2>
                                <p>나는 인생에서 몇 번이고 반복해서 실패했고 그것이 내가 성공하는 이유이다.</p>
                                <a class="btn1" href="#">자세히 보기</a>
                                <a class="btn2" href="#">사이트 보기</a>
                            </div>
                            <img src="../assets/img/bg04.jpg" alt="베너"></div>
                        <div class="slider s5">
                            <div class="slideImg_text">
                                <span>DEVELOPER</span>
                                <h2>MY NEW WORK</h2>
                                <p>저는 이를 소망하고 희망하여 도달한게 아니라, 노력했습니다.</p>
                                <a class="btn1" href="#">자세히 보기</a>
                                <a class="btn2" href="#">사이트 보기</a>
                            </div>
                            <img src="../assets/img/bg05.jpg" alt="베너"></div>
                        <div class="slider s6">
                            <div class="slideImg_text">
                                <span>DEVELOPER</span>
                                <h2>MY NEW WORK</h2>
                                <p>고개 숙이지 마십시오.
                                    세상을 똑바로 정면으로 바라보십시오.
                                </p>
                                <a class="btn1" href="#">자세히 보기</a>
                                <a class="btn2" href="#">사이트 보기</a>
                            </div>
                            <img src="../assets/img/bg06.jpg" alt="베너">
                        </div>
                    </div>
                    <div class="slider__btn">
                        <a href="javascript:;" class="prev"><img src="../assets/img/prev.svg" alt="이미지"></a>
                        <a href="javascript:;" class="next"><img src="../assets/img/next.svg" alt="이미지"></a>
                    </div>
                    <!-- slider__dot -->
                    <div class="slider__dot"></div>
                </div>
            </div>
        </section>
        <section id="blog-type" class="section center type">
            <div class="container">
                <h3 class="section__title">강의 블로그</h3>
                <p class="section__desc">강의와 관련된 블로그입니다. 다양한 정보를 확인하세요!</p>
                <div class="blog__inner">
                    <div class="blog__cont">
<?php
 if(isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}else {
    $page = 1;
}
    $pageView = 3;
    $pageLimit = ($pageView * $page) - $pageView;
    $sql ="SELECT blogID, blogTitle, blogCategory, blogContents, blogAuthor, blogRegTime, blogImgFile FROM myBlog WHERE blogDelete = 1 ORDER BY blogID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    $blog = $result -> fetch_array(MYSQLI_ASSOC);
?>

<?php foreach($result as $blog){ ?>
                        <article class="blog">
                            <figuer class="blog__header">
                                <a href="../blog/blogView.php?blogID=<?=$blog['blogID']?>" style="background: url(../assets/img/blog/<?=$blog['blogImgFile']?>)"></a>
                            </figuer>
                            <div class="blog__body">
                                <span class="blog__cate"><?=$blog['blogCategory']?></span>
                                <div class="blog__desc"><?=$blog['blogTitle']?></div>
                                <div class="blog__info">
                                    <span class="author"><?=$blog['blogContents']?></span>
                                    <span class="date"><?=date('Y-m-d', $blog['blogRegTime'])?></span>
                                </div>
                            </div>
                        </article>
<?php } ?>

                    </div>
                    <div class="blog__btn">
                        <a href="../blog/blog.php">더 보기</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- //blog type -->

        <!-- 퀴즈 -->



        <section id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <article id="quiz-type" class="section center gray">
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
                                        <!-- layer -->
                    <div class="layer_bg"></div>
                    <div class="layer">
                        <h2></h2>
                        <a href="javascript:;" class="close">닫기</a>
                    </div>
                    </div>
                    <div class="quiz__footer">
                        <div class="quiz__btn">
                            <button class="comment green layer-show">해설보기</button>
                            <button class="next orange right ml10 none">다음 문제</button>
                            <button class="confirm green right">정답 확인</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
        <!-- 퀴즈 -->

        <section id="notoce-type" class="section center">
            <div class="container">
                <h3 class="section__title">새로운 소식</h3>
                <p class="section__desc">강의와 관련된 새로운 소식입니다. 다양한 정보를 확인하세요!</p>
                <div class="notice__inner">
                    <article class="notice">
                        <h4>공지사항</h4>
                        <ul>
<?php

                        $sql = "SELECT * FROM myBoard ORDER BY boardID DESC LIMIT 5";
                        $result = $connect -> query($sql);

                        if($result) {
                            $count = $result -> num_rows;
                        
                            if($count > 0) {
                                for($i=1; $i<=$count; $i++){
                                    $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                                
                                    echo "<li><a href='../board/boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a><span class='time'>".date('Y-m-d', $boardInfo['regTime'])."</span></li>";
                                }
                            }
                        }
?>

                        </ul>
                        <a href="../board/board.php" class="more">더보기</a>
                    </article>
                    <article class="notice">
                        <h4>댓글</h4>
                        <ul>
<?php

                        $sql = "SELECT * FROM myComment ORDER BY commentID DESC LIMIT 5";
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
                                    echo "<li><a href='../comment/comment.php#comment-type'>".$commentInfo['youText']."</a><span class='time'>".date('Y-m-d', $commentInfo['regTime'])."</span></li>";
                                }
                            }
                        }
?>
                            <!-- <li><a href="#">안녕하세요 공지사항 입니다.</a><span class="time">2022-03-02</span></li>
                            <li><a href="#">안녕하세요 공지사항 입니다.</a><span class="time">2022-03-02</span></li>
                            <li><a href="#">안녕하세요 공지사항 입니다.</a><span class="time">2022-03-02</span></li>
                            <li><a href="#">안녕하세요 공지사항 입니다.</a><span class="time">2022-03-02</span></li> -->
                        </ul>
                        <a href="../comment/comment.php" class="more">더보기</a>
                    </article>
                </div>
            </div>
        </section>
        <!-- notoce-type -->

    </main>
    <!-- //main -->

        <!-- footer -->
        <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>        
      
      const sliderWrap = document.querySelector(".slider__wrap");
        const sliderImg = document.querySelector(".slider__img");
        const sliderInner = document.querySelector(".slider__inner");
        const slider = document.querySelectorAll(".slider");
        const sliderBtn = document.querySelector(".slider__btn");
        const sliderBtnPrev = sliderBtn.querySelector(".prev");
        const sliderBtnNext = sliderBtn.querySelector(".next");
        const sliderDot = document.querySelector(".slider__dot");
        let currentIndex = 0;
        let sliderLength = slider.length;               //이미지 갯수
        let sliderFirst = slider[0];                    //첫 번째 이미지
        let sliderLast = slider[sliderLength - 1];      //마지막 이미지
        let cloneFirst = sliderFirst.cloneNode(true);   //첫 번째 이미지 복사
        let cloneLast = sliderLast.cloneNode(true);     //마지막 이미지 복사
        let sliderWidth = sliderImg.offsetWidth;        //이미지 가로 값
        let posInitial = "";
        let dotIndex = "";
        let sliderTimer = "";
        let interval = 2000;
        
        // console.log(slider);
        
        //이미지 복사
        sliderInner.appendChild(cloneFirst);
        sliderInner.insertBefore(cloneLast, sliderFirst);
        
        
        //이미지 움직이기
        function gotoSlider(index) {
            sliderWidth = sliderImg.offsetWidth;  
            sliderInner.style.left = -sliderWidth * (index+1) + "px"
            sliderInner.classList.add("transition");
            currentIndex = index
            dotActive()
        }

            //닷 버튼
            function dotInit(){
            for(let i=0; i<sliderLength; i++){
                dotIndex += "<a href='#' class='dot'></a>";
            }
            dotIndex += "<a href='javascript:;' class='play'></a>";
            dotIndex += "<a href='javascript:;' class='stop show'></a>";

            sliderDot.innerHTML = dotIndex;
            sliderDot.firstElementChild.classList.add("active");
        }
        dotInit()

          // 닷 버튼 활성화
        function dotActive(){

        let dotAll = document.querySelectorAll(".slider__dot .dot");
        
        dotAll.forEach(dot => {             //전체 닷 메뉴 비활성화
            dot.classList.remove("active");
        });
        //마지막 이미지 왔을 때
        if(currentIndex == sliderLength){
            dotAll[0].classList.add("active");
        } else if (currentIndex == -1) {
            dotAll[sliderLength -1].classList.add("active");
        } else {
            dotAll[currentIndex].classList.add("active");
        }
        }

        //오토 플레이
        function autoplay(){
            sliderTimer = setInterval(() => {
                gotoSlider(currentIndex + 1)

            }, 2000);
        }
        autoplay()

        function stopPlay() {
            clearInterval(sliderTimer)
        }

        sliderBtnPrev.addEventListener("click",()=>{
            let prevIndex = currentIndex - 1
            gotoSlider(prevIndex)
        })
        sliderBtnNext.addEventListener("click",()=>{
            let nextIndex = currentIndex + 1
            gotoSlider(nextIndex)
        })

        sliderInner.addEventListener("transitionend", ()=>{
            sliderInner.classList.remove("transition");

            if(currentIndex == -1){
                sliderInner.style.left = -(sliderLength*sliderWidth)+ "px"
                currentIndex = 0    
            }
            if(currentIndex == sliderLength){
                sliderInner.style.left = -(1 * sliderWidth) + "px"
                currentIndex = 0    
            }
        })

        document.querySelectorAll(".slider__dot .dot").forEach((dot, index)=>{  // dot 버튼을 눌렀을때 index값을 gotoSlider에게 전달해준다.
            dot.addEventListener("click", ()=>{
                gotoSlider(index)
            })
        })

        //이미지에 마우스가 가면 플레이 멈추기
        // sliderInner.addEventListener("mouseenter",()=>{
        //     stopPlay()
        // })
        // sliderInner.addEventListener("mouseleave",()=>{
        //     if( document.querySelector(".play").classList.contains("show")){
        //         stopPlay()
        //     }else {
        //         autoplay()
        //     }
        // })

        document.querySelector(".play").addEventListener("click",()=>{
            document.querySelector(".play").classList.remove("show")
            document.querySelector(".stop").classList.add("show")
            autoplay()
        })
        document.querySelector(".stop").addEventListener("click",()=>{
            document.querySelector(".play").classList.add("show")
            document.querySelector(".stop").classList.remove("show")
            stopPlay()
        })

        // 퀴즈

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

                //과목 선택
                $("#quizSubject").change(function(){
                    quizData();
                $(".quiz__selects input").attr("disabled",false)
                $(".quiz__selects input").prop("checked", false);
                $(".quiz__selects input").removeClass("correct");
                $(".quiz__selects input").removeClass("incorrect");
                $(".layer h2").removeClass("layer-show");
                $(".quiz__btn .next").fadeOut();
        })

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

        // layer
        $(".layer-show").click(function () {
            $(".layer").slideDown(300);
            $(".layer_bg").show();
        })
        $(".layer .close").click(function () {
            $(".layer").slideUp(300);
            $(".layer_bg").hide();
        })

        //문제 데이터 가져오기
        function quizData(){
            let quizSubject = $("#quizSubject").val();
            // option:selected

            // alert(quiz__subject)

            $.ajax({
                url: "../quiz/quizinfo.php",
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
            quizData()
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
            })
        })

    </script>
</body>
</html>