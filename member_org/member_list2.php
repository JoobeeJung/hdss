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
  $sql="select * from interlaw88.member where $find like '%$search%' order by member_num desc";
  } else {
  $sql="select * from interlaw88.member order by member_num desc";
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
         <form name="board_form" method="post" action="member_list.php?mode=search">
             <div id="list_search" >
       <div id="list_search1">&nbsp;▷ 총 <?= $count ?> 개의 결과가 있습니다.</div>
       <div id="list_search2">
           <img src="../img/select_search.gif"></div>
       <div id="list_search3">

       <select name="find">
          <option value='member_num'>대상자번호</option> 
          <option value='member_name'>이름</option>
          <option value='member_manager_id'>관리자아이디</option>

          </select></div> <!-- end of list_search3 -->
       <div id="list_search4"><input type="text"  name="search"></div>
       <div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
     </div> <!-- end of list_search -->
     </form>

      <table width="800" border="1" cellspacing="0" cellpadding="8"  align="center" class="striped" class="centered">
                <thead>
                    <tr>
                    <th width="50">관리자아이디</th><th>대상자아이디</th><th>대상자번호</th><th>대상자이름</th><th>주요병명</th>
                <th>운동추천</th><th>영양추천</th><th>수정</th><th>삭제</th>
    
                </tr>
                </thead>
 <?php  // 글 목록 출력
             while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                    ?> <tbody  align="center">
            <tr>
                <td align="center"><?=$row['member_manager_id']?></td>
               <td align="center"><?=$row['member_id']?></td>
                <td align="left"><?=$row['member_num']?></a></td>
                <td align="center"><?=$row['member_name']?></td>
                <td align="center"><?=$row['member_major_disability']?></td>
                <? $num = $row['member_num'] ?>
                <td align="center"><a href ="http://interlaw88.cafe24.com/test/view_16.php?num=<?=$row['member_num']?>">운동추천</a></td>
                <td align="center"> <a href ="javascript:del('deletePro.php?num=<?=$member_num?>')">영양추천</a></td>
                <td align="center"><a href ="upupup.php?num=<?=$row['member_num']?>">수정</a></td>
                <td align="center"><a href ="deletePro.php?num=<?=$row['member_num']?>">삭제</a></td>
          
           
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