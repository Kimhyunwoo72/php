<!-- //  ekfvoddl0321.dothome.co.kr/php/create/cleateBrog.php  -->
<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myBrog (";
    $sql .= "brogID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "brogTitle varchar(255) NOT NULL,";
    $sql .= "brogContents longtext NOT NULL,";
    $sql .= "brogCategory varchar(20) NOT NULL,";
    $sql .= "brogAuthor varchar(20) NOT NULL,";
    $sql .= "brogView int(10) NOT NULL,";
    $sql .= "brogLike int(10) NOT NULL,";
    $sql .= "brogImgFile varchar(100) DEFAULT NULL,";
    $sql .= "brogImgSize varchar(100) DEFAULT NULL,";
    $sql .= "brogDelete int(10) NOT NULL,";
    $sql .= "brogRegTime int(20) NOT NULL,";
    $sql .= "brogModTime int(20) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (brogID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);
    
    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>