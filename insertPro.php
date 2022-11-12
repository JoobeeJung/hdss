<?php
 $id = $_REQUEST["id"];
 $pass = $_REQUEST["pass"];
 $name = $_REQUEST["name"];
 $position = $_REQUEST["position"];
 $hp1 = $_REQUEST["hp1"];
 $hp2 = $_REQUEST["hp2"];
 $hp3 = $_REQUEST["hp3"];
 $hp = $hp1."-".$hp2."-".$hp3; 

 require_once("../lib/MYDB.php");  
 $pdo = db_connect();   
 
 try{
    $pdo->beginTransaction();   
    $sql = "insert into interlaw88.manager VALUES(?, ?, ?, ?, ?, now())"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $id, PDO::PARAM_STR);  
    $stmh->bindValue(2, $pass, PDO::PARAM_STR);   
    $stmh->bindValue(3, $name, PDO::PARAM_STR);
    $stmh->bindValue(4, $position, PDO::PARAM_STR);
    $stmh->bindValue(5, $hp, PDO::PARAM_STR);
    $stmh->bindValue(6, $regist_day, PDO::PARAM_STR);

    $stmh->execute();
    $pdo->commit(); 
    
    header("Location:http://interlaw88.cafe24.com/index.php");
  } catch (PDOException $Exception) {
        $pdo->rollBack();
        print "오류: ".$Exception->getMessage();
  }
?>
