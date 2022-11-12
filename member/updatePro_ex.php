<?php

 $member_ex_level =  $_Request["member_ex_level"];
 $member_ex_type =  $_Request["member_ex_type"];
 $member_num=$_Request["member_num"];
 
 require_once("../lib/MYDB.php");  
 $pdo = db_connect();   
 
 try{
    $pdo->beginTransaction();   
    $sql = " update interlaw88.member set member_ex_level=?, member_ex_type=? where member_num=? ";
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $member_ex_level, PDO::PARAM_STR);
    $stmh->bindValue(2, $member_ex_type, PDO::PARAM_STR);
    $stmh->bindValue(3, $member_num, PDO::PARAM_STR);
    
    $stmh->execute();
    $pdo->commit(); 
    

 header("Location:http://interlaw88.cafe24.com/member/view_16.php");
  } catch (PDOException $Exception) {
        $pdo->rollBack();
        print "오류: ".$Exception->getMessage();
  }
?>