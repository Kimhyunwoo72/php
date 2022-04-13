     //닷 버튼
     function dotInit(){
        for(let i=0; i<sliderLength; i++){
            dotIndex += "<a href='#' class='dot'></a>";
        }
        sliderDot.innerHTML = dotIndex;
        sliderDot.firstElementChild.classList.add("active");
    }
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