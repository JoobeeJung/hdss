 <?php
  $id = $_REQUEST["id"];
  $pass = $_REQUEST["pass"];
  $name = $_REQUEST["name"];
  $position = $_REQUEST["position"];
  $hp1 = $_REQUEST["hp1"];
  $hp2 = $_REQUEST["hp2"];
  $hp3 = $_REQUEST["hp3"];
  $hp = $hp1."-".$hp2."-".$hp3;
  $regist_day=date("Y-m-d H:i:s");    
  
  require_once("../lib/MYDB.php");  
 $pdo = db_connect(); 

 try{
    $pdo->beginTransaction();   
    $sql = " update interlaw88.manager set pass=?, name=?,position=?, hp=?, regist_day=? where id = ?"; 
    $stmh = $pdo->prepare($sql);  
    $stmh->bindValue(1, $pass, PDO::PARAM_STR);   
    $stmh->bindValue(2, $name, PDO::PARAM_STR);
    $stmh->bindValue(3, $position, PDO::PARAM_STR);
    $stmh->bindValue(4, $hp, PDO::PARAM_STR);
    $stmh->bindValue(5, $regist_day, PDO::PARAM_STR);
    $stmh->bindValue(6, $id, PDO::PARAM_STR); 

    $stmh->execute();
    $pdo->commit(); 
    
   header("Location:http://interlaw88.cafe24.com/index.php");
  } catch (PDOException $Exception) {
         $pdo->rollBack();
       print "오류: ".$Exception->getMessage();
  }
 ?>
