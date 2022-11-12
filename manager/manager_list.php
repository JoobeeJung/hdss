<?php
session_start();

 if(isset($_SESSION["userid"])){      
 if($_SESSION["userid"]=="interlaw88"){
    ?>
<html> 
  <head> 
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/common.css" >
  <link rel="stylesheet" type="text/css" href="../css/memberForm.css">
  
  <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

  </head>
    <body>
        
        <?php
 
require_once("../lib/MYDB.php"); 
 $pdo = db_connect();
 
 if(isset($_REQUEST["mode"])) 
    $mode=$_REQUEST["mode"];
 else 
    $mode="";
 if(isset($_REQUEST["search"]))  
   $search=$_REQUEST["search"];
 else 
   $search="";

 if(isset($_REQUEST["find"]))
   $find=$_REQUEST["find"];
  else
   $find="";
 
 if($mode=="search"){
   if(!$search){
 ?>
     <script> 
       alert('검색할 단어를 입력해 주세요!');
       history.back();
     </script>
 <?php
    }
  $sql="select * from interlaw88.manager where $find like '%$search%' order by manager_num desc";
  } else {
  $sql="select * from interlaw88.manager order by manager_num desc";
 }

 try{  
   $stmh = $pdo->query($sql); 
   $count=$stmh->rowCount(); 
 ?>
 <body>
 <div id="wrap"><!--전체 영역-->
   <div id="header">
     <?php include "../lib/top_login2.php"; ?>
   </div>
   <div id="menu">
     <?php include "../lib/top_menu2.php"; ?>
   </div>
   <div id="content">
     <div id="col1">
       <div id="left_menu">
        <?php include "../lib/left_menu1.php"; ?>
       </div> 
     </div> <!-- end of col1 -->
     
     <!--실제 이페이지의 내용-->
    
     <div id="col2">
         <div id="title"><img src="../img/list.jpg"></div>
         <form name="board_form" method="post" action="manager_list.php?mode=search">
             <div id="list_search" >
       <div id="list_search1">&nbsp;▷ 총 <?= $count ?> 개의 결과가 있습니다.</div>
       <div id="list_search2">
           <img src="../img/select_search.gif"></div>
       <div id="list_search3">

       <select name="find">
          <option value='manager_num'>관리자번호</option> 
          <option value='manager_name'>이름</option>
          <option value='manager_center'>보건소명</option>
          <option value='manager_dept'>소속부서</option>
          <option value='manager_team'>소속팀</option>
          <option value='manager_field'>직군</option>
          </select></div> <!-- end of list_search3 -->
       <div id="list_search4"><input type="text"  name="search"></div>
       <div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
     </div> <!-- end of list_search -->
     </form>

      <table width="800" border="1" cellspacing="0" cellpadding="8"  align="center" class="striped" class="centered">
                <thead>
                    <tr>
                    <th width="50">관리자번호</th><th>아이디</th><th>이름</th><th>성별</th><th>보건소명</th><th>소속부서</th><th>소속팀</th><th>직군</th><th>등록일자</th>
    
                </tr>
                </thead>
 <?php  // 글 목록 출력
             while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                    ?> <tbody  align="center">
            <tr>
                <td align="center"><?=$row['manager_num']?></td>
                <td align="left"><a href ="updateForm.php?num=<?=$row['manager_num']?>"><?=$row['manager_id']?></a></td>
                <td align="left"><?=$row['manager_name']?></td>
                <td align="center"><?=$row['manager_gender']?></td>
                <td align="left"><?=$row['manager_center']?></td>
                <td align="left"><?=$row['manager_dept']?></td>
                <td align="left"><?=$row['manager_team']?></td>
                <td align="left"><?=$row['manager_field']?></td>
                <td align="left"><?=substr($row['manager_regist_day'],0,10)?></td>
            </tr>
            <?php } ?>
            </tr>        
                </tbody>
        </table>
            </body>
 
 <?php
  
  } catch (PDOException $Exception) {
    print "오류: ".$Exception->getMessage();
  }  
 ?>
 
 <div id="write_button">
 <?php
  if(isset($_SESSION["userid"]))//로그인했으면
  {
 ?>

    <a href="insertForm.php"><img src="../img/write.png"></a>
 <?php
  }?>
</body>
</html>
 <?php }
else{ ?>

<script>
    alert("최고관리자 계정으로만 접속할 수 있습니다!");
    history.back();
</script>

 <?php }} else{?>

<script>
    alert("최고관리자 계정으로만 접속할 수 있습니다!");
    history.back();
</script>

 <?php } ?>