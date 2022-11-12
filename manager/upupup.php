<meta charset="UTF-8">
<?php
  session_start();
   
  if(isset($_SESSION["member_id"])){
#$file_dir = 'C:\xampp\htdocs\editor\popup\upload\\'; 
    require_once("../lib/MYDB.php");
     $num=$_GET["num"];
   $pdo = db_connect();
?>

  <?php
   $sql = "select * from interlaw88.member where member_num = ?";
     $stmh = $pdo->prepare($sql);       
     $stmh->execute(); 
     
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $member_id     = $row["member_id"];
     $member_name     = $row["member_name"];
     
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/common.css"> 
<link rel="stylesheet" type="text/css" href="../css/memberFormTable.css">

<script> 
function check_input()
{
    if(!document.member_form.name.value)   {
    alert("필수 항목을 모두 입력해주세요"); 
    document.member_form.name.focus(); 
    return;
  }
  if(confirm("등록하시겠습니까?")){
   document.member_form.submit();
  }
  return;
 }

function reset_form() //취소버튼 눌렀을때
{
   document.member_form.name.value = "";
   document.member_form.age.value = "";
   document.member_form.id.focus();

  return;
}
</script>

</head>
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
   <?php include "../lib/left_menu.php"; ?>
 </div>
 </div> <!-- end of col1 -->

 <div id="col2">
 <form name="member_form" method="post" action="insertPro.php"> 
 <div id="title">
    <h1> 대상자 신규 등록</h1>
 </div> <!-- end of title -->

<br>
<div id="info_all">
<div id="ilbanjungbo">
   <style>
      table {
        width: 100%;
      }
      table, th, td {
        border: 1px solid #bcbcbc;
        border-collapse: collapse;
      }
        th, td {
    border-bottom: 1px solid #444444;
    padding: 8px;
  }
    </style>
    <script>
document.getElementById('now_date').valueAsDate = new Date();
</script>

<body>
    <table>
      <caption><h2>일반정보</h2></caption>

      <tbody>
        <tr>
          <th> 대상자 고유값<font color=red> * </font></th>
          <td><input type="text" name= "member_id" value="<?=$row["member_id"]?>" required></td>
        </tr>
    </tbody>
       </table>
       </body>
       </html>