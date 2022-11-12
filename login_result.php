 <?php
 session_start();

 $id = $_REQUEST["id"];    
 $pw = $_REQUEST["pass"];
 
 if($id=="interlaw88" && $pw=="mulchi11@"){  
     $_SESSION["userid"]="interlaw88";
       $_SESSION["name"]="관리자";

  header("Location:http://interlaw88.cafe24.com/index.php");
 exit;
 
 }

 require_once("../lib/MYDB.php");
 $pdo = db_connect();

 try{
  $sql = "select * from interlaw88.manager where id=?";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(1,$id,PDO::PARAM_STR);
  $stmh->execute();
    
  $count = $stmh->rowCount(); 
 } catch (PDOException $Exception) {
   print "오류: ".$Exception->getMessage();
 }
 $row=$stmh->fetch(PDO::FETCH_ASSOC); 

  if($count<1) { 
 ?>

   <script>
     alert("아이디가 틀립니다!");    
     history.back();  //이전 페이지로 이동
   </script>
       
 <?php
  } elseif($pw!=$row["pass"]){    //비밀번호가 같지 않을 때 
 ?> 

  <script>    
   alert("비밀번호가 틀립니다!");
    history.back();
 </script>

 <?php
  } else{   //아이디와 비밀번호가 일치하는 경우
       $_SESSION["userid"]=$row["id"];
       $_SESSION["name"]=$row["name"];

  header("Location:http://interlaw88.cafe24.com/index.php");
  exit;
  }
 ?>
