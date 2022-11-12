<?php
 $id1 = $_REQUEST["id1"];
 $id2 = $_REQUEST["id2"];
 $name = $_REQUEST["name"];
 $gender = $_REQUEST["gender"];
 $birth1 = $_REQUEST["birth1"];
 $birth2 = $_REQUEST["birth2"];
 $birth3 = $_REQUEST["birth3"]; 
 $age = $_REQUEST["age"];
 $field = $_REQUEST["field"];
 $center = $_REQUEST["center"];
 $dept = $_REQUEST["dept"];
 $team = $_REQUEST["team"];
 $CBR = $_REQUEST["CBR"];
 $clinic = $_REQUEST["clinic"];
 $pw = $_REQUEST["pw"];
 $id = $id1."@".$id2; 
 $birth = $birth1."-".$birth2."-".$birth3;
 
  if(isset($_REQUEST["mode"]))  //modify_form에서 호출할 경우
    $mode=$_REQUEST["mode"];
 else 
    $mode="";
 
 require_once("../lib/MYDB.php");  
 $pdo = db_connect();   
 
 try{
    $pdo->beginTransaction();   
    $sql = "insert into interlaw88.manager(manager_id, manager_name, manager_gender, manager_birth, manager_age, manager_field, manager_center, manager_dept, manager_team, manager_CBR, manager_clinic, manager_pw,manager_regist_day)";
    $sql.= " VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,now())"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $id, PDO::PARAM_STR);  
    $stmh->bindValue(2, $name, PDO::PARAM_STR);
    $stmh->bindValue(3, $gender, PDO::PARAM_STR);
    $stmh->bindValue(4, $birth, PDO::PARAM_STR);
    $stmh->bindValue(5, $age, PDO::PARAM_STR);
    $stmh->bindValue(6, $field, PDO::PARAM_STR);
    $stmh->bindValue(7, $center, PDO::PARAM_STR);
    $stmh->bindValue(8, $dept, PDO::PARAM_STR);
    $stmh->bindValue(9, $team, PDO::PARAM_STR);
    $stmh->bindValue(10, $CBR, PDO::PARAM_STR);
    $stmh->bindValue(11, $clinic, PDO::PARAM_STR);
    $stmh->bindValue(12, $pw, PDO::PARAM_STR);
    
    $stmh->execute();
    $pdo->commit(); 
    
    header("Location:http://interlaw88.cafe24.com/index.php");
  } catch (PDOException $Exception) {
        $pdo->rollBack();
        print "오류: ".$Exception->getMessage();
  }
?>
