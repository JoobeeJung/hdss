<?php
  session_start();
  if(isset($_SESSION["userid"])){
            if($_SESSION["userid"]=="interlaw88"){
               
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/common.css"> 
<link rel="stylesheet" type="text/css" href="../css/memberForm.css">
<script> 
function check_id() 
{
  window.open("check_id.php?id="+document.manager_form.id.value,"IDcheck", "left=200,top=200,width=200,height=60,scrollbars=no, resizable=yes");                                                              
}

function check_input()
{
   if(!document.manager_form.id1.value ) 
  {
    alert("아이디를 입력하세요"); 
    document.manager_form.id1.focus(); 
    return;
  }
  
   if(document.manager_form.pw.value != document.manager_form.pw_confirm.value)
   {
     alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요."); 
     document.manager_form.pw.focus();
     document.manager_form.pw.select();
     return;
   }
    if(!document.manager_form.name.value || !document.manager_form.birth1.value|| !document.manager_form.birth2.value || !document.manager_form.birth3.value || !document.manager_form.age.value || !document.manager_form.field.value 
              || !document.manager_form.center.value || !document.manager_form.dept.value || !document.manager_form.team.value || !document.manager_form.CBR.value || !document.manager_form.clinic.value )   {
    alert("필수 항목을 모두 입력해주세요"); 
    document.manager_form.name.focus(); 
    return;
  }
  if(confirm("등록하시겠습니까?")){
   document.manager_form.submit();
  }
  return;
 }

function reset_form() //취소버튼 눌렀을때
{
    if(confirm("취소하시겠습니까?")){

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
   <?php include "../lib/left_menu1.php"; ?>
 </div>
 </div> <!-- end of col1 -->

 <div id="col2">
 <form name="manager_form" method="post" action="insertPro.php"> 
 <div id="title">
     <img src="../img/title_join.gif">
 </div> <!-- end of title -->

 <div id="form_join">
 <div id="join1">
   <ul>
   <li> 아이디</li>
   <li> 비밀번호 </li>
   <li> 비밀번호 확인</li>
 <!-- <li> 관리자번호</li>-->
   <li> 이름</li>
   <li> 성별</li>
   <li> 생년월일</li>
   <li> 나이</li>
   <li> 직군</li>
   <li> 보건소명 </li>
   <li> 소속부서 </li>
   <li> 소속팀 </li>
   <li> CBR사업 수행 경력 </li>
   <li> 임상경력 </li>
   </ul>
 </div>

  <div id="join2">
 <ul>
  <li><div id="id1"><input type="text" name="id1"required>@
          <!--<input type="text" name="id2" id="id2"required>-->
          <select name="id2" id="id2" required>
              <option value="korea.kr">korea.kr</option>
              <option value="naver.com">naver.com</option>
              <option value="gmail.com">gamil.com</option>
              <option value="daum.net">daum.net</option>
      <!--        <option value="">직접입력</option>-->
          </select>
      </div>
    
    
<!--      <div id="id2"><a href="#"><img src="../img/check_id.gif" 
      onclick="check_id()"></a></div>
-->
  </li>
   <li><input type="password" name="pw" value="0000" required></li>
   <li><input type="password" name="pw_confirm" value="0000" required></li>   
   <li><input type="text" name="name" required ></li>
   <li>여<input type="radio" name="gender" value="여" >
       남<input type="radio" name="gender" value="남"></li>
   <li>
        <select name="birth1" required>
          <option value='1999'>1999</option> 
          <option value='1998'>1998</option>
          <option value='1997'>1997</option>
          <option value='1996'>1996</option>
          <option value='1995'>1995</option>
          <option value='1994'>1994</option>
          <option value='1999'>1993</option> 
          <option value='1998'>1992</option>
          <option value='1997'>1991</option>
          <option value='1996'>1990</option>
          <option value='1995'>1989</option>
          <option value='1994'>1988</option>
          <option value='1999'>1987</option> 
          <option value='1998'>1986</option>
          <option value='1997'>1985</option>
          <option value='1996'>1984</option>
          <option value='1995'>1983</option>
          <option value='1994'>1982</option>
          <option value='1997'>1981</option>
          <option value='1996'>1980</option>
          <option value='1995'>1979</option>
          <option value='1994'>1978</option>
          <option value='1999'>1977</option> 
          <option value='1998'>1976</option>
          <option value='1997'>1975</option>
          <option value='1996'>1974</option>
          <option value='1995'>1973</option>
          <option value='1994'>1972</option>          
          <option value='1997'>1971</option>
          <option value='1996'>1970</option>
          <option value='1995'>1979</option>
          <option value='1994'>1978</option>
          <option value='1999'>1977</option> 
          <option value='1998'>1976</option>
          <option value='1997'>1975</option>
          <option value='1996'>1974</option>
          <option value='1995'>1973</option>
          <option value='1994'>1972</option>
          <option value='1997'>1971</option>
          <option value='1996'>1970</option>
          <option value='1995'>1969</option>
          <option value='1994'>1968</option>
          <option value='1999'>1967</option> 
          <option value='1998'>1966</option>
          <option value='1997'>1965</option>
          <option value='1996'>1964</option>
          <option value='1995'>1963</option>
          <option value='1994'>1962</option>     
          <option value='1997'>1961</option>
          <option value='1996'>1960</option>
          <option value='1995'>1959</option>
          <option value='1994'>1958</option>
          <option value='1999'>1957</option> 
          <option value='1998'>1956</option>
          <option value='1997'>1955</option>
          <option value='1996'>1954</option>
          <option value='1995'>1953</option>
          <option value='1994'>1952</option>
          <option value='1997'>1951</option>
          <option value='1996'>1950</option>
          <option value='1995'>1949</option>
          <option value='1994'>1948</option>
          <option value='1999'>1947</option> 
          <option value='1998'>1946</option>
          <option value='1997'>1945</option>
          <option value='1996'>1944</option>
          <option value='1995'>1943</option>
          <option value='1994'>1942</option>               
        </select>

       <select name="birth2" required>
           <option value="01">01</option>
           <option value="02">02</option>
           <option value="03">03</option>
           <option value="04">04</option>
           <option value="05">05</option>
           <option value="06">06</option>
           <option value="07">07</option>
           <option value="08">08</option>
           <option value="09">09</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
       </select>
       
        <select name="birth3" required>
           <option value="01">01</option>
           <option value="02">02</option>
           <option value="03">03</option>
           <option value="04">04</option>
           <option value="05">05</option>
           <option value="06">06</option>
           <option value="07">07</option>
           <option value="08">08</option>
           <option value="09">09</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
           <option value="14">14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           <option value="!8">18</option>
           <option value="19">19</option>
           <option value="20">20</option>
           <option value="21">21</option>
           <option value="22">22</option>
           <option value="21">21</option>
           <option value="22">22</option>
           <option value="23">23</option>
           <option value="24">24</option>
           <option value="25">25</option>
           <option value="26">26</option>
           <option value="27">27</option>
           <option value="28">28</option>
           <option value="29">29</option>
           <option value="30">30</option>
           <option value="31">31</option>
       </select>
   <li><input type="number" name="age" size="2" required>세</li>
   <li><input type="text" name="field" required></li>
   <li><input type="text" name="center" required></li>
   <li><input type="text" name="dept" required></li>   
   <li><input type="text" name="team" required></li>
   <li><input type="text" name="CBR" required></li>
   <li><input type="text" name="clinic" required></li>

 </ul>
 </div>
 <div id="button"><a href="#"><img src="../img/button_save.gif" 
                                   onclick="check_input()" ></a>&nbsp;&nbsp;
<a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
</div>
</form>
</div> <!-- end of col2 -->
</div> <!-- end of content -->
</div> <!-- end of wrap -->
 
</body>
</html>
 <?php }
else{ ?>

<script>
    alert("최고 관리자 계정으로만 접속할 수 있습니다!");
    history.back();
</script>

 <?php }} else{?>

<script>
    alert("최고 관리자 계정으로만 접속할 수 있습니다!");
    history.back();
</script>

<?php } ?>