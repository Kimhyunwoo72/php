<!-- ekfvoddl0321.dothome.co.kr/php/create/createMember_220323.php  -->
    <?php
    include "../connect/connect.php";
    
    $sql = "CREATE TABLE myMember (";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youEmail varchar(40) UNIQUE NULL,";
    $sql .= "youPass varchar(50) NOT NULL,";
    $sql .= "youNickName varchar(50) UNIQUE NULL,";
    $sql .= "youName varchar(20) NOT NULL,";
    $sql .= "youBirth varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(20) NOT NULL,";
    $sql .= "youGender enum('남자','여자') DEFAULT NULL,";
    $sql .= "youPhoto varchar(255) DEFAULT NULL,";
    $sql .= "youIntro varchar(255) DEFAULT NULL,";
    $sql .= "youSite varchar(255) DEFAULT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql); // query란 데이터베이스에 보내는 요청(request) 또는 질문이라고 이해할 수 있습니다.
    // -> (= Object Operator)
    // 객체 범위 내에서 객체에 접근하기 위해서 사용하는 오퍼레이터(운영자)입니다.
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>