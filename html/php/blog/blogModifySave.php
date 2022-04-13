<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $blogID = $_POST['blogID'];
        $blogTitle = $_POST['blogTitle'];
        $blogContents = $_POST['blogContents'];
        $youPass = $_POST['youPass'];
        $memberID = $_SESSION['memberID'];
        $blogTitle = $connect -> real_escape_string($blogTitle);
        $blogContents = $connect -> real_escape_string($blogContents);
        $blogCategory = $_POST['blogCategory'];
        $blogImgFile = $_FILES['blogImgFile'];
        $blogImgSize = $_FILES['blogImgFile']['size'];
        $blogImgType = $_FILES['blogImgFile']['type'];
        $blogImgName = $_FILES['blogImgFile']['Name'];
        $blogImgTmp = $_FILES['blogImgFile']['tmp_name'];

         //정보값 들어오는지 확인
                echo "<pre>";
                var_dump($blogImgType);
                echo "</pre>";

        // echo $blogID;

                //이미지 파일명 확인
        $fileTypeExtension = explode("/", $blogImgType);
        $fileType = $fileTypeExtension[0];  //image
        $fileExtension = $fileTypeExtension[1];  //jpeg
        echo "<pre>";
        var_dump($fileTypeExtension);
        echo "</pre>";

        //쿼리문 작성
        $sql = "SELECT * FROM myMember WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        $sql = "SELECT * FROM myBlog WHERE memberID = {$memberID}";
        $result = $connect -> query($sql);

        // if($blogImgSize > 1000000){
        //     echo "<script>alert('이미지 용량이 1메가를 초과합니다. 수정해주세요!'); history.back(1)</script>";
        //     echo "1번";
        //     exit;
        // }

        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "../assets/img/blog/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                //echo "이미지 파일이 맞습니다.";
                $sql = "UPDATE myBlog SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}', blogCategory = '{$blogCategory}', blogImgFile = '{$blogImgName}' WHERE blogID = '{$blogID}'";
                $connect -> query($sql);
                $result = $connect -> query($sql);
                $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);
                echo "2번";
            } else {
                echo "3번";
                echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.'); history.back(1)</script>";
            }
        } else if($blogImgType == "" || $blogImgType == null){
            //echo "이미지를 첨부하지 않았습니다.";
            $sql = "UPDATE myBlog SET blogTitle = '{$blogTitle}', blogContents = '{$blogContents}', blogCategory = '{$blogCategory}', blogImgFile = '{$blogImgName}' WHERE blogID = '{$blogID}'";
            echo "4번";
        } else {
            echo "<script>alert('지원하는 이미지 파일 형식이 아닙니다. jpg, png, gif 사진 파일만 지원 합니다.'); history.back(1)</script>";
            echo "5번";
        }
        Header("Location: blog.php");
        $result = $connect -> query($sql);
        $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

    ?>
    <script>
        location.href = "blog.php";
    </script>
</body>
</html>