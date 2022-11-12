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
  window.open("check_id.php?id="+document.member_form.id.value,"IDcheck", "left=200,top=200,width=200,height=60,scrollbars=no, resizable=yes");                                                          
}

function check_input()
{

 
  if(document.member_form.pass.value != document.member_form.pass_confirm.value)
{
   alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요."); 
   document.member_form.pass.focus();
   document.member_form.pass.select();
 return;
}

  document.member_form.submit();
}

function reset_form() //취소버튼 눌렀을때
{

   document.member_form.name.value = "";

   document.member_form.id.focus();

  return;
}

</script>
</head>
<?php
    $id = $_REQUEST["id"];

   require_once("../lib/MYDB.php"); 
   $pdo = db_connect(); 
   
   try{
      $sql = "select * from interlaw88.member where memeber_num = ? ";
      $stmh = $pdo->prepare($sql); 
      $stmh->bindValue(1,$id,PDO::PARAM_STR); 
      $stmh->execute(); 
      $count = $stmh->rowCount();              
      } catch (PDOException $Exception) {
        print "오류: ".$Exception->getMessage();
      }
   if($count<1){  
      print "검색결과가 없습니다.<br>";
   }else{
  while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
    $hp=explode("-", $row["hp"]);
    $hp2=$hp[1]; 
    $hp3=$hp[2];

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
   <?php include "../lib/left_menu.php"; ?>
 </div>
 </div> <!-- end of col1 -->    
 
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
          <td><input type="text" name= "member_id" required></td>
        </tr>
        <tr>
          <th>최초 등록일</th>
		  <td><echo>자동생성</td>	
        </tr>
        <tr>
          <th>최종 등록일</th>
          <td><echo>자동생성</td>

        </tr>
        <tr>
          <th> 담당 전문가<font color=red> * </font></th>
          <td><select type="text" name="manager_id" required> 
 <?php  // 관리자 ID 목록 출력
             while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                    ?>
                <option><?=$row['manager_id']?>&nbsp'<?=$row['manager_name']?>'</option>
            <?php } ?>
            </select></td>

        </tr>
        <tr>
          <th>이름</th>
          <td><input type="text" name="name" required></td>

        </tr>
        <tr>
          <th>성별</th>
          <td><input type="radio" name="gender" id="F" value="여">여
       <input type="radio" name="gender" id='M' value="남">남</td>

        </tr>
        <tr>
          <th>생년월일</th>
          <td><select name="birth1" required>
          <option value='선택하세요'>선택하세요</option>
          <option value='1999'>1999</option> 
          <option value='1998'>1998</option>
          <option value='1997'>1997</option>
          <option value='1996'>1996</option>
          <option value='1995'>1995</option>
          <option value='1994'>1994</option>
          <option value='1993'>1993</option> 
          <option value='1992'>1992</option>
          <option value='1991'>1991</option>
          <option value='1990'>1990</option>
          <option value='1989'>1989</option>
          <option value='1988'>1988</option>
          <option value='1987'>1987</option> 
          <option value='1986'>1986</option>
          <option value='1985'>1985</option>
          <option value='1984'>1984</option>
          <option value='1983'>1983</option>
          <option value='1982'>1982</option>
          <option value='1981'>1981</option>
          <option value='1980'>1980</option>
          <option value='1979'>1979</option>
          <option value='1978'>1978</option>
          <option value='1977'>1977</option> 
          <option value='1976'>1976</option>
          <option value='1975'>1975</option>
          <option value='1974'>1974</option>
          <option value='1973'>1973</option>
          <option value='1972'>1972</option>          
          <option value='1971'>1971</option>
          <option value='1970'>1970</option>
          <option value='1969'>1969</option>
          <option value='1968'>1968</option>
          <option value='1967'>1967</option> 
          <option value='1966'>1966</option>
          <option value='1965'>1965</option>
          <option value='1964'>1964</option>
          <option value='1963'>1963</option>
          <option value='1962'>1962</option>
          <option value='1961'>1961</option>
          <option value='1960'>1960</option>
          <option value='1959'>1959</option>
          <option value='1958'>1958</option>
          <option value='1957'>1957</option> 
          <option value='1956'>1956</option>
          <option value='1955'>1955</option>
          <option value='1954'>1954</option>
          <option value='1953'>1953</option>
          <option value='1952'>1952</option>     
          <option value='1951'>1951</option>
          <option value='1950'>1950</option>
          <option value='1949'>1949</option>
          <option value='1948'>1948</option>
          <option value='1947'>1947</option> 
          <option value='1946'>1946</option>
          <option value='1945'>1945</option>
          <option value='1944'>1944</option>
          <option value='1943'>1943</option>
          <option value='1942'>1942</option>
          <option value='1941'>1941</option>
          <option value='1940'>1940</option>
          <option value='1939'>1939</option>
          <option value='1938'>1938</option>
          <option value='1937'>1937</option> 
          <option value='1936'>1936</option>
          <option value='1935'>1935</option>
          <option value='1934'>1934</option>
          <option value='1933'>1933</option>
          <option value='1932'>1932</option>               
        </select>

       <select name="birth2" required>
           <option value='선택하세요'>선택하세요</option>
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
           <option value='선택하세요'>선택하세요</option>
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
       </select></td>

        </tr>   
        <tr>
          <th>학력</th>
          <td>   <select name="edu" required>
          <option value='선택하세요'>선택하세요</option>
          <option value="무학">무학</option> 
          <option value="무학">초졸</option> 
          <option value="무학">중졸</option> 
          <option value="무학">대졸</option> 
          <option value="무학">대학원이상</option> 
          </select></td>

        </tr> 
        <tr>
          <th>장애유무<font color=red> * </font></th>
          <td><input type="radio" name="disability" value="유" >유
                       <input type="radio" name="disability" value="무">무</td>

        </tr> 
        <tr>
          <th>무</th>
          <td>
			   <input type="radio" name="major_disability" value="지체">지체
               <input type="radio" name="major_disability" value="뇌병변">뇌병변
               <input type="radio" name="major_disability" value="시각">시각
               <input type="radio" name="major_disability" value="청각">청각
               <input type="radio" name="major_disability" value="언어">언어
               <input type="radio" name="major_disability" value="안면">안면
               <input type="radio" name="major_disability" value="호흡기">호흡기
               <input type="radio" name="major_disability" value="심장">심장
               <input type="radio" name="major_disability" value="신장">신장
               <input type="radio" name="major_disability" value="간">간
               <input type="radio" name="major_disability" value="장류/요루">장류/요루
               <input type="radio" name="major_disability" value="간질">간질
               <input type="radio" name="major_disability" value="지적">지적
               <input type="radio" name="major_disability" value="정신발달">정신발달</td>

        </tr> 
        <tr>
          <th>장애유형</th>
          <td>			   
               <input type="checkbox" name="mdt_retard" value="1">지체
               <input type="checkbox" name="mdt_Brain_lesion" value="1">뇌병변
               <input type="checkbox" name="mdt_see" value="1">시각
               <input type="checkbox" name="mdt_hear" value="1">청각
               <input type="checkbox" name="mdt_language" value="1">언어
               <input type="checkbox" name="mdt_face" value="1">안면
               <input type="checkbox" name="mdt_respiratory" value="1">호흡기
               <input type="checkbox" name="mdt_heart" value="1">심장
               <input type="checkbox" name="mdt_kidney" value="1">신장
               <input type="checkbox" name="mdt_liver" value="1">간
               <input type="checkbox" name="mdt_stoma_urostomy" value="1">장류/요루
               <input type="checkbox" name="mdt_epilepsy" value="1">간질
               <input type="checkbox" name="mdt_mental" value="1">지적
               <input type="checkbox" name="mdt_development" value="1">정신발달</td></td>

        </tr> 
        <tr>
          <th>지체유형<font color=red> * </font></th>
          <td> 
       		<input type="radio" name="delay_type" value="비척수">비척수
    	    <input type="radio" name="delay_type" value="경수">경수
  		    <input type="radio" name="delay_type" value="흉요수">흉요수
  		    <input type="radio" name="delay_type" value="해당없음">해당없음</td>

        </tr> 
        <tr>
          <th> 주요질환 <font color=red> * </font></th>
          <td> 
          	<input type="radio" name="major_disease" value="치매" >치매  
       	    <input type="radio" name="major_disease" value="고혈압" >고혈압
       	    <input type="radio" name="major_disease" value="당뇨" >당뇨
            <input type="radio" name="major_disease" value="관절염" >관절염
            <input type="radio" name="major_disease" value="뇌혈관질환" >뇌혈관질환
            <input type="radio" name="major_disease" value="심혈관질환" >심혈관질환
			<input type="radio" name="major_disease" value="암" >암
			<input type="radio" name="major_disease" value="전립선질환">전립선질환
			<input type="radio" name="major_disease" value="기타">기타
