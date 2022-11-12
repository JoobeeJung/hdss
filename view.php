
<?php
 session_start(); 
   
 $file_dir = 'C:\www\editor\popup\upload\\'; 
  
 $num=$_REQUEST["num"];
   
 require_once("../lib/MYDB.php");
 $pdo = db_connect();
 
 try{
     $sql = "select * from interlaw88.content where num=?";
     $stmh = $pdo->prepare($sql);  
     $stmh->bindValue(1, $num, PDO::PARAM_STR);      
     $stmh->execute();            
      
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
 	
     $item_num     = $row["num"];
 
     $item_date    = $row["regist_day"];
     $item_date    = substr($item_date,0,10);
     $item_subject = str_replace(" ", "&nbsp;", $row["subject"]);
     $item_content = $row["content"];
     $high_blood_pressure = $row["high_blood_pressure"];
     $diabetes      = $row["diabetes"];
     $hyperlipidemia  = $row["hyperlipidemia"];
     $obesity      = $row["obesity"];
     $osteoporosis      = $row["osteoporosis"];
          

 ?>
 <!DOCTYPE HTML>
 <html>
 <head> 

   <meta charset="utf-8">
 <link  rel="stylesheet" type="text/css" href="../css/common.css">
 <link  rel="stylesheet" type="text/css" href="../css/concert.css">
 <script>
     function del(href) 
     {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
           document.location.href = href;
          }
     }
 </script>
 </head>
 <body>
 <div id="wrap">
  <div id="header"><?php include "../lib/top_login2.php"; ?></div> 
  <div id="menu"><?php include "../lib/top_menu2.php"; ?></div> 
  <div id="content">
     <div id="col1">
	<div id="left_menu"><?php include "../lib/left_menu2.php"; ?></div>
     </div>

      <div id="col2">
          <div id="title"><img src="../img/exercise_menu.jpg"></div>
        <div id="view_comment"> &nbsp;</div>
        <div id="view_title">
	  <div id="view_title1"><?= $item_subject ?></div>
          <div id="view_title2"><?= $item_date ?> </div>	
	</div>
        <div id="view_content">
            <div id="contents" width="100%">
	 <?php print $item_content;?>
           </div>
         </div>
        <div id="view_button">
	  <a href="list.php"><img src="../img/list.png"></a>&nbsp;
  <?php
    if(isset($_SESSION["userid"])) {
	if( $_SESSION["userid"]=="interlaw88" )
        {

  ?>
	<a href="write_form.php?mode=modify&num=<?=$num?>"><img src="../img/modify.png"></a>&nbsp;
	<a href="javascript:del('delete.php?num=<?=$num?>')"><img src="../img/delete.png"></a>&nbsp;
 <?php  	}
 ?>
	<a href="write_form.php"><img src="../img/write.png"></a>
 <?php
	}
  } catch (PDOException $Exception) {
       print "오류: ".$Exception->getMessage();
  }
 ?>
	</div>
	<div class="clear"></div>
     </div> <!-- end of col2 -->
  </div> <!-- end of content -->
 </div> <!-- end of wrap -->
 </body>
 </html>

