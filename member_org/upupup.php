<?php
  session_start();
   
  if(isset($_SESSION["userid"])){
  $file_dir = 'C:\xampp\htdocs\editor\popup\upload\\'; 
    require_once("../lib/MYDB.php");
   $pdo = db_connect();
    $num=$_GET["num"];
?>
  <?php
  
     $sql = "select * from interlaw88.manager order by manager_num desc";
     $stmh = $pdo->prepare($sql);       
     $stmh->execute();  
     
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $manager_id     = $row["manager_id"];
     $manager_name     = $row["manager_name"];


    $sql = "select * from interlaw88.member where member_num = '$num'";
     $stmh = $pdo->prepare($sql);       
     $stmh->execute();  
     
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $member_id     = $row["member_id"];
     $member_name     = $row["member_name"];
	 $member_num     = $row["member_num"];
	 $member_first_registration     = $row["member_first_registration"];
	 $member_last_registration     = $row["member_last_registration"];
	 $gender = $row["member_gender"]; 	
	 $edu = $row["member_edu"]; 	
	 $disability = $row["member_disability"];
	 $major_disability =  $row["member_major_disability"];
	 $delay_type =  $row["member_delay_type"];
	 $major_disease =  $row["member_major_disease"];
	 $major_disease_ect =  $row["member_major_disease_ect"];
	 $member_birthdate =  $row["member_birthdate"];
	 $member_birthdatex = explode('-' , $member_birthdate);
	 $member_ex_type =  $row["member_ex_type"];
	 $member_ex_level =  $row["member_ex_level"];
	
	  $sql = "select * from interlaw88.member_disability_type  where member_num = '$num'";
     $stmh = $pdo->prepare($sql);       
     $stmh->execute();  
     
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $mdt_retard     = $row["mdt_retard"];
     $mdt_Brain_lesion     = $row["mdt_Brain_lesion"];
   	 $mdt_see     = $row["mdt_see"];   
     $mdt_hear     = $row["mdt_hear"];
     $mdt_language     = $row["mdt_language"];
     $mdt_face     = $row["mdt_face"];
     $mdt_respiratory     = $row["mdt_respiratory"];
     $mdt_heart     = $row["mdt_heart"];
     $mdt_kidney = $row["mdt_kidney"];
	 $mdt_liver = $row["mdt_liver"];
     $mdt_stoma_urostomy     = $row["mdt_stoma_urostomy"];
     $mdt_epilepsy     = $row["mdt_epilepsy"];
     $mdt_intellectual     = $row["mdt_intellectual"];
     $mdt_mental     = $row["mdt_mental"];
     $mdt_development = $row["mdt_development"];
 	
     
    $sql = "select * from interlaw88.member_rehabilitation1  where member_num = '$num'";
     $stmh = $pdo->prepare($sql);       
     $stmh->execute();  
     
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $mr1_pain_point     = $row["mr1_pain_point"];
     $mr1_pain_level     = $row["mr1_pain_level"];
   	 $mr1_medicine     = $row["mr1_medicine"];   
     $mr1_helpingtool     = $row["mr1_helpingtool"];
     $mr1_pedestal     = $row["mr1_pedestal"];
     $mr1_extra_instrument     = $row["mr1_extra_instrument"];
     $mr1_caregiver     = $row["mr1_caregiver"];
     $mr1_family     = $row["mr1_family"];
     $mr1_onset = $row["mr1_onset"];
	 $mr1_onset = $row["mr1_onset"];
 	 $mr1_onsetx = explode('-' , $mr1_onset);
	 $mr1_onsety = $mr1_onsetx[1];
	
	
	$sql = "select * from interlaw88.member_rehabilitation2 where member_num = '$num'";
     $stmh = $pdo->prepare($sql);       
     $stmh->execute();  
     
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $mr2_consciousness     = $row["mr2_consciousness"];
     $mr2_communication     = $row["mr2_communication"]; 
     $mr2_breath     = $row["mr2_breath"];
     $mr2_nutrition     = $row["mr2_nutrition"];
     $mr2_dysphagia     = $row["mr2_dysphagia"]; 
     $mr2_right_arm	     = $row["mr2_right_arm	"];
     $mr2_left_arm    = $row["mr2_left_arm"];
     $mr2_right_leg     = $row["mr2_right_leg"]; 
     $mr2_left_leg     = $row["mr2_left_leg"];
     $mr2_movement_level     = $row["mr2_movement_level"];
     $mr2_active_level     = $row["mr2_active_level"]; 
     $mr2_function_level     = $row["mr2_function_level"];
     $mr2_mna_1     = $row["mr2_mna_1"];
     $mr2_mna_2     = $row["mr2_mna_2"]; 
     $mr2_mna_3	     = $row["mr2_mna_3"];
     $mr2_mna_4    = $row["mr2_mna_4"];
     $mr2_mna_5     = $row["mr2_mna_5"]; 
     $mr2_FRAX_total     = $row["mr2_FRAX_total"];     
     $mr2_FRAX_tscore     = $row["mr2_FRAX_tscore"];     
     $mr2_SFT_1     = $row["mr2_SFT_1"];     
     $mr2_SFT_2     = $row["mr2_SFT_2"];     
     $mr2_MAS4     = $row["mr2_MAS4"];     
     
     
	$sql = "select * from interlaw88.member_basic_examination where member_num = '$num'";
     $stmh = $pdo->prepare($sql);       
     $stmh->execute();  
     
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $mbe_blood_pressure1     = $row["mbe_blood_pressure1"];
     $mbe_blood_pressure2     = $row["mbe_blood_pressure2"];
     $mbe_pulse     = $row["mbe_pulse"];
     $mbe_breath     = $row["mbe_breath"]; 
     $mbe_temperature	     = $row["mbe_temperature"];
     $mbe_weight    = $row["mbe_weight"];
     $mbe_height     = $row["mbe_height"]; 
     $mbe_bmi     = $row["mbe_bmi"];
     $mbe_blood_glucose_before     = $row["mbe_blood_glucose_before"];
     $mbe_blood_glucose_after     = $row["mbe_blood_glucose_after"]; 
     $mbe_chol     = $row["mbe_chol"];
     $mbe_tg     = $row["mbe_tg"];
     $mbe_department     = $row["mbe_department"]; 
    
    
         
	$sql = "select * from interlaw88.member_daily_living where member_num = '$num'";
     $stmh = $pdo->prepare($sql);       
     $stmh->execute();  
     
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $mdl_hygiene     = $row["mdl_hygiene"];
     $mdl_bath     = $row["mdl_bath"];
     $mdl_meal     = $row["mdl_meal"]; 
     $mdl_toilet	     = $row["mdl_toilet"];
     $mdl_stair    = $row["mdl_stair"];
     $mdl_clothe     = $row["mdl_clothe"]; 
     $mdl_poo_control     = $row["mdl_poo_control"];
     $mdl_urine_control     = $row["mdl_urine_control"];
     $mdl_walk     = $row["mdl_walk"]; 
     $mdl_wheelchair     = $row["mdl_wheelchair"];
     $mdl_movement     = $row["mdl_movement"];
     $mdl_total     = $row["mdl_total"]; 
    
     
?> 


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/common.css"> 
<link rel="stylesheet" type="text/css" href="../css/memberFormTable.css">

<!-- ????????? ?????? by ????????? -->

<script type="text/javascript">
function showmap(spot) { 
 if(document.all.spot.style.visibility=="hidden") {
   document.all.spot.style.visibility="visible";
   return false;
 }
 if(document.all.spot.style.visibility=="visible") {
  document.all.spot.style.visibility="hidden";
  return false;
 }
}


function check_input()
{
    if(!document.member_form.name.value)   {
    alert("?????? ????????? ?????? ??????????????????"); 
    document.member_form.name.focus(); 
    return;
  }
  if(confirm("?????????????????????????")){
   document.member_form.submit();
  }
  return;
 }

function reset_form() //???????????? ????????????
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
 <form name="member_form" method="post" action="upupro.php"> 
 <div id="title">
    <h1> ????????? ?????? ??????</h1>
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
	
    <table>
      <caption><h2>????????????</h2></caption>

      <tbody>
        <tr>
          <th> ????????? ?????????<font color=red> * </font></th>
          <td><input type="text" name= "member_id" value="<?=$member_id?>" required></td>
        </tr>
        <tr>
          <th> ????????? ??????<font color=red> * </font></th>
          <td><input type="int" name= "member_num" value="<?=$member_num?>" required></td>
        </tr>
        <tr>
          <th>?????? ?????????</th>
		  <td><input type="date" name= "member_first_registration" value="<?= $member_first_registration  ?>" required></td>	
        </tr>
        <tr>
          <th>?????? ?????????</th>
          <td><input type="date" name= "member_last_registration" value="<?=$member_last_registration  ?>" </td>

        </tr>

      <tr>
          <th> ?????? ?????????<font color=red> * </font></th>
          <td><select type="text" name="manager_id" required> 
 <?php  // ????????? ID ?????? ??????
             while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                    ?>
                <option><?=$row['manager_id']?>&nbsp'<?=$row['manager_name']?>'</option>
            <?php } ?>
            </select></td>

        </tr>
        <tr>
          <th><a href="#" onclick="showmap('spot');" title="?????? ????????? ??????">??????</a></th>
          <td><input type="text" name="name" value="<?=$member_name?>" required></td>

        </tr>
        <tr>
          <th>??????</th>
          <td><input type="radio" name="gender" id="F" value="???" <?php if($gender == "???" ) { echo "checked=true";}?>>???
       <input type="radio" name="gender" id='M' value="???"<?php if($gender == "???" ) { echo "checked=true";}?> >???</td>

        </tr>
        <tr>
          <th>????????????</th>
          <td><select name="birth1" required>
          <option value='???????????????' >???????????????</option>
          <option value='1999'  <? if($member_birthdatex[0] == 1999) echo " selected "; ?> >1999</option> 
          <option value='1998' <? if($member_birthdatex[0] == 1998) echo " selected "; ?> >1998</option>
          <option value='1997' <? if($member_birthdatex[0] == 1997) echo " selected "; ?> >1997</option>
          <option value='1996' <? if($member_birthdatex[0] == 1996) echo " selected "; ?> >1996</option>
          <option value='1995' <? if($member_birthdatex[0] == 1995) echo " selected "; ?> >1995</option>
          <option value='1994' <? if($member_birthdatex[0] == 1994) echo " selected "; ?> >1994</option>
          <option value='1993' <? if($member_birthdatex[0] == 1993) echo " selected "; ?> >1993</option> 
          <option value='1992' <? if($member_birthdatex[0] == 1992) echo " selected "; ?> >1992</option>
          <option value='1991' <? if($member_birthdatex[0] == 1991) echo " selected "; ?> >1991</option>
          <option value='1990' <? if($member_birthdatex[0] == 1990) echo " selected "; ?> >1990</option>
          <option value='1989' <? if($member_birthdatex[0] == 1989) echo " selected "; ?> >1989</option>
          <option value='1988' <? if($member_birthdatex[0] == 1988) echo " selected "; ?> >1988</option>
          <option value='1987' <? if($member_birthdatex[0] == 1987) echo " selected "; ?> >1987</option> 
          <option value='1986' <? if($member_birthdatex[0] == 1986) echo " selected "; ?> >1986</option>
          <option value='1985' <? if($member_birthdatex[0] == 1985) echo " selected "; ?> >1985</option>
          <option value='1984' <? if($member_birthdatex[0] == 1984) echo " selected "; ?> >1984</option>
          <option value='1983' <? if($member_birthdatex[0] == 1983) echo " selected "; ?> >1983</option>
          <option value='1982' <? if($member_birthdatex[0] == 1982) echo " selected "; ?> >1982</option>
          <option value='1981' <? if($member_birthdatex[0] == 1981) echo " selected "; ?> >1981</option>
          <option value='1980' <? if($member_birthdatex[0] == 1980) echo " selected "; ?> >1980</option>
          <option value='1979' <? if($member_birthdatex[0] == 1979) echo " selected "; ?> >1979</option>
          <option value='1978' <? if($member_birthdatex[0] == 1978) echo " selected "; ?> >1978</option>
          <option value='1977' <? if($member_birthdatex[0] == 1977) echo " selected "; ?> >1977</option> 
          <option value='1976' <? if($member_birthdatex[0] == 1976) echo " selected "; ?> >1976</option>
          <option value='1975' <? if($member_birthdatex[0] == 1975) echo " selected "; ?> >1975</option>
          <option value='1974' <? if($member_birthdatex[0] == 1974) echo " selected "; ?> >1974</option>
          <option value='1973' <? if($member_birthdatex[0] == 1973) echo " selected "; ?> >1973</option>
          <option value='1972' <? if($member_birthdatex[0] == 1972) echo " selected "; ?> >1972</option>          
          <option value='1971' <? if($member_birthdatex[0] == 1971) echo " selected "; ?> >1971</option>
          <option value='1970' <? if($member_birthdatex[0] == 1970) echo " selected "; ?> >1970</option>
          <option value='1969' <? if($member_birthdatex[0] == 1969) echo " selected "; ?> >1969</option>
          <option value='1968' <? if($member_birthdatex[0] == 1968) echo " selected "; ?> >1968</option>
          <option value='1967' <? if($member_birthdatex[0] == 1967) echo " selected "; ?> >1967</option> 
          <option value='1966' <? if($member_birthdatex[0] == 1966) echo " selected "; ?> >1966</option>
          <option value='1965' <? if($member_birthdatex[0] == 1965) echo " selected "; ?> >1965</option>
          <option value='1964' <? if($member_birthdatex[0] == 1964) echo " selected "; ?> >1964</option>
          <option value='1963' <? if($member_birthdatex[0] == 1963) echo " selected "; ?> >1963</option>
          <option value='1962' <? if($member_birthdatex[0] == 1962) echo " selected "; ?> >1962</option>
          <option value='1961' <? if($member_birthdatex[0] == 1961) echo " selected "; ?> >1961</option>
          <option value='1960' <? if($member_birthdatex[0] == 1960) echo " selected "; ?> >1960</option>
          <option value='1959' <? if($member_birthdatex[0] == 1959) echo " selected "; ?> >1959</option>
          <option value='1958' <? if($member_birthdatex[0] == 1958) echo " selected "; ?> >1958</option>
          <option value='1957' <? if($member_birthdatex[0] == 1957) echo " selected "; ?> >1957</option> 
          <option value='1956' <? if($member_birthdatex[0] == 1956) echo " selected "; ?> >1956</option>
          <option value='1955' <? if($member_birthdatex[0] == 1955) echo " selected "; ?> >1955</option>
          <option value='1954' <? if($member_birthdatex[0] == 1954) echo " selected "; ?> >1954</option>
          <option value='1953' <? if($member_birthdatex[0] == 1953) echo " selected "; ?> >1953</option>
          <option value='1952' <? if($member_birthdatex[0] == 1952) echo " selected "; ?> >1952</option>     
          <option value='1951' <? if($member_birthdatex[0] == 1951) echo " selected "; ?> >1951</option>
          <option value='1950' <? if($member_birthdatex[0] == 1950) echo " selected "; ?> >1950</option>
          <option value='1949' <? if($member_birthdatex[0] == 1949) echo " selected "; ?> >1949</option>
          <option value='1948' <? if($member_birthdatex[0] == 1948) echo " selected "; ?> >1948</option>
          <option value='1947' <? if($member_birthdatex[0] == 1947) echo " selected "; ?> >1947</option> 
          <option value='1946' <? if($member_birthdatex[0] == 1946) echo " selected "; ?> >1946</option>
          <option value='1945' <? if($member_birthdatex[0] == 1945) echo " selected "; ?> >1945</option>
          <option value='1944' <? if($member_birthdatex[0] == 1944) echo " selected "; ?> >1944</option>
          <option value='1943' <? if($member_birthdatex[0] == 1943) echo " selected "; ?> >1943</option>
          <option value='1942' <? if($member_birthdatex[0] == 1942) echo " selected "; ?> >1942</option>
          <option value='1941' <? if($member_birthdatex[0] == 1941) echo " selected "; ?> >1941</option>
          <option value='1940' <? if($member_birthdatex[0] == 1940) echo " selected "; ?> >1940</option>
          <option value='1939' <? if($member_birthdatex[0] == 1939) echo " selected "; ?> >1939</option>
          <option value='1938' <? if($member_birthdatex[0] == 1938) echo " selected "; ?> >1938</option>
          <option value='1937' <? if($member_birthdatex[0] == 1937) echo " selected "; ?> >1937</option> 
          <option value='1936' <? if($member_birthdatex[0] == 1936) echo " selected "; ?> >1936</option>
          <option value='1935' <? if($member_birthdatex[0] == 1935) echo " selected "; ?> >1935</option>
          <option value='1934' <? if($member_birthdatex[0] == 1934) echo " selected "; ?> >1934</option>
          <option value='1933' <? if($member_birthdatex[0] == 1933) echo " selected "; ?> >1933</option>
          <option value='1932' <? if($member_birthdatex[0] == 1932) echo " selected "; ?> >1932</option>               
        </select>

       <select name="birth2" required>
           <option value='???????????????'>???????????????</option>
           <option value="01"  <? if($member_birthdatex[1] == 01) echo " selected "; ?> > 01</option>
   		   <option value="02"  <? if($member_birthdatex[1] == 02) echo " selected "; ?>  >02</option>
           <option value="03"  <? if($member_birthdatex[1] == 03) echo " selected "; ?>  >03</option>
           <option value="04"  <? if($member_birthdatex[1] == 04) echo " selected "; ?>  >04</option>
           <option value="05"  <? if($member_birthdatex[1] == 05) echo " selected "; ?>  >05</option>
           <option value="06"  <? if($member_birthdatex[1] == 06) echo " selected "; ?>  >06</option>
           <option value="07"  <? if($member_birthdatex[1] == 07) echo " selected "; ?>  >07</option>
		   <option value="08"  <? if($member_birthdatex[1] == 07) echo " selected "; ?>  >08</option>

		    ??? ???????????? 08??????????????? ??????500??? ??????
   

  
           
       </select>
       
        <select name="birth3" required>
           <option value='???????????????'>???????????????</option>
           <option value="01" <? if($member_birthdatex[2] == 01) echo " selected "; ?> >01</option>
           <option value="02" <? if($member_birthdatex[2] == 02) echo " selected "; ?> >02</option>
           <option value="03" <? if($member_birthdatex[2] == 03) echo " selected "; ?> >03</option>
           <option value="04" <? if($member_birthdatex[2] == 04) echo " selected "; ?> >04</option>
           <option value="05" <? if($member_birthdatex[2] == 05) echo " selected "; ?> >05</option>
           <option value="06" <? if($member_birthdatex[2] == 06) echo " selected "; ?> >06</option>
           <option value="07" <? if($member_birthdatex[2] == 07) echo " selected "; ?> >07</option>
           <option value="08"  >08</option>
           <option value="09"  >09</option>
           <option value="10"  >10</option>
           <option value="11"  >11</option>
           <option value="12"  >12</option>
           <option value="13"  >13</option>
           <option value="14"  >14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           <option value="18">18</option>
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
          <th>?????? </th>
          <td>   <select name="edu" required>
          <option value='???????????????'>???????????????</option>
          <option value="??????" <? if($edu == ??????) echo " selected "; ?> >??????</option> 
          <option value="??????" <? if($edu == ??????) echo " selected "; ?>  >??????</option> 
          <option value="??????" <? if($edu == ??????) echo " selected "; ?> >??????</option> 
          <option value="??????" <? if($edu == ??????) echo " selected "; ?> >??????</option> 
          <option value="???????????????" <? if($edu== ???????????????) echo " selected "; ?> >???????????????</option> 
          </select></td>

        </tr> 
        <tr>
          <th>????????????<font color=red> * </font></th>
          <td><input type="radio" name="disability" value="???" <?php if($disability == "???" ) { echo "checked=true";}?> >???
                       <input type="radio" name="disability" value="???" <?php if($disability == "???" ) { echo "checked=true";}?> >???</td>

        </tr> 
        <tr>
          <th>????????????</th>
          <td>
			   <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="?????????"<?php if($major_disability == "?????????" ) { echo "checked=true";}?>>?????????
               <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="?????????"<?php if($major_disability == "?????????" ) { echo "checked=true";}?>>?????????
               <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="???"<?php if($major_disability == "???" ) { echo "checked=true";}?>>???
               <input type="radio" name="major_disability" value="??????/??????"<?php if($major_disability == "??????/??????" ) { echo "checked=true";}?>>??????/??????
               <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="??????"<?php if($major_disability == "??????" ) { echo "checked=true";}?>>??????
               <input type="radio" name="major_disability" value="????????????"<?php if($major_disability == "????????????" ) { echo "checked=true";}?>>????????????</td>

        </tr> 
        <tr>
          <th>????????????</th>
          <td>			   
               <input type="checkbox" name="mdt_retard" value="1"<?php if($mdt_retard == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_Brain_lesion" value="1"<?php if($mdt_Brain_lesion == "1" ) {echo "checked=true";}?>>?????????
               <input type="checkbox" name="mdt_see" value="1"<?php if($mdt_see == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_hear" value="1"<?php if($mdt_hear == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_language" value="1"<?php if($mdt_language == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_face" value="1"<?php if($mdt_face == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_respiratory" value="1"<?php if($mdt_respiratory == "1" ) { echo "checked=true";}?>>?????????
               <input type="checkbox" name="mdt_heart" value="1"<?php if($mdt_heart == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_kidney" value="1"<?php if($mdt_kidney == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_liver" value="1"<?php if($mdt_liver == "1" ) { echo "checked=true";}?>>???
               <input type="checkbox" name="mdt_stoma_urostomy" value="1"<?php if($mdt_stoma_urostomy == "1" ) { echo "checked=true";}?>>??????/??????
               <input type="checkbox" name="mdt_epilepsy" value="1"<?php if($mdt_epilepsy == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_mental" value="1"<?php if($mdt_mental == "1" ) { echo "checked=true";}?>>??????
               <input type="checkbox" name="mdt_development" value="1"<?php if($mdt_development == "1" ) { echo "checked=true";}?>>????????????</td></td>

        </tr> 
        <tr>
          <th>????????????<font color=red> * </font></th>
          <td> 
       		<input type="radio" name="delay_type" value="?????????"<?php if($delay_type == "?????????" ) { echo "checked=true";}?>>?????????
    	    <input type="radio" name="delay_type" value="??????"<?php if($delay_type == "??????" ) { echo "checked=true";}?>>??????
  		    <input type="radio" name="delay_type" value="?????????"<?php if($delay_type == "?????????" ) { echo "checked=true";}?>>?????????
  		    <input type="radio" name="delay_type" value="????????????"<?php if($delay_type == "????????????" ) { echo "checked=true";}?>>????????????</td>

        </tr> 
        <tr>
          <th> ???????????? <font color=red> * </font></th>
          <td> 
          	<input type="radio" name="major_disease" value="??????"<?php if($major_disease == "??????" ) { echo "checked=true";}?> >??????  
       	    <input type="radio" name="major_disease" value="?????????"<?php if($major_disease == "?????????" ) { echo "checked=true";}?> >?????????
       	    <input type="radio" name="major_disease" value="??????"<?php if($major_disease == "??????" ) { echo "checked=true";}?> >??????
            <input type="radio" name="major_disease" value="?????????" <?php if($major_disease == "?????????" ) { echo "checked=true";}?>>?????????
            <input type="radio" name="major_disease" value="???????????????" <?php if($major_disease == "???????????????" ) { echo "checked=true";}?>>???????????????
            <input type="radio" name="major_disease" value="???????????????" <?php if($major_disease == "???????????????" ) { echo "checked=true";}?>>???????????????
			<input type="radio" name="major_disease" value="???" <?php if($major_disease == "???" ) { echo "checked=true";}?>>???
			<input type="radio" name="major_disease" value="???????????????"<?php if($major_disease == "???????????????" ) { echo "checked=true";}?>>???????????????
			<input type="radio" name="major_disease" value="??????"<?php if($major_disease == "??????" ) { echo "checked=true";}?>>??????
&nbsp&nbsp&nbsp?????? ??????: <input  type="text" name="major_disease_ect" value="<?=$major_disease_ect?>" ></td>

        </tr>    
          <th> ???????????? <font color=red> * </font></th>
            <td><input type="radio" name="member_ex_type"  value="??????" <?php if($member_ex_type == "??????" ) { echo "checked=true";}?>  >??????
       <input type="radio" name="member_ex_type"  value="?????????" <?php if($member_ex_type == "?????????" ) { echo "checked=true";}?>  >?????????
       <input type="radio" name="member_ex_type"  value="?????????" <?php if($member_ex_type == "?????????" ) { echo "checked=true";}?>  >?????????
       <input type="radio" name="member_ex_type"  value="??????" <?php if($member_ex_type == "??????" ) { echo "checked=true";}?>  >??????
       </td>
       	<tr>
          <th> ????????? <font color=red> * </font></th>
       <td><input type="radio" name="member_ex_level"  value="???" <?php if($member_ex_level == "???" ) { echo "checked=true";}?> >???
       <input type="radio" name= "member_ex_level"  value="???" <?php if($member_ex_level == "???" ) { echo "checked=true";}?> >???
       <input type="radio" name= "member_ex_level"  value="???" <?php if($member_ex_level == "???" ) { echo "checked=true";}?> >???
       </td>
       </tr>
      </tbody>
        </table>
            <table>
      <caption><h2>????????????1</h2></caption>

      <tbody>
        <tr>
          <th>????????????</th>
          <td><select name="mr1_onset1" required><br>
          <option value='???????????????'>???????????????</option>
          <option value='2021'  <? if($mr1_onsetx[0] == 2021) echo " selected "; ?>  >2021</option>
          <option value='2020' <? if($mr1_onsetx[0] == 2020) echo " selected "; ?> >2020</option>
          <option value='2019' <? if($mr1_onsetx[0] == 2019) echo " selected "; ?> >2019</option>
          <option value='2018' <? if($mr1_onsetx[0] == 2018) echo " selected "; ?> >2018</option>
          <option value='2017' <? if($mr1_onsetx[0] == 2017) echo " selected "; ?> >2017</option>
          <option value='2016' <? if($mr1_onsetx[0] == 2016) echo " selected "; ?> >2016</option>
          <option value='2015' <? if($mr1_onsetx[0] == 2015) echo " selected "; ?> >2015</option>
          <option value='2014' <? if($mr1_onsetx[0] == 2014) echo " selected "; ?> >2014</option>
          <option value='2013'<? if($mr1_onsetx[0] == 2013) echo " selected "; ?> >2013</option>
          <option value='2012'<? if($mr1_onsetx[0] == 2012) echo " selected "; ?> >2012</option>
          <option value='2011'<? if($mr1_onsetx[0] == 2011) echo " selected "; ?> >2011</option>
          <option value='2010'<? if($mr1_onsetx[0] == 2010) echo " selected "; ?> >2010</option>        
          <option value='2009'<? if($mr1_onsetx[0] == 2009) echo " selected "; ?> >2009</option> 
          <option value='2008'<? if($mr1_onsetx[0] == 2008) echo " selected "; ?>>2008</option>
          <option value='2007'<? if($mr1_onsetx[0] == 2007) echo " selected "; ?>>2007</option>
          <option value='2006'<? if($mr1_onsetx[0] == 2006) echo " selected "; ?>>2006</option>
          <option value='2005'<? if($mr1_onsetx[0] == 2005) echo " selected "; ?>>2005</option>
          <option value='2004'<? if($mr1_onsetx[0] == 2004) echo " selected "; ?>>2004</option>
          <option value='2003'<? if($mr1_onsetx[0] == 2003) echo " selected "; ?>>2003</option> 
          <option value='2002'<? if($mr1_onsetx[0] == 2002) echo " selected "; ?>>2002</option>
          <option value='2001'<? if($mr1_onsetx[0] == 2001) echo " selected "; ?>>2001</option>
          <option value='2000'<? if($mr1_onsetx[0] == 2000) echo " selected "; ?>>2000</option>
          <option value='1999'<? if($mr1_onsetx[0] == 1999) echo " selected "; ?>>1999</option> 
          <option value='1998'<? if($mr1_onsetx[0] == 1998) echo " selected "; ?>>1998</option>
          <option value='1997'<? if($mr1_onsetx[0] == 1997) echo " selected "; ?>>1997</option>
          <option value='1996'<? if($mr1_onsetx[0] == 1996) echo " selected "; ?>>1996</option>
          <option value='1995'<? if($mr1_onsetx[0] == 1995) echo " selected "; ?>>1995</option>
          <option value='1994'<? if($mr1_onsetx[0] == 1994) echo " selected "; ?>>1994</option>
          <option value='1993'<? if($mr1_onsetx[0] == 1993) echo " selected "; ?>>1993</option> 
          <option value='1992'<? if($mr1_onsetx[0] == 1992) echo " selected "; ?>>1992</option>
          <option value='1991'<? if($mr1_onsetx[0] == 1991) echo " selected "; ?>>1991</option>
          <option value='1990'<? if($mr1_onsetx[0] == 1990) echo " selected "; ?>>1990</option>
          <option value='1989'<? if($mr1_onsetx[0] == 1989) echo " selected "; ?>>1989</option>
          <option value='1988'<? if($mr1_onsetx[0] == 1988) echo " selected "; ?>>1988</option>
          <option value='1987'<? if($mr1_onsetx[0] == 1987) echo " selected "; ?>>1987</option> 
          <option value='1986'<? if($mr1_onsetx[0] == 1986) echo " selected "; ?>>1986</option>
          <option value='1985'<? if($mr1_onsetx[0] == 1985) echo " selected "; ?>>1985</option>
          <option value='1984'<? if($mr1_onsetx[0] == 1984) echo " selected "; ?>>1984</option>
          <option value='1983'<? if($mr1_onsetx[0] == 1983) echo " selected "; ?>>1983</option>
          <option value='1982'<? if($mr1_onsetx[0] == 1982) echo " selected "; ?>>1982</option>
          <option value='1981'<? if($mr1_onsetx[0] == 1981) echo " selected "; ?>>1981</option>
          <option value='1980'<? if($mr1_onsetx[0] == 1980) echo " selected "; ?>>1980</option>
          <option value='1979'<? if($mr1_onsetx[0] == 1979) echo " selected "; ?>>1979</option>
          <option value='1978'<? if($mr1_onsetx[0] == 1978) echo " selected "; ?>>1978</option>
          <option value='1977'<? if($mr1_onsetx[0] == 1977) echo " selected "; ?>>1977</option> 
          <option value='1976'<? if($mr1_onsetx[0] == 1976) echo " selected "; ?>>1976</option>
          <option value='1975'<? if($mr1_onsetx[0] == 1975) echo " selected "; ?>>1975</option>
          <option value='1974'<? if($mr1_onsetx[0] == 1974) echo " selected "; ?>>1974</option>
          <option value='1973'<? if($mr1_onsetx[0] == 1973) echo " selected "; ?>>1973</option>
          <option value='1972'<? if($mr1_onsetx[0] == 1972) echo " selected "; ?>>1972</option>          
          <option value='1971'<? if($mr1_onsetx[0] == 1971) echo " selected "; ?>>1971</option>
          <option value='1970'<? if($mr1_onsetx[0] == 1970) echo " selected "; ?>>1970</option>
          <option value='1969'<? if($mr1_onsetx[0] == 1969) echo " selected "; ?>>1969</option>
          <option value='1968'<? if($mr1_onsetx[0] == 1968) echo " selected "; ?>>1968</option>
          <option value='1967'<? if($mr1_onsetx[0] == 1967) echo " selected "; ?>>1967</option> 
          <option value='1966'<? if($mr1_onsetx[0] == 1966) echo " selected "; ?>>1966</option>
          <option value='1965'<? if($mr1_onsetx[0] == 1965) echo " selected "; ?>>1965</option>
          <option value='1964'<? if($mr1_onsetx[0] == 1964) echo " selected "; ?>>1964</option>
          <option value='1963'<? if($mr1_onsetx[0] == 1963) echo " selected "; ?>>1963</option>
          <option value='1962'<? if($mr1_onsetx[0] == 1962) echo " selected "; ?>>1962</option>
          <option value='1961'<? if($mr1_onsetx[0] == 1961) echo " selected "; ?>>1961</option>
          <option value='1960'<? if($mr1_onsetx[0] == 1960) echo " selected "; ?>>1960</option>
          <option value='1959'<? if($mr1_onsetx[0] == 1959) echo " selected "; ?>>1959</option>
          <option value='1958'<? if($mr1_onsetx[0] == 1958) echo " selected "; ?>>1958</option>
          <option value='1957'<? if($mr1_onsetx[0] == 1957) echo " selected "; ?>>1957</option> 
          <option value='1956'<? if($mr1_onsetx[0] == 1956) echo " selected "; ?>>1956</option>
          <option value='1955'<? if($mr1_onsetx[0] == 1955) echo " selected "; ?>>1955</option>
          <option value='1954'<? if($mr1_onsetx[0] == 1954) echo " selected "; ?>>1954</option>
          <option value='1953'<? if($mr1_onsetx[0] == 1953) echo " selected "; ?>>1953</option>
          <option value='1952'<? if($mr1_onsetx[0] == 1952) echo " selected "; ?>>1952</option>     
          <option value='1951'<? if($mr1_onsetx[0] == 1951) echo " selected "; ?>>1951</option>
          <option value='1950'<? if($mr1_onsetx[0] == 1950) echo " selected "; ?>>1950</option>           
        </select>

       <select name="mr1_onset2" required>
           <option value="???????????????">???????????????</option>
           <option value="01"<? if($mr1_onsetx[1] == 01) echo " selected "; ?> >01</option>
           <option value="02"<? if($mr1_onsetx[1] == 02) echo " selected "; ?>>02</option>
           <option value="03"<? if($mr1_onsetx[1] == 03) echo " selected "; ?>>03</option>
           <option value="04"<? if($mr1_onsetx[1] == 04) echo " selected "; ?>>04</option>
           <option value="05"<? if($mr1_onsetx[1] == 05) echo " selected "; ?>>05</option>
           <option value="06"<? if($mr1_onsety == 06) echo " selected "; ?>>06</option>
           <option value="07"<? if($mr1_onsety == 07) echo " selected "; ?>>07</option>
           <option value="08">08</option>
           <option value="09">09</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
       </select>
       
       </td>
        </tr>
        <tr>
          <th>??????</th>
		  <td><echo>??????: <input type="text" name="mr1_pain_point" value="<?=$mr1_pain_point?>" > 
		  ??????: <input type="text" name="mr1_pain_level" value="<?=$mr1_pain_level?>" ></td>	
        </tr>
        <tr>
          <th>???????????? ??????<font color=red> * </font></th>
          <td><echo><input type="text" name="mr1_medicine"  style="text-align:center; width:230px; height:40px;" value="<?=$mr1_medicine?>" required ></td>

        </tr>
        <tr>
          <th> ?????? ???????????? <font color=red> * </font></th>
          <td>?????????: <input type="text" name="mr1_helpingtool" value="<?=$mr1_helpingtool?>"  >
          ????????????: <input type="text" name="mr1_pedestal" value="<?=$mr1_pedestal?>"  >
          ????????????: <input type="text" name="mr1_extra_instrument" value="<?=$mr1_extra_instrument?>" ></td>

        </tr>
        <tr>
          <th>??? ?????????</th>
          <td><select name="mr1_caregiver" required><br>
          <option value='?????????'<? if($mr1_caregiver == '?????????') echo " selected "; ?> >?????????</option>
          <option value='??????' <? if($mr1_caregiver == '??????') echo " selected "; ?> >??????</option>
          <option value='??????(?????????/????????????)' <? if($mr1_caiver == '??????(?????????/????????????)') echo " selected "; ?> >??????(?????????/????????????)</option>
          <option value='??????/??????' <? if($mr1_caregiver == '??????/??????') echo " selected "; ?> >??????/??????</option>
          <option value='?????????' <? if($mr1_caregiver == '?????????') echo " selected "; ?> >?????????</option>
          <option value='??????/??????' <? if($mr1_caregiver == '??????/??????') echo " selected "; ?> >??????/??????</option>
          <option value='??????/??????' <? if($mr1_caregiver == '??????/??????') echo " selected "; ?> >??????/??????</option>
          <option value='??????' <? if($mr1_caregiver == '??????') echo " selected "; ?> >??????</option>
          <option value='??????'<? if($mr1_caregiver == '??????') echo " selected "; ?> >??????</option>
          <option value='(??????)???????????????/?????????/???????????????' <? if($mr1_caregiver == '(??????)???????????????/?????????/???????????????') echo " selected "; ?> >(??????)???????????????/?????????/???????????????</option>
          <option value='(??????)???????????????/?????????/???????????????' <? if($mr1_caregiver == '(?????????????????????)???????????????/?????????/???????????????') echo " selected "; ?> >(??????)???????????????/?????????/???????????????</option>
          <option value='???????????????' <? if($mr1_caregiver == '???????????????') echo " selected "; ?> >???????????????</option>
          <option value='??????' <? if($mr1_caregiver == '??????') echo " selected "; ?> >??????</option>
          </select></td>

        </tr>
        <tr>
          <th>?????? ????????????</th>
          <td><select name="mr1_family" required><br>
          <option value='??????' <? if($mr1_family == '??????') echo " selected "; ?> >??????</option>
          <option value='????????? ??????' <? if($mr1_family == '????????? ??????') echo " selected "; ?> >????????? ??????</option>
          <option value='????????????'  <? if($mr1_family == '????????????') echo " selected "; ?> >????????????</option>
          <option value='???????????????'  <? if($mr1_family == '???????????????') echo " selected "; ?> >???????????????</option>
          <option value='???????????????'  <? if($mr1_family == '???????????????') echo " selected "; ?> >???????????????</option>
          <option value='????????????'  <? if($mr1_family == '????????????') echo " selected "; ?> >????????????</option>
          <option value='????????????(??????)'  <? if($mr1_family == '????????????(??????)') echo " selected "; ?> >????????????(??????)</option>
          <option value='??????????????????'  <? if($mr1_family == '??????????????????') echo " selected "; ?> >??????????????????</option>
          <option value='????????? ??? ???????????? ??????'  >????????? ??? ???????????? ??????</option>
          <option value='??????'   >??????</option>
          
          </select>
          </td>

          
      </tbody>
      </table>
        
                    <table>
      <caption><h2>????????????2</h2></caption>

      <tbody>
        <tr>
          <th>??????</th>
          <td><select name="mr2_consciousness" required>
          <option value='??????' <? if($mr2_consciousness == '??????') echo " selected "; ?>  >??????</option>
          <option value='??????' <? if($mr2_consciousness == '??????') echo " selected "; ?>  >??????</option>
          <option value='??????' <? if($mr2_consciousness == '??????') echo " selected "; ?>  >??????</option>         
        </select></td>
        </tr>
        <tr>
          <th>????????????</th>
		  <td><select name="mr2_communication" required><br>
          <option value='??????' <? if($mr2_communication == '??????') echo " selected "; ?> >??????</option>
          <option value='?????? ?????????' <? if($mr2_communication == '?????? ?????????') echo " selected "; ?> >?????? ?????????</option>
          <option value='?????????' <? if($mr2_communication == '?????????') echo " selected "; ?> >?????????              
        </select> </td>	
        </tr>
        <tr>
          <th>????????????</th>
          <td>
          <select name="mr2_breath" required><br>
          <option value='??????'  <? if($mr2_breath == '??????') echo " selected "; ?> >??????</option>
          <option value='??????'  <? if($mr2_breath == '??????') echo " selected "; ?> >??????</option>
          <option value='????????????'  <? if($mr2_breath == '????????????') echo " selected "; ?> >????????????</option> 
          <option value='????????? ??????'  <? if($mr2_breath == '????????? ??????') echo " selected "; ?> >????????? ??????</option> 
          <option value='??????'  <? if($mr2_breath == '??????') echo " selected "; ?> >??????</option>                
        </select>
          </td>

        </tr>
        <tr>
          <th>????????????</th>
          <td><select name="mr2_nutrition" required><br>
          <option value='??????'  <? if($mr2_nutrition == '??????') echo " selected "; ?>  >??????</option>
          <option value='????????????'  <? if($mr2_nutrition == '????????????') echo " selected "; ?>  >????????????</option>
          <option value='????????? ?????? ??????'  <? if($mr2_nutrition == '????????? ?????? ??????') echo " selected "; ?>  >????????? ?????? ??????</option> 
          <option value='??????'  <? if($mr2_nutrition == '??????') echo " selected "; ?>  >??????</option>                
        </select></td>

        </tr>
        <tr>
          <th>????????????<font color=red> * </font></th>
          <td><select name="mr2_dysphagia" required><br>
          <option value='??????' <? if($mr2_dysphagia == '??????') echo " selected "; ?>  >??????</option>
          <option value='??????' <? if($mr2_dysphagia == '??????') echo " selected "; ?>  >??????</option>             
        </select></td>

        </tr>
        <tr>
          <th>??????????????????</th>
          <td><select name="mr2_active_level" required><br>
          <option value='???'  <? if($mr2_active_level == '???') echo " selected "; ?> >???</option>
          <option value='???'  <? if($mr2_active_level == '???') echo " selected "; ?> >???</option>      
          <option value='???'  <? if($mr2_active_level == '???') echo " selected "; ?> >???</option>         
        </select>
          </td>
		</tr>
		        <tr>
          <th>????????????<font color=red> * </font></th>
          <td><select name="mr2_function_level" required><br>
          <option value='1'  <? if($mr2_function_level == '1') echo " selected "; ?>  >??????</option> 
          <option value='2'  <? if($mr2_function_level == '2') echo " selected "; ?>  >??????</option>      
          <option value='3'  <? if($mr2_function_level == '3') echo " selected "; ?>  >??????</option>       
    
        </select>
          </td>
		</tr>
		        <tr>
          <th>?????? <font color=red> * </font></th>
          <td>???????????????: <li style="display:inline"><select name="mr2_right_arm" required><br>
        <option value='??????' <? if($mr2_right_arm == '??????') echo " selected "; ?> >??????</option>
        <option value='??????' <? if($mr2_right_arm == '??????') echo " selected "; ?> >??????</option>      
        <option value='??????' <? if($mr2_right_arm == '??????') echo " seleted "; ?> >??????</option>            
        </select>
   </li> 
  
        ???????????????: <li style="display:inline"><select name="mr2_left_arm" required><br>
        <option value='??????' <? if($mr2_left_arm == '??????') echo " selected "; ?>  >??????</option>
        <option value='??????' <? if($mr2_left_arm == '??????') echo " selected "; ?>  >??????</option>      
        <option value='??????' <? if($mr2_left_arm == '??????') echo " selected "; ?>  >??????</option>            
        </select>
   </li> 

        ???????????????: <li style="display:inline"><select name="mr2_right_leg" required><br>
        <option value='??????' <? if($mr2_right_leg == '??????') echo " selected "; ?> >??????</option>
        <option value='??????' <? if($mr2_right_leg == '??????') echo " selected "; ?> >??????</option>      
        <option value='??????' <? if($mr2_right_leg == '??????') echo " selected "; ?> >??????</option>            
        </select>
   </li> 

      ???????????????: <li style="display:inline"><select name="mr2_left_leg" required><br>
        <option value='??????' <? if($mr2_left_leg == '??????') echo " selected "; ?> >??????</option>
        <option value='??????' <? if($mr2_left_leg == '??????') echo " selected "; ?> >??????</option>      
        <option value='??????' <? if($mr2_left_leg == '??????') echo " selected "; ?> >??????</option>            
        </select>
   </li> 
          </td>
		</tr>
		        <tr>
          <th>??????????????????</th>
          <td><select name="mr2_movement_level" required><br>
        <option value='????????????(????????????)'  <? if($mr2_movement_level == '????????????(????????????)') echo " selected "; ?>  >????????????(????????????)</option>
        <option value='???????????? ??? ??????'  <? if($mr2_movement_level == '???????????? ??? ??????') echo " selected "; ?> >???????????? ??? ??????</option>      
        <option value='??????/????????? ?????? ??????'  <? if($mr2_movement_level == '??????/????????? ?????? ??????') echo " selected "; ?> >??????/????????? ?????? ??????</option>   
        <option value='????????????'  <? if($mr2_movement_level == '????????????') echo " selected "; ?> >????????????</option>
        <option value='?????????????????????'  <? if($mr2_movement_level == '?????????????????????') echo " selected "; ?> >?????????????????????</option>      
        <option value='????????????'  <? if($mr2_movement_level == '????????????') echo " selected "; ?> >????????????</option>         
        </select>
          </td>
		</tr>
          		        <tr>
          <th> ????????????????????????<font color=red> * </font><br>(Mini Nutritional Assessment, MNA)</th>
          <td>
      <li> 
       1.&nbsp??????????????????:&nbsp&nbsp<input type="text" name="mr2_mna_1" value="<?=$mr2_mna_1?>" required>???&nbsp<br>
       2.&nbsp??????????????????:&nbsp<input type="text" name="mr2_mna_2"  value="<?=$mr2_mna_2?>" required>???&nbsp<br>
       3.&nbsp????????????:&nbsp<input type="text" name="mr2_mna_3"  value="<?=$mr2_mna_3?>" required>???&nbsp<br>
       4.&nbsp??????????????????:&nbsp<input type="text" name="mr2_mna_4"  value="<?=$mr2_mna_4?>" required>???&nbsp<br>
       5.&nbsp??????:&nbsp <? echo $mr2_mna_5 ?>&nbsp</li>
          </td>
		</tr>		        <tr>
          <th>????????????????????????<font color=red> * </font><br> (Fracture Risk Assessment System, FRAX) </th>
          <td><li> 1. T-score&nbsp<input type="text" name="mr2_FRAX_tscore"  value="<?=$mr2_FRAX_tscore?>"  required>???&nbsp<br>
       2.???&nbsp<input type="text" name="mr2_FRAX_total"  value="<?=$mr2_FRAX_total?>"  required>???&nbsp</li>
          </td>
		</tr>		        <tr>
          <th>????????????????????????<font color=red> * </font><br>(Senior Fitness Test, SFT)  </th>
          <td> <li> 1.30s???????????????????????????:&nbsp<input type="text" name="mr2_SFT_1" value="<?=$mr2_SFT_1?>" required>???&nbsp<br>
       2.244m????????????:&nbsp<input type="text" name="mr2_SFT_2" value="<?=$mr2_SFT_2?>" required>???&nbsp</li>  
          </td>
		</tr>		        <tr>
          <th>????????????????????????<font color=red> * </font><br></th>
          <td><li> <input type="text" name="mr2_MAS4" value="<?=$mr2_MAS4?>" required>???&nbsp</li> 
          </td>
		</tr>
      </tbody>
        </table>
        
                          <table>
      <caption><h2>????????????</h2></caption>


      <tbody>
        <tr>
          <th>??????<font color=red> * </font></th>
          <td>
    
           <li>?????????<input type="text" name="mbe_blood_pressure1" value="<?=$mbe_blood_pressure1?>" required>mmHG&nbsp</li>
          <li>?????????<input type="text" name="mbe_blood_pressure2" value="<?=$mbe_blood_pressure2?>" required>mmHG&nbsp</li>
          </td>
        </tr>
        <tr>
          <th>??????</th>
		  <td><input type="text" name="mbe_pulse" value="<?=$mbe_pulse?>" >BPM</td>	
        </tr>
              <tr>
          <th>??????</th>
		  <td><input type="text" name="mbe_breath" value="<?=$mbe_breath?>" >mmHG&nbsp</td>	
        </tr>
  
        <tr>
          <th>??????</th>
          <td>
          <input type="text" name="mbe_temperature" value="<?=$mbe_temperature?>" >??C&nbsp
          </td>
        </tr>
        
               <tr>
          <th>??????</th>
          <td>
     	  <input type="text" name="mbe_weight" value="<?=$mbe_weight?>" >kg
          </td>
        </tr>
                <tr>
          <th>??????</th>
          <td>
          <input type="text" name="mbe_height" value="<?=$mbe_height?>" >cm
          </td>
        </tr>
                <tr>
          <th>BMI<font color=red> * </font></th>
          <td>
        <input type="text" name="mbe_bmi" value="<?=$mbe_bmi?>" required>kg/m??
          </td>
        </tr>
                <tr>
          <th>???????????????<font color=red> * </font></th>
          <td>
          <input type="text" name="mbe_blood_glucose_before" value="<?=$mbe_blood_glucose_before?>" required>%

          </td>
 
                <tr>
          <th>HDL-CHOL<font color=red> * </font></th>
          <td>
         <input type="text" name="mbe_chol" value="<?=$mbe_chol?>" required>mg/dL
          </td>
        </tr>  
                <tr>
          <th>????????????<font color=red> * </font></th>
          <td>
         <input type="text" name="mbe_tg" value="<?=$mbe_tg?>" required>mg/dL
          </td>
        </tr> 
                <tr>
          <th>????????????</th>
          <td>
	<input type="text" name="mbe_department"  value="<?=$mbe_department?>"required>
          </td>
        </tr> 
        
      </tbody>
        </table>
        
                  <table>
      <caption><h2>????????????????????????</h2></caption>

      <tbody>
        <tr>
          <th >?????????</th>
          <td width="120">????????????</td>
          <td width="120">?????? ?????? ??????</td>
          <td width="120">????????????????????????</td>
          <td width="120">?????????????????????</td>
          <td width="120">??????????????????????????????</td>
        
        </tr>
        <tr>
          <th>????????????</th>
		  <td><input type="radio" name="mdl_hygiene" id="F" value="1" <?php if($mdl_hygiene == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_hygiene" id="F" value="2" <?php if($mdl_hygiene == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_hygiene" id="F" value="3" <?php if($mdl_hygiene == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_hygiene" id="F" value="4" <?php if($mdl_hygiene == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_hygiene" id="F" value="5" <?php if($mdl_hygiene == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>??????</th>
		  <td><input type="radio" name="mdl_bath" id="F" value="1" <?php if($mdl_bath == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_bath" id="F" value="2" <?php if($mdl_bath == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_bath" id="F" value="3" <?php if($mdl_bath == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_bath" id="F" value="4" <?php if($mdl_bath == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_bath" id="F" value="5" <?php if($mdl_bath == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>??????</th>
		  <td><input type="radio" name="mdl_meal" id="F" value="1" <?php if($mdl_meal == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_meal" id="F" value="2" <?php if($mdl_meal == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_meal" id="F" value="3" <?php if($mdl_meal == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_meal" id="F" value="4" <?php if($mdl_meal == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_meal" id="F" value="5" <?php if($mdl_meal == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>??????</th>
		  <td><input type="radio" name="mdl_toilet" id="F" value="1" <?php if($mdl_toilet == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_toilet" id="F" value="2" <?php if($mdl_toilet == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_toilet" id="F" value="3" <?php if($mdl_toilet == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_toilet" id="F" value="4" <?php if($mdl_toilet == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_toilet" id="F" value="5" <?php if($mdl_toilet == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>?????????????????????</th>
		  <td><input type="radio" name="mdl_stair" id="F" value="1" <?php if($mdl_stair == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_stair" id="F" value="2" <?php if($mdl_stair == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_stair" id="F" value="3" <?php if($mdl_stair == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_stair" id="F" value="4" <?php if($mdl_stair == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_stair" id="F" value="5" <?php if($mdl_stair == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>?????????</th>
		  <td><input type="radio" name="mdl_clothe" id="F" value="1" <?php if($mdl_clothe == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_clothe" id="F" value="2" <?php if($mdl_clothe == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_clothe" id="F" value="3" <?php if($mdl_clothe == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_clothe" id="F" value="4" <?php if($mdl_clothe == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_clothe" id="F" value="5" <?php if($mdl_clothe == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>????????????</th>
		  <td><input type="radio" name="mdl_poo_control" id="F" value="1" <?php if($mdl_poo_control == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_poo_control" id="F" value="2" <?php if($mdl_poo_control == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_poo_control" id="F" value="3" <?php if($mdl_poo_control == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_poo_control" id="F" value="4" <?php if($mdl_poo_control == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_poo_control" id="F" value="5" <?php if($mdl_poo_control == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>????????????</th>
		  <td><input type="radio" name="mdl_urine_control" id="F" value="1" <?php if($mdl_urine_control == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_urine_control" id="F" value="2" <?php if($mdl_urine_control == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_urine_control" id="F" value="3" <?php if($mdl_urine_control == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_urine_control" id="F" value="4" <?php if($mdl_urine_control == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_urine_control" id="F" value="5" <?php if($mdl_urine_control == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>??????</th>
		  <td><input type="radio" name="mdl_walk" id="F" value="1"  <?php if($mdl_walk == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_walk" id="F" value="2"  <?php if($mdl_walk == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_walk" id="F" value="3"  <?php if($mdl_walk == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_walk" id="F" value="4"  <?php if($mdl_walk == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_walk" id="F" value="5"  <?php if($mdl_walk == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>???????????????</th>
		  <td><input type="radio" name="mdl_wheelchair" id="F" value="1" <?php if($mdl_wheelchair == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_wheelchair" id="F" value="2" <?php if($mdl_wheelchair == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_wheelchair" id="F" value="3" <?php if($mdl_wheelchair == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_wheelchair" id="F" value="4" <?php if($mdl_wheelchair == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_wheelchair" id="F" value="5" <?php if($mdl_wheelchair == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
                <tr>
          <th>??????</th>
		  <td><input type="radio" name="mdl_movement" id="F" value="1" <?php if($mdl_movement == "1" ) { echo "checked=true";}?> ></td>
		  <td><input type="radio" name="mdl_movement" id="F" value="2" <?php if($mdl_movement == "2" ) { echo "checked=true";}?> ></td>
		   <td><input type="radio" name="mdl_movement" id="F" value="3" <?php if($mdl_movement == "3" ) { echo "checked=true";}?> ></td>	
		    <td><input type="radio" name="mdl_movement" id="F" value="4" <?php if($mdl_movement == "4" ) { echo "checked=true";}?> ></td>	
		     <td><input type="radio" name="mdl_movement" id="F" value="5" <?php if($mdl_movement == "5" ) { echo "checked=true";}?> ></td>	 	
        </tr>
            <tr>
         <th>??????</th>
          <td colspan="2"><? echo $mdl_total ?> 
         <? if($mdl_total <25) echo "Total(?????????)"?>
         <? if( 24< $mdl_total and  $mdl_total<50) echo "Severe(??????)" ?>
         <? if (49< $mdl_total and $mdl_total <75) echo "Moderate(?????????,?????????)" ?>
         <? if (74< $mdl_total and $mdl_total <91) echo "Mild(?????????,?????????)" ?>
         <? if (90< $mdl_total and $mdl_total <100) echo "Minimal(????????????)" ?>
         </td>
     
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
</div> <!-- end of col2 -->
</div> <!-- end of content -->
</div> <!-- end of wrap -->

<div id="spot" style="position:absolute;padding:20px 25px;left:50%;top:50%;width:100px;height:auto;background-color:#fff;border:5px solid #3571B5;visibility:hidden;">
????????? ????????????!
</div>

</body>
</html>
<?php }else{ ?>

<script>
    alert("????????? ??? ????????? ??? ????????????!");
    history.back();
</script>

<?php } ?>