&nbsp&nbsp&nbsp기타 내용: <input  type="text" name="major_disease_ect" ></td>

        </tr>      
      </tbody>
        </table>
            <table>
      <caption><h2>재활사정1</h2></caption>

      <tbody>
        <tr>
          <th>발병시기</th>
          <td><select name="mr1_onset1" required><br>
          <option value='선택하세요'>선택하세요</option>
          <option value='2021'>2021</option>
          <option value='2020'>2020</option>
          <option value='2019'>2019</option>
          <option value='2018'>2018</option>
          <option value='2017'>2017</option>
          <option value='2016'>2016</option>
          <option value='2015'>2015</option>
          <option value='2014'>2014</option>
          <option value='2013'>2013</option>
          <option value='2012'>2012</option>
          <option value='2011'>2011</option>
          <option value='2010'>2010</option>        
          <option value='2009'>2009</option> 
          <option value='2008'>2008</option>
          <option value='2007'>2007</option>
          <option value='2006'>2006</option>
          <option value='2005'>2005</option>
          <option value='2004'>2004</option>
          <option value='2003'>2003</option> 
          <option value='2002'>2002</option>
          <option value='2001'>2001</option>
          <option value='2000'>2000</option>
          <option value='1999'>1999</option> 
          <option value='1998'>1998</option>
          <option value='1997'>1997</option>
          <option value='1996'>1996</option>
          <option value='1995'>1995</option>
          <option value='1994'>1994</option>
          <option value='1993'>1993</option> 
          <option value='1992'>1992</option>
          <option value='1991'>1991</option>
          <option value='1990'>1990</option>
          <option value='1989'>1989</option>
          <option value='1988'>1988</option>
          <option value='1987'>1987</option> 
          <option value='1986'>1986</option>
          <option value='1985'>1985</option>
          <option value='1984'>1984</option>
          <option value='1983'>1983</option>
          <option value='1982'>1982</option>
          <option value='1981'>1981</option>
          <option value='1980'>1980</option>
          <option value='1979'>1979</option>
          <option value='1978'>1978</option>
          <option value='1977'>1977</option> 
          <option value='1976'>1976</option>
          <option value='1975'>1975</option>
          <option value='1974'>1974</option>
          <option value='1973'>1973</option>
          <option value='1972'>1972</option>          
          <option value='1971'>1971</option>
          <option value='1970'>1970</option>
          <option value='1969'>1969</option>
          <option value='1968'>1968</option>
          <option value='1967'>1967</option> 
          <option value='1966'>1966</option>
          <option value='1965'>1965</option>
          <option value='1964'>1964</option>
          <option value='1963'>1963</option>
          <option value='1962'>1962</option>
          <option value='1961'>1961</option>
          <option value='1960'>1960</option>
          <option value='1959'>1959</option>
          <option value='1958'>1958</option>
          <option value='1957'>1957</option> 
          <option value='1956'>1956</option>
          <option value='1955'>1955</option>
          <option value='1954'>1954</option>
          <option value='1953'>1953</option>
          <option value='1952'>1952</option>     
          <option value='1951'>1951</option>
          <option value='1950'>1950</option>           
        </select>

       <select name="mr1_onset2" required>
           <option value="선택하세요">선택하세요</option>
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
       
       </td>
        </tr>
        <tr>
          <th>통증</th>
		  <td><echo>부위: <input type="text" name="mr1_pain_point" > 
		  정도: <input type="text" name="mr1_pain_level"></td>	
        </tr>
        <tr>
          <th>복용중인 약물<font color=red> * </font></th>
          <td><echo><input type="text" name="mr1_medicine"  style="text-align:center; width:230px; height:40px;" required ></td>

        </tr>
        <tr>
          <th> 재활 보조기구 <font color=red> * </font></th>
          <td>보장구: <input type="text" name="mr1_helpingtool"  >
          보행기구: <input type="text" name="mr1_pedestal"  >
          기타기구: <input type="text" name="mr1_extra_instrument" ></td>

        </tr>
        <tr>
          <th>주 간병인</th>
          <td><select name="mr1_caregiver" required><br>
          <option value='배우자'>배우자</option>
          <option value='부모'>부모</option>
          <option value='자녀(며느리/사위포함)'>자녀(며느리/사위포함)</option>
          <option value='형제/자매'>형제/자매</option>
          <option value='조부모'>조부모</option>
          <option value='손자/손녀'>손자/손녀</option>
          <option value='친척/인척'>친척/인척</option>
          <option value='친구'>친구</option>
          <option value='이웃'>이웃</option>
          <option value='(유료)가정봉사원/간병인/활동보조인'>(유료)가정봉사원/간병인/활동보조인</option>
          <option value='(무료)가정봉사원/간병인/활동보조인'>(무료)가정봉사원/간병인/활동보조인</option>
          <option value='가원봉사자'>가원봉사자</option>
          <option value='기타'>기타</option>
          </select></td>

        </tr>
        <tr>
          <th>가족 특이사항</th>
          <td><select name="mr1_family" required><br>
          <option value='독거'>독거</option>
          <option value='부부만 거주'>부부만 거주</option>
          <option value='조손가정'>조손가정</option>
          <option value='결혼이민자'>결혼이민자</option>
          <option value='친부모가족'>친부모가족</option>
          <option value='폭력가족'>폭력가족</option>
          <option value='정신지체(부모)'>정신지체(부모)</option>
          <option value='정신질환가족'>정신질환가족</option>
          <option value='배우자 외 동거가족 있음'>배우자 외 동거가족 있음</option>
          <option value='기타'>기타</option>
          </select>
          </td>

          
      </tbody>
        </table>
        
                    <table>
      <caption><h2>재활사정2</h2></caption>

      <tbody>
        <tr>
          <th>의식</th>
          <td><select name="mr2_consciousness" required>
          <option value='명료'>명료</option>
          <option value='혼돈'>혼돈</option>
          <option value='혼수'>혼수</option>         
        </select></td>
        </tr>
        <tr>
          <th>의사소통</th>
		  <td><select name="mr2_communication" required><br>
          <option value='가능'>가능</option>
          <option value='다소 어려움'>다소 어려움</option>
          <option value='불가능'>불가능              
        </select> </td>	
        </tr>
        <tr>
          <th>호흡상태</th>
          <td>
          <select name="mr2_breath" required><br>
          <option value='정상'>정상</option>
          <option value='기침'>기침</option>
          <option value='호흡곤란'>호흡곤란</option> 
          <option value='기관지 삽관'>기관지 삽관</option> 
          <option value='기타'>기타</option>                
        </select>
          </td>

        </tr>
        <tr>
          <th>영양상태</th>
          <td><select name="mr2_nutrition" required><br>
          <option value='양호'>양호</option>
          <option value='식단부족'>식단부족</option>
          <option value='삼키기 기능 장애'>삼키기 기능 장애</option> 
          <option value='기타'>기타</option>                
        </select></td>

        </tr>
        <tr>
          <th>연하장애<font color=red> * </font></th>
          <td><select name="mr2_dysphagia" required><br>
          <option value='있음'>있음</option>
          <option value='없음'>없음</option>             
        </select></td>

        </tr>
        <tr>
          <th>신체활동수준</th>
          <td><select name="mr2_active_level" required><br>
          <option value='상'>상</option>
          <option value='중'>중</option>      
          <option value='하'>하</option>         
        </select>
          </td>
		</tr>
		        <tr>
          <th>기능수준<font color=red> * </font></th>
          <td><select name="mr2_function_level" required><br>
          <option value='1'>눕기</option> 
          <option value='2'>앉기</option>      
          <option value='3'>서기</option>       
    
        </select>
          </td>
		</tr>
		        <tr>
          <th>근력 <font color=red> * </font></th>
          <td>우상지근력: <li style="display:inline"><select name="mr2_right_arm" required><br>
        <option value='정상'>정상</option>
        <option value='약화'>약화</option>      
        <option value='마비'>마비</option>            
        </select>
   </li> 
  
        좌상지근력: <li style="display:inline"><select name="mr2_left_arm" required><br>
        <option value='정상'>정상</option>
        <option value='약화'>약화</option>      
        <option value='마비'>마비</option>            
        </select>
   </li> 

        우하지근력: <li style="display:inline"><select name="mr2_right_leg" required><br>
        <option value='정상'>정상</option>
        <option value='약화'>약화</option>      
        <option value='마비'>마비</option>            
        </select>
   </li> 

      좌하지근력: <li style="display:inline"><select name="mr2_left_leg" required><br>
        <option value='정상'>정상</option>
        <option value='약화'>약화</option>      
        <option value='마비'>마비</option>            
        </select>
   </li> 
          </td>
		</tr>
		        <tr>
          <th>운동기능정도</th>
          <td><select name="mr2_movement_level" required><br>
        <option value='와상상태(거동불능)'>와상상태(거동불능)</option>
        <option value='앉아있을 수 있음'>앉아있을 수 있음</option>      
        <option value='침대/휠체어 이동 가능'>침대/휠체어 이동 가능</option>   
        <option value='기립가능'>기립가능</option>
        <option value='의존적실내보행'>의존적실내보행</option>      
        <option value='실외보행'>실외보행</option>         
        </select>
          </td>
		</tr>
          		        <tr>
          <th> 영양상태평가결과<font color=red> * </font><br>(Mini Nutritional Assessment, MNA)</th>
          <td>
      <li> 
       1.&nbsp일반사항평가:&nbsp&nbsp<input type="text" name="mr2_mna_1" required>점&nbsp<br>
       2.&nbsp식사섭취평가:&nbsp<input type="text" name="mr2_mna_2" required>점&nbsp<br>
       3.&nbsp자가진단:&nbsp<input type="text" name="mr2_mna_3" required>점&nbsp<br>
       4.&nbsp신체계측평가:&nbsp<input type="text" name="mr2_mna_4" required>점&nbsp<br>
       5.&nbsp총점:&nbsp<input type="text" name="mr2_mna_5" required>점&nbsp</li>
          </td>
		</tr>		        <tr>
          <th>골다공증평가결과<font color=red> * </font><br> (Fracture Risk Assessment System, FRAX) </th>
          <td><li> 1. T-score&nbsp<input type="text" name="mr2_FRAX_tscore" required>점&nbsp<br>
       2.총&nbsp<input type="text" name="mr2_FRAX_total" required>점&nbsp</li>
          </td>
		</tr>		        <tr>
          <th>노인체력검사결과<font color=red> * </font><br>(Senior Fitness Test, SFT)  </th>
          <td> <li> 1.30s동안앉았다일어서기:&nbsp<input type="text" name="mr2_SFT_1" required>회&nbsp<br>
       2.244m왕복걷기:&nbsp<input type="text" name="mr2_SFT_2" required>초&nbsp</li>  
          </td>
		</tr>		        <tr>
          <th>운동기능평가결과<font color=red> * </font><br></th>
          <td><li> <input type="text" name="mr2_MAS4" required>점&nbsp</li> 
          </td>
		</tr>
      </tbody>
        </table>
        
                          <table>
      <caption><h2>기본검진</h2></caption>


      <tbody>
        <tr>
          <th>혈압<font color=red> * </font></th>
          <td><input type="text" name="mbe_blood_pressure" required>mmHG&nbsp</td>
        </tr>
        <tr>
          <th>맥박</th>
		  <td><input type="text" name="mbe_pulse" required>BPM</td>	
        </tr>
              <tr>
          <th>호흡</th>
		  <td><input type="text" name="mbe_breath" required>mmHG&nbsp</td>	
        </tr>
  
        <tr>
          <th>체온</th>
          <td>
          <input type="text" name="mbe_temperature" required>°C&nbsp
          </td>
        </tr>
        
               <tr>
          <th>체중</th>
          <td>
     	  <input type="text" name="mbe_weight" required>kg
          </td>
        </tr>
                <tr>
          <th>신장</th>
          <td>
          <input type="text" name="mbe_height" required>cm
          </td>
        </tr>
                <tr>
          <th>BMI<font color=red> * </font></th>
          <td>
        <input type="text" name="mbe_bmi" required>
          </td>
        </tr>
                <tr>
          <th>혈당<font color=red> * </font></th>
          <td>
          <li> 식전:&nbsp<input type="text" name="mbe_blood_glucose_before" required>mg/dl&nbsp<br>
      식후:&nbsp<input type="text" name="mbe_blood_glucose_after" required>mg/dl&nbsp</li>
          </td>
        </tr>
                <tr>
          <th>CHOL<font color=red> * </font></th>
          <td>
         <input type="text" name="mbe_chol" required>
          </td>
        </tr>  
                <tr>
          <th>TG<font color=red> * </font></th>
          <td>
         <input type="text" name="mbe_tg" required>
          </td>
        </tr> 
                <tr>
          <th>검진부서</th>
          <td>
	<input type="text" name="mbe_department" required>
          </td>
        </tr> 
        
      </tbody>
        </table>
        
                  <table>
      <caption><h2>일상생활기능평가</h2></caption>

      <tbody>
        <tr>
          <th >검사표</th>
          <td width="120">전혀못함</td>
          <td width="120">많은 도움 필요</td>
          <td width="120">중간정도도움필요</td>
          <td width="120">경미한도움필요</td>
          <td width="120">완전히독립적으로수행</td>
        
        </tr>
        <tr>
          <th>개인위생</th>
		  <td><input type="radio" name="mdl_hygiene" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_hygiene" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_hygiene" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_hygiene" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_hygiene" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>목욕</th>
		  <td><input type="radio" name="mdl_bath" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_bath" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_bath" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_bath" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_bath" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>식사</th>
		  <td><input type="radio" name="mdl_meal" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_meal" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_meal" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_meal" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_meal" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>용변</th>
		  <td><input type="radio" name="mdl_toilet" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_toilet" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_toilet" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_toilet" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_toilet" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>계단오르내리기</th>
		  <td><input type="radio" name="mdl_stair" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_stair" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_stair" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_stair" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_stair" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>착탈의</th>
		  <td><input type="radio" name="mdl_clothe" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_clothe" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_clothe" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_clothe" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_clothe" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>대변조절</th>
		  <td><input type="radio" name="mdl_poo_control" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_poo_control" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_poo_control" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_poo_control" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_poo_control" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>소변조절</th>
		  <td><input type="radio" name="mdl_urine_control" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_urine_control" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_urine_control" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_urine_control" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_urine_control" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>보행</th>
		  <td><input type="radio" name="mdl_walk" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_walk" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_walk" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_walk" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_walk" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>휠체어이동</th>
		  <td><input type="radio" name="mdl_wheelchair" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_wheelchair" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_wheelchair" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_wheelchair" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_wheelchair" id="F" value="1"></td>	 	
        </tr>
                <tr>
          <th>이동</th>
		  <td><input type="radio" name="mdl_movement" id="F" value="1"></td>
		  <td><input type="radio" name="mdl_movement" id="F" value="1"></td>
		   <td><input type="radio" name="mdl_movement" id="F" value="1"></td>	
		    <td><input type="radio" name="mdl_movement" id="F" value="1"></td>	
		     <td><input type="radio" name="mdl_movement" id="F" value="1"></td>	 	
        </tr>
     
      </tbody>
        </table>
        
             </body>
   
 </ul>

</table>
    </li>
 </ul>

 <div id="button"><a href="#"><img src="../img/button_save.gif" 
                                   onclick="check_input()"></a>&nbsp;&nbsp;
<a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>

 </div> 
 </form>
 </div> 
 </div> 
 </div> 
 
 </body>
 </html>
