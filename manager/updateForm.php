<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/common.css"> 
<link rel="stylesheet" type="text/css" href="../css/member.css">
<script> 
function check_id()
{
  window.open("check_id.php?id="+document.manager_form.id.value,"IDcheck", "left=200,top=200,width=200,height=60,scrollbars=no, resizable=yes");                                                              
}

function check_input()
{
   if(document.manager_form.pw.value != document.manager_form.pw_confirm.value)
{
   alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요."); 
   document.manager_form.pw.focus();
   document.manager_form.pw.select();
 return;
}
    if(!document.manager_form.name.value || !document.manager_form.field.value 
              || !document.manager_form.center.value || !document.manager_form.dept.value || !document.manager_form.team.value || !document.manager_form.CBR.value || !document.manager_form.clinic.value )   {
    alert("필수 항목을 모두 입력해주세요"); 
    document.manager_form.name.focus(); 
    return;
  }
  if(confirm("변경하시겠습니까?")){
   document.manager_form.submit();
  }
  return;
 }

function reset_form() //취소버튼 눌렀을때
{
   document.manager_form.id1.value = "";
   document.manager_form.id2.value = "";
   document.manager_form.pw.value="";
   document.manager_form.pw_confirm.value="";
   document.manager_form.name.value = "";
   document.manager_form.gender.value = "";
   document.manager_form.birth1.value = "";
   document.manager_form.birth2.value = "";
   document.manager_form.birth3.value = "";
   document.manager_form.age.value = "";   
   document.manager_form.field.value = "";
   document.manager_form.center.value = "";
   document.manager_form.dept.value = "";
   document.manager_form.team.value = "";
   document.manager_form.CBR.value = "";
   document.manager_form.clinic.value = "";   
   document.manager_form.id.focus();
  return;
}
function del(href) 
     {
        if(confirm("삭제하시겠습니까?")) {
           document.location.href = href;
    }
    return;
     }
</script>
</head>
<?php
    $num = $_REQUEST["num"];

   require_once("../lib/MYDB.php"); 
   $pdo = db_connect(); 
   
   try{
      $sql = "select * from interlaw88.manager where manager_num = ? ";
      $stmh = $pdo->prepare($sql); 
      $stmh->bindValue(1,$num,PDO::PARAM_STR); 
      $stmh->execute(); 
      $count = $stmh->rowCount();              
      } catch (PDOException $Exception) {
        print "오류: ".$Exception->getMessage();
      }
   if($count<1){  
      print "검색결과가 없습니다.<br>";
   }else{
  while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
    $birth=explode("-", $row["manager_birth"]);
    $birth1=$birth[0];
    $birth2=$birth[1];
    $birth3=$birth[2];
 ?>

<body> 
     <div id="wrap">
<div id="header">
   <?php include "../lib/top_login2.php"; ?>
</div> <!-- end of header -->

<div id="menu">
  <?php include "../lib/top_menu2.php"; ?>
 </div> <!-- end of menu --> 

 <div id="content">
 <div id="col1">
 <div id="left_menu">   
   <?php include "../lib/left_menu_1.php"; ?>
 </div>
 </div> <!-- end of col1 -->    
 
 <div id="col2">
  <form name="manager_form" method="post" action="updatePro.php?num=<?=$num?>"> 
 <div id="title">
   <img src="../img/title_member_modify.gif">
 </div> <!-- end of title -->
 <div id="form_join">
 <div id="join1">
     <ul>  
   <li> 관리자 번호</li>
   <li> 아이디 </li>
   <li> 비밀번호</li>
   <li> 비밀번호 확인</li>
   <li> 이름</li>
   <li> 직군</li>
   <li> 보건소명</li>
   <li> 소속부서</li>
   <li> 소속팀</li>
   <li> CBR사업 수행 경력</li>
   <li> 임상경력 </li>
   
   
   </ul>
 </div> <!-- end of join -->

 <div id="join2">
   <ul>
   <li><?=$row["manager_num"]?></li>     
   <li><?=$row["manager_id"]?></li>
   <li><input type="password" name="pw" value="<?=$row["manager_pw"]?>" required></li>
   <li><input type="password" name="pw_confirm" value="<?=$row["manager_pw"]?>" required></li>
   <li><input type="text" name="name" value="<?=$row["manager_name"]?>" required></li>
   <li><input type="text" name="field" value="<?=$row["manager_field"]?>" required ></li>
   <li><input type="text" name="center" value="<?=$row["manager_center"]?>" required></li>
   <li><input type="text" name="dept" value="<?=$row["manager_dept"]?>" required></li>   
   <li><input type="text" name="team" value="<?=$row["manager_team"]?>" required></li>
   <li><input type="text" name="CBR" value="<?=$row["manager_CBR"]?>" required></li>
   <li><input type="text" name="clinic" value="<?=$row["manager_clinic"]?>" required></li>
   </ul>
 </div> 
<?php } 
  }?> 
 
 <div id="button"><a href="#"><img src="../img/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
    <a href ="javascript:del('deletePro.php?num=<?=$num?>')"> <img src="../img/button_delete.jpg"></a>
 </div> 
 </form>
 </div> 
 </div> 
 </div> 
 
 </body>
 </html>
