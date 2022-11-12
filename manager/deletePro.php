<?php
    $num = $_REQUEST["num"];

 
        require_once("../lib/MYDB.php");
        $pdo = db_connect(); 
        
        try{
            $pdo->beginTransaction(); 
            $sql="delete from interlaw88.manager where manager_num = ?";
            $stmh = $pdo-> prepare($sql);
            $stmh->bindValue(1,$num,PDO::PARAM_STR);
            $stmh->execute();       
            $pdo->commit();
    header("location:http://interlaw88.cafe24.com/manager/manager_list.php");
        }  catch (PDOException $Exception) {
                print "오류:".$Exception->getMessage();
        }            
        ?>