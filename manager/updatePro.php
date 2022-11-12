 <?php
 $num = $_REQUEST["num"];
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
 $num= $_REQUEST["num"];
 $id = $id1."@".$id2; 
 $birth = $birth1."-".$birth2."-".$birth3;
  $regist_day=date("Y-m-d H:i:s");    
  
  require_once("../lib/MYDB.php");  
 $pdo = db_connect(); 

 try{
    $pdo->beginTransaction();   
    $sql = " update interlaw88.manager set manager_name=?, manager_field=?, manager_center=?, manager_dept=?, manager_team=?, manager_CBR=?, manager_clinic=?, manager_regist_day=?, manager_pw=? where manager_num = ?"; 
    $stmh = $pdo->prepare($sql);  
    $stmh->bindValue(1, $name, PDO::PARAM_STR);
    $stmh->bindValue(2, $field, PDO::PARAM_STR);
    $stmh->bindValue(3, $center, PDO::PARAM_STR);
    $stmh->bindValue(4, $dept, PDO::PARAM_STR);
    $stmh->bindValue(5, $team, PDO::PARAM_STR);
    $stmh->bindValue(6, $CBR, PDO::PARAM_STR);
    $stmh->bindValue(7, $clinic, PDO::PARAM_STR);
    $stmh->bindValue(8, $regist_day, PDO::PARAM_STR);
    $stmh->bindValue(9, $pw, PDO::PARAM_STR);
    $stmh->bindValue(10, $num, PDO::PARAM_STR);
    
    $stmh->execute();
    $pdo->commit(); 
    
   header("Location:http://interlaw88.cafe24.com/index.php");
  } catch (PDOException $Exception) {
         $pdo->rollBack();
       print "오류: ".$Exception->getMessage();
  }
 ?>
