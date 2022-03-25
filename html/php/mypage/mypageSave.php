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
    <title>Document</title>
</head>
<body>
    <?php
        $youEmail = $_POST['youEmail'];
        $youName = $_POST['youName'];
        $youBirth = $_POST['youBirth'];
        $youPhone = $_POST['youPhone'];
        $youPass = $_POST['youPass'];
        $memberID = $_SESSION['memberID'];
        $memberContents = $connect -> real_escape_string($memberContents);

        // echo $boardID;

        //쿼리문 작성
        $sql = "SELECT memberID FROM myMember WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        if($result){
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            // echo "<pre>";
            // var_dump($memberInfo);
            // echo "</pre>";

            // 아이디 비밀번호 확인
            if($memberInfo['memberID'] == $memberID){

                //수정(쿼리문 작성)
                $sql = "UPDATE myMember SET youEmail = '{$youEmail}', youName = '{$youName}', youBirth = '{$youBirth}', youPhone = '{$youPhone}', youPass = '{$youPass}' WHERE memberID = '{$memberID}'";
                $connect -> query($sql);
            } else {
                echo "오류";
            }
        }

        // 이미지 올리기
        $blogImgFile = $_FILES['blogFile'];
        $blogImgSize = $_FILES['blogFile']['size'];
        $blogImgType = $_FILES['blogFile']['type'];
        $blogImgName = $_FILES['blogFile']['name'];
        $blogImgTmp = $_FILES['blogFile']['tmp_name'];

        $sql = "SELECT * FROM myBlog"
        
        //정보값 들어오는지 확인
        // echo "<pre>";
        // var_dump($blogImgFile);
        // echo "</pre>";
        //이미지 파일명 확인
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg
        
        //이미지 확인 작업 / 이미지 확장자 확인 작업 / 용량 확인(숙제)
        if($fileType == "image"){
            //확장자 확인
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "../assets/img/blog/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                if($blogImgSize > 1000000){
                    echo "<script>alert('이미지 사이즈가 너무 큽니다. 1MB 이하로 올려주세요'); history.back(1);</script>";
                } else {
                    $sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogImgSize, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', '$blogImgName', '$blogImgSize', '1', '$regTime')";
                    Header("Location: blog.php");
                }
            } else {
                echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.'); history.back(1);</script>";
            }
        } else {
            $sql = "INSERT INTO myBlog(memberID, blogTitle, blogContents, blogCategory, blogAuthor, blogView, blogLike, blogImgFile, blogDelete, blogRegTime) VALUES('$memberID', '$blogTitle', '$blogContents', '$blogCate', '$blogAuthor', '$blogView', '$blogLike', 'default.svg', '1', '$regTime')";
            $result = $connect -> query($sql);
            $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);
        }
    ?>
    <script>
        location.href = "../login/login.php";
    </script>
</body>
</html>