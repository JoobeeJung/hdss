<?php
 $man_id = $_REQUEST["manager_id"];
 $man_name = $_REQUEST["manager_name"];
 $name = $_REQUEST["name"];
 $gender = $_REQUEST["gender"];
 $birth1 = $_REQUEST["birth1"];
 $birth2 = $_REQUEST["birth2"];
 $birth3 = $_REQUEST["birth3"]; 
 $edu = $_REQUEST["edu"];
 $disability = $_REQUEST["disability"];
 $major_disability = $_REQUEST["major_disability"];
 $mdt_retard = $_REQUEST["mdt_retard"];
 $mdt_Brain_lesion = $_REQUEST["mdt_Brain_lesion"];
 $mdt_see = $_REQUEST["mdt_see"];
 $mdt_hear = $_REQUEST["mdt_hear"];
 $mdt_language = $_REQUEST["mdt_language"];
 $mdt_face = $_REQUEST["mdt_face"];
 $mdt_respiratory = $_REQUEST["mdt_respiratory"];
 $mdt_heart = $_REQUEST["mdt_heart"];
 $mdt_kidney = $_REQUEST["mdt_kidney"];
 $mdt_liver = $_REQUEST["mdt_liver"];
 $mdt_stoma_urostomy = $_REQUEST["mdt_stoma_urostomy"];
 $mdt_epilepsy = $_REQUEST["mdt_epilepsy"];
 $mdt_intellectual = $_REQUEST["mdt_intellectual"];
 $mdt_mental = $_REQUEST["mdt_mental"];
 $mdt_development = $_REQUEST["mdt_development"];
 $member_id = $_REQUEST["member_id"];
  $delay_type = $_REQUEST["delay_type"];
 $major_disease = $_REQUEST["major_disease"];
 $birth = $birth1."-".$birth2."-".$birth3;

 
 $mr1_onset1 = $_REQUEST["mr1_onset1"];
 $mr1_onset2 = $_REQUEST["mr1_onset2"];
 
 $mr1_pain_point = $_REQUEST["mr1_pain_point"];
 $mr1_pain_level = $_REQUEST["mr1_pain_level"];
 $mr1_medicine = $_REQUEST["mr1_medicine"];
 $mr1_helpingtool = $_REQUEST["mr1_helpingtool"];
 $mr1_pedestal = $_REQUEST["mr1_pedestal"];
 $mr1_extra_instrument = $_REQUEST["mr1_extra_instrument"];
 $mr1_caregiver = $_REQUEST["mr1_caregiver"];
 $mr1_family = $_REQUEST["mr1_family"];
 $member_id = $_REQUEST["member_id"];
 $mr1_onset = $mr1_onset1."-".$mr1_onset2."-"."00";
 
 $mr2_consciousness = $_REQUEST["mr2_consciousness"];
 $mr2_communication = $_REQUEST["mr2_communication"];
 $mr2_breath = $_REQUEST["mr2_breath"];
 $mr2_nutrition = $_REQUEST["mr2_nutrition"];
 $mr2_dysphagia = $_REQUEST["mr2_dysphagia"];
 $mr2_right_arm = $_REQUEST["mr2_right_arm"];
 $mr2_left_arm = $_REQUEST["mr2_left_arm"];
 $mr2_right_leg = $_REQUEST["mr2_right_leg"];
 $mr2_left_leg = $_REQUEST["mr2_left_leg"];
 $mr2_movement_level = $_REQUEST["mr2_movement_level"];
  $mr2_active_level = $_REQUEST["mr2_active_level"];
 $mr2_function_level = $_REQUEST["mr2_function_level"];
  $mr2_mna_1 = $_REQUEST["mr2_mna_1"];
 $mr2_mna_2 = $_REQUEST["mr2_mna_2"];
  $mr2_mna_3 = $_REQUEST["mr2_mna_3"];
 $mr2_mna_4 = $_REQUEST["mr2_mna_4"];
  $mr2_mna_5 = $mr2_mna_1 + $mr2_mna_2 + $mr2_mna_3 + $mr2_mna_4;
 $mr2_FRAX_total = $_REQUEST["mr2_FRAX_total"];
  $mr2_FRAX_tscore = $_REQUEST["mr2_FRAX_tscore"];
 $mr2_SFT_1 = $_REQUEST["mr2_SFT_1"];
  $mr2_SFT_2 = $_REQUEST["mr2_SFT_2"];
 $mr2_MAS4 = $_REQUEST["mr2_MAS4"];
 
 
 
   $mbe_blood_pressure1 = $_REQUEST["mbe_blood_pressure1"];
    $mbe_blood_pressure2 = $_REQUEST["mbe_blood_pressure2"];
 $mbe_pulse = $_REQUEST["mbe_pulse"];
   $mbe_breath = $_REQUEST["mbe_breath"];
 $mbe_temperature = $_REQUEST["mbe_temperature"];
   $mbe_weight = $_REQUEST["mbe_weight"];
 $mbe_height = $_REQUEST["mbe_height"];
   $mbe_bmi = $_REQUEST["mbe_bmi"];
 $mbe_blood_glucose_before = $_REQUEST["mbe_blood_glucose_before"];
   $mbe_blood_glucose_after = $_REQUEST["mbe_blood_glucose_after"];
 $mbe_chol = $_REQUEST["mbe_chol"];
   $mbe_tg = $_REQUEST["mbe_tg"];
 $mbe_department = $_REQUEST["mbe_department"];

   $mdl_hygiene = $_REQUEST["mdl_hygiene"];
   $mdl_bath = $_REQUEST["mdl_bath"];
   $mdl_meal = $_REQUEST["mdl_meal"];
   $mdl_toilet = $_REQUEST["mdl_toilet"];
   $mdl_stair = $_REQUEST["mdl_stair"]; 
   $mdl_clothe = $_REQUEST["mdl_clothe"];
   $mdl_poo_control = $_REQUEST["mdl_poo_control"];
   $mdl_urine_control = $_REQUEST["mdl_urine_control"];
   $mdl_walk = $_REQUEST["mdl_walk"]; 
   $mdl_wheelchair = $_REQUEST["mdl_wheelchair"]; 
   $mdl_movement = $_REQUEST["mdl_movement"]; 
   $mdl_total = $mdl_hygiene + $mdl_bath + $mdl_meal + $mdl_toilet + $mdl_stair + $mdl_clothe + $mdl_poo_control + $mdl_urine_control + $mdl_walk + $mdl_wheelchair + $mdl_movement;
 
 
 
  if(isset($_REQUEST["mode"]))  //modify_form에서 호출할 경우
    $mode=$_REQUEST["mode"];
 else 
    $mode="";
 
 require_once("../lib/MYDB.php");  
 $pdo = db_connect();   
 
 try{
    $pdo->beginTransaction();   
    $sql = "insert into interlaw88.member(member_manager_id, 
    member_manager_name, member_name, member_gender, member_birthdate, 
     member_edu, member_disability, member_major_disability, 
    member_delay_type, member_major_disease, member_id, member_first_registration, member_last_registration)";
    $sql.= " VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?,now(),now())"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $man_id, PDO::PARAM_STR);
    $stmh->bindValue(2, $man_name, PDO::PARAM_STR);
    $stmh->bindValue(3, $name, PDO::PARAM_STR);
    $stmh->bindValue(4, $gender, PDO::PARAM_STR);
    $stmh->bindValue(5, $birth, PDO::PARAM_STR);
    $stmh->bindValue(6, $edu, PDO::PARAM_STR);
    $stmh->bindValue(7, $disability, PDO::PARAM_STR);
    $stmh->bindValue(8, $major_disability, PDO::PARAM_STR);
    $stmh->bindValue(9, $delay_type, PDO::PARAM_STR);
    $stmh->bindValue(10, $major_disease, PDO::PARAM_STR);
    $stmh->bindValue(11, $member_id, PDO::PARAM_STR);

   
    $stmh->execute();
    $pdo->commit(); 
    
    
    $pdo->beginTransaction();   
    $select_sql = "select member_num from interlaw88.member where member_id = '$member_id'";  
    $stmh = $pdo->prepare($select_sql);    
      $stmh->execute();
     $row = $stmh->fetch(PDO::FETCH_ASSOC);   
     $member_num =$row["member_num"];
    
    $pdo->commit(); 
    
     
     
    $pdo->beginTransaction();   
    $sql = "insert into interlaw88.member_disability_type(member_num, 
    mdt_retard, mdt_Brain_lesion, mdt_see, mdt_hear, 
    mdt_language, mdt_face, mdt_respiratory, mdt_heart, 
    mdt_kidney, mdt_liver, mdt_stoma_urostomy, mdt_epilepsy,
    mdt_intellectual,mdt_mental,mdt_development)";
    $sql.= " VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?)"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $member_num, PDO::PARAM_STR);
    $stmh->bindValue(2, $mdt_retard, PDO::PARAM_STR);
    $stmh->bindValue(3, $mdt_Brain_lesion, PDO::PARAM_STR);
    $stmh->bindValue(4, $mdt_see, PDO::PARAM_STR);
    $stmh->bindValue(5, $mdt_hear, PDO::PARAM_STR);
    $stmh->bindValue(6, $mdt_language, PDO::PARAM_STR);
    $stmh->bindValue(7, $mdt_face, PDO::PARAM_STR);
    $stmh->bindValue(8, $mdt_respiratory, PDO::PARAM_STR);
    $stmh->bindValue(9, $mdt_heart, PDO::PARAM_STR);
    $stmh->bindValue(10, $mdt_kidney, PDO::PARAM_STR);
    $stmh->bindValue(11, $mdt_liver, PDO::PARAM_STR);
    $stmh->bindValue(12, $mdt_stoma_urostomy, PDO::PARAM_STR);
    $stmh->bindValue(13, $mdt_epilepsy, PDO::PARAM_STR);
    $stmh->bindValue(14, $mdt_intellectual, PDO::PARAM_STR);
    $stmh->bindValue(15, $mdt_mental, PDO::PARAM_STR);  
    $stmh->bindValue(16, $mdt_development, PDO::PARAM_STR);    

    $stmh->execute();
    $pdo->commit(); 
    
    $pdo->beginTransaction();   
    $sql = "insert into interlaw88.member_disease_type(member_num)";
    $sql.= " VALUES(?)"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $member_num, PDO::PARAM_STR);

    $stmh->execute();
    $pdo->commit(); 
    
    
    $pdo->beginTransaction();   
    $sql = "insert into interlaw88.member_basic_examination(member_num, mbe_blood_pressure1,mbe_blood_pressure2,
    mbe_pulse, mbe_breath, mbe_temperature, mbe_weight, mbe_height, mbe_bmi, mbe_blood_glucose_before, 
    mbe_blood_glucose_after, mbe_chol, mbe_tg, mbe_department)";
    $sql.= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $member_num, PDO::PARAM_STR);
    $stmh->bindValue(2, $mbe_blood_pressure1, PDO::PARAM_STR);
    $stmh->bindValue(3, $mbe_blood_pressure1, PDO::PARAM_STR);
    $stmh->bindValue(4, $mbe_pulse, PDO::PARAM_STR);
    $stmh->bindValue(5, $mbe_breath, PDO::PARAM_STR);
    $stmh->bindValue(6, $mbe_temperature, PDO::PARAM_STR);
    $stmh->bindValue(7, $mbe_weight, PDO::PARAM_STR);
    $stmh->bindValue(8, $mbe_height, PDO::PARAM_STR);
    $stmh->bindValue(9, $mbe_bmi, PDO::PARAM_STR);
    $stmh->bindValue(10, $mbe_blood_glucose_before, PDO::PARAM_STR);
    $stmh->bindValue(11, $mbe_blood_glucose_after, PDO::PARAM_STR);
    $stmh->bindValue(12, $mbe_chol, PDO::PARAM_STR);
    $stmh->bindValue(13, $mbe_tg, PDO::PARAM_STR); 
    $stmh->bindValue(14, $mbe_department, PDO::PARAM_STR); 
        
    $stmh->execute();
    $pdo->commit(); 


    $pdo->beginTransaction();   
    $sql = "insert into interlaw88.member_daily_living(member_num, mdl_total, 
    mdl_hygiene, mdl_bath, mdl_meal, mdl_toilet, mdl_stair, mdl_clothe, mdl_poo_control, 
    mdl_urine_control, mdl_walk, mdl_wheelchair, mdl_movement)";
    $sql.= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $member_num, PDO::PARAM_STR);
    $stmh->bindValue(2, $mdl_total, PDO::PARAM_STR);
    $stmh->bindValue(3, $mdl_hygiene, PDO::PARAM_STR);
    $stmh->bindValue(4, $mdl_bath, PDO::PARAM_STR);
    $stmh->bindValue(5, $mdl_meal, PDO::PARAM_STR);
    $stmh->bindValue(6, $mdl_toilet, PDO::PARAM_STR);
    $stmh->bindValue(7, $mdl_stair, PDO::PARAM_STR);
    $stmh->bindValue(8, $mdl_clothe, PDO::PARAM_STR);
    $stmh->bindValue(9, $mdl_poo_control, PDO::PARAM_STR);
    $stmh->bindValue(10, $mdl_urine_control, PDO::PARAM_STR);
    $stmh->bindValue(11, $mdl_walk, PDO::PARAM_STR);
    $stmh->bindValue(12, $mdl_wheelchair, PDO::PARAM_STR);
    $stmh->bindValue(13, $mdl_movement, PDO::PARAM_STR);


    $stmh->execute();
    $pdo->commit(); 
    
    $pdo->beginTransaction();   
    $sql = "insert into interlaw88.member_rehabilitation1(member_num, mr1_onset, 
    mr1_pain_point, mr1_pain_level, mr1_medicine, mr1_helpingtool, mr1_pedestal, 
    mr1_extra_instrument,mr1_caregiver, mr1_family)";
    $sql.= " VALUES(?,?,?,?,?,?,?,?,?,?)"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $member_num, PDO::PARAM_STR);
    $stmh->bindValue(2, $mr1_onset, PDO::PARAM_STR);
    $stmh->bindValue(3, $mr1_pain_point, PDO::PARAM_STR);
    $stmh->bindValue(4, $mr1_pain_level, PDO::PARAM_STR);
    $stmh->bindValue(5, $mr1_medicine, PDO::PARAM_STR);
    $stmh->bindValue(6, $mr1_helpingtool, PDO::PARAM_STR);
    $stmh->bindValue(7, $mr1_pedestal, PDO::PARAM_STR);
    $stmh->bindValue(8, $mr1_extra_instrument, PDO::PARAM_STR);
    $stmh->bindValue(9, $mr1_caregiver, PDO::PARAM_STR);
    $stmh->bindValue(10, $mr1_family, PDO::PARAM_STR);
        
    $stmh->execute();
    $pdo->commit(); 
    
        $pdo->beginTransaction();   
    $sql = "insert into interlaw88.member_rehabilitation2(member_num, mr2_consciousness
    , mr2_communication, mr2_breath, mr2_nutrition, mr2_dysphagia, mr2_right_arm, 
    mr2_left_arm, mr2_right_leg, mr2_left_leg, mr2_movement_level, 
    mr2_active_level, mr2_function_level, mr2_mna_1, mr2_mna_2, mr2_mna_3, mr2_mna_4, mr2_mna_5, 
    mr2_FRAX_total, mr2_FRAX_tscore, mr2_SFT_1, mr2_SFT_2, mr2_MAS4)";
    $sql.= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
    $stmh = $pdo->prepare($sql); 
    $stmh->bindValue(1, $member_num, PDO::PARAM_STR);
    $stmh->bindValue(2, $mr2_consciousness, PDO::PARAM_STR);
    $stmh->bindValue(3, $mr2_communication, PDO::PARAM_STR);
    $stmh->bindValue(4, $mr2_breath, PDO::PARAM_STR);
    $stmh->bindValue(5, $mr2_nutrition, PDO::PARAM_STR);
    $stmh->bindValue(6, $mr2_dysphagia, PDO::PARAM_STR);
    $stmh->bindValue(7, $mr2_right_arm, PDO::PARAM_STR);
    $stmh->bindValue(8, $mr2_left_arm, PDO::PARAM_STR);
    $stmh->bindValue(9, $mr2_right_leg, PDO::PARAM_STR);
    $stmh->bindValue(10, $mr2_left_leg, PDO::PARAM_STR);
    $stmh->bindValue(11, $mr2_movement_level, PDO::PARAM_STR);
    $stmh->bindValue(12, $mr2_active_level, PDO::PARAM_STR);
    $stmh->bindValue(13, $mr2_function_level, PDO::PARAM_STR);
    $stmh->bindValue(14, $mr2_mna_1, PDO::PARAM_STR);
    $stmh->bindValue(15, $mr2_mna_2, PDO::PARAM_STR);
    $stmh->bindValue(16, $mr2_mna_3, PDO::PARAM_STR);
    $stmh->bindValue(17, $mr2_mna_4, PDO::PARAM_STR);
    $stmh->bindValue(18, $mr2_mna_5, PDO::PARAM_STR);
    $stmh->bindValue(19, $mr2_FRAX_total, PDO::PARAM_STR);
    $stmh->bindValue(20, $mr2_FRAX_tscore, PDO::PARAM_STR);
    $stmh->bindValue(21, $mr2_SFT_1, PDO::PARAM_STR);
    $stmh->bindValue(22, $mr2_SFT_2, PDO::PARAM_STR);
    $stmh->bindValue(23, $mr2_MAS4, PDO::PARAM_STR);
    
            
    $stmh->execute();
    $pdo->commit();     
 header("Location:http://interlaw88.cafe24.com/member/member_list.php");
  } catch (PDOException $Exception) {
        $pdo->rollBack();
        print "오류: ".$Exception->getMessage();
  }
?>
