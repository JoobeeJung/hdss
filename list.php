<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/common.css">
<link rel="stylesheet" type="text/css" href="../css/concert.css">
</head>
 
<?php
 
require_once("../lib/MYDB.php"); //db 연동 include로 해도 상관없음
 $pdo = db_connect();
 
 if(isset($_REQUEST["mode"])) //해당 mode라고 하는 변수가 값을 가지고 있어? col2
    $mode=$_REQUEST["mode"]; //검색해서 호출
 else 
    $mode="";
 if(isset($_REQUEST["search"]))   // search 쿼리스트링 값 할당 체크
   $search=$_REQUEST["search"];
 else 
   $search="";

 if(isset($_REQUEST["find"]))//검색영역을 선택하는 것 제목, 내용, 닉네임 이런거
   $find=$_REQUEST["find"];
  else
   $find="";
 
 if($mode=="search"){
   if(!$search){//입력값 없을때
 ?>
     <script> //<!--웹 사이트에서 처리 즉 사용자화면-->
       alert('검색할 단어를 입력해 주세요!');
       history.back();
     </script>
 <?php
    }
  $sql="select * from interlaw88.content where $find like '%$search%' order by num desc";//$find는 겁색영역 필드명 내림차순(일련번호 최근작성순서부터)
  } else {
  $sql="select * from interlaw88.content order by num desc";
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
        <?php include "../lib/left_menu2.php"; ?>
       </div> 
     </div> <!-- end of col1 -->
     
     <!--실제 이페이지의 내용-->
    
     <div id="col2">
         <div id="title"></div>
     <form name="board_form" method="post" action="list.php?mode=search"><!--쿼리 스트링(질의문자열) 이렇게 처리하는페이지-->
     <div id="list_search">
       <div id="list_search1">▷ 총 <?= $count ?> 개의 게시물이 있습니다.</div>
       <div id="list_search2"><img src="../img/select_search.gif"></div>
       <div id="list_search3">
       <select name="find">
          <option value='subject'>운동 제목</option> <!--value값은 db의 필드명-->
          <option value='content'>설명</option>
       </select></div> <!-- end of list_search3 -->
       <div id="list_search4"><input type="text" name="search"></div><!--검색어 입력란-->
       <div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
     </div> <!-- end of list_search -->
     </form>
     <div class="clear"></div>
     
     <div id="list_top_title"><!--greet.css-->
     <ul> <!--unordered list-->
        <li id="list_title1">번호</li>
        <li id="list_title2">운동 제목 </li>
        <li> </li>
        <li id="list_title5"> 작성 일자</li>
      </ul>
     </div> <!-- end of list_top_title -->
     <div id="list_content">
 <?php  // 글 목록 출력
 
 while($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
   $item_num=$row["num"];
   $item_date=$row["regist_day"];
   $item_date=substr($item_date, 0, 10);//하위 문자열 추출 등록된 일 담기고 시분초인데 날짜만 가져오기 첫번쨰 글짜부터 10까지 -> but 0부터 시작함 !
   $item_subject=str_replace(" ", "&nbsp;", $row["subject"]);
 ?>

 <div id="list_item">
   <div id="list_item1"><?= $item_num ?></div>
   <div id="list_item2"><a href="view.php?num=<?=$item_num?>"><?= $item_subject ?></a></div>
   <div id="list_item4"><?= $item_date ?></div>
 </div> <!– end of list_item -->
 
 <?php
   }
  } catch (PDOException $Exception) {
    print "오류: ".$Exception->getMessage();
  }  
 ?>
 
 <div id="write_button">
    <a href="list.php"><img src="../img/list.png"></a>&nbsp;
 <?php
  if(isset($_SESSION["userid"]))//로그인했으면
  {
 ?>

  <a href="write_form.php"><img src="../img/write.png"></a>
 <?php
  }
 ?>
     </div>
    </div>
   </div> <!-- end of col2 -->
  </div> <!-- end of content -->
 </div> <!-- end of wrap -->
 </body>
 </html>



