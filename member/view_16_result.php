<?php
 session_start(); 
   
 $file_dir = 'C:\xampp\htdocs\editor\popup\upload\\'; 
  
 ##$num=$_REQUEST["num"];
   
 require_once("../lib/MYDB.php");
 $pdo = db_connect();
 $num=$_GET["num"];
 $member_ex_level1 = $_GET["member_ex_level1"];
 $member_ex_level2 = $_GET["member_ex_level2"];
 $member_ex_type1 = $_GET["member_ex_type1"];
 $member_ex_type2 = $_GET["member_ex_type2"]; 
 $member_ex_type3 = $_GET["member_ex_type3"];
 $member_ex_type4 = $_GET["member_ex_type4"];
 $position1 = $_GET["position1"]; 
 $position2 = $_GET["position2"];
 $position3 = $_GET["position3"];

 $selectarray =  array(
 
 array($member_ex_level1, $member_ex_level2), 
 array($member_ex_type1, $member_ex_type2, $member_ex_type3, $member_ex_type4 ), 
 array($position1, $position2, $position3)
 );
 


try{

     $sql = "select * from interlaw88.member where member_num= $num";
     $stmh = $pdo->prepare($sql);  
     $stmh->execute();  
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
     $md = $row["member_disability"];
     $member_num = $row["member_num"];
     $member_name = $row["member_name"];
     $member_gender = $row["member_gender"];     
     $member_mananger_num = $row["member_manager_num"];
     $member_manager_id = $row["member_manager_id"];
     $member_major_disability = $row["member_major_disability"];     
     $member_delay_type = $row["member_delay_type"];

     
     
     $sql3 = "select * from interlaw88.member_rehabilitation2 where member_num= $num";
     $stmh3 = $pdo->prepare($sql3);  
     $stmh3->execute();  
     $row3 = $stmh3->fetch(PDO::FETCH_ASSOC);
     $mr2_right_arm=$row3["mr2_right_arm"];
     $mr2_left_arm=$row3["mr2_left_arm"];
     $mr2_right_leg=$row3["mr2_right_leg"]; 
     $mr2_left_leg=$row3["mr2_left_leg"];  
     $mr2_function_level=$row3["mr2_function_level"]; 
      
       
  
     $sql4 = "select * from interlaw88.member_basic_examination where member_num= $num";
     $stmh4 = $pdo->prepare($sql4);  
     $stmh4->execute();  
     $row4 = $stmh4->fetch(PDO::FETCH_ASSOC);
     $mbe_blood_pressure1=$row4["mbe_blood_pressure1"];
     $mbe_blood_pressure2=$row4["mbe_blood_pressure2"];
     $mbe_bmi=$row4["mbe_bmi"];
     $mbe_blood_glucose_before=$row4["mbe_blood_glucose_before"];
     $mbe_blood_glucose_after=$row4["mbe_blood_glucose_after"];
     $mbe_tg=$row4["mbe_tg"];
     $mbe_chol=$row4["mbe_chol"];
  
  
  


     
     
     
    # $item_num     = $row2["num"];
     #$item_date    = $row2["regist_day"];
     #$item_date    = substr($item_date,0,10);
     #$item_subject = str_replace(" ", "&nbsp;", $row2["subject"]);
     #$item_content = $row2["content"];
     #$high_blood_pressure = $row2["high_blood_pressure"];
     #$diabetes      = $row2["diabetes"];
     #$hyperlipidemia  = $row2["hyperlipidemia"];
     #$obesity      = $row2["obesity"];
     #$osteoporosis      = $row2["osteoporosis"];
     #$logic_num      = $row2["logic_num"];
     #$type1      = $row2["type1"];
     #$type2      = $row2["type2"];
     #$functional_level      = $row2["functional_level"];
     #$position      = $row2["position"];
     #$type_of_exercise      = $row2["type_of_exercise"];
     #$level      = $row2["level"];
      

            
   
 ?>
 


 
 <!DOCTYPE HTML>
 <html>
 <head> 
 <script type="text/javascript">
  var win=null;
  function printIt(printThis)  {
    win = window.open();
    self.focus();
    win.document.open();
    win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
    win.document.write('body, td { font-family: Verdana; font-size: 10pt;}');
    win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
    win.document.write(printThis);
    win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
    win.document.close();
    win.print();
    win.close();
  }
</script>



   <meta charset="utf-8">
 <link  rel="stylesheet" type="text/css" href="../css/common.css">
 <link  rel="stylesheet" type="text/css" href="../css/concert.css">

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
          <div id="title"><img src="../img/exercise_recommend.png" width="150",height="30" ></div>
        <div id="view_title">  
	  <div ></div> 
	   
          <div></div>	
	</div> 
<form name="member_ex_form" method="get" action="view_16_result.php?num=<?=$member_num?>"> 
<div id="printme">

<p> <b><font size="5"> <?	  print  $member_name 

 for($level = 0; $level < 2; $level++) {
    for($type = 0; $type < 4; $type++){
    for($position = 0; $position < 3; $position++)
    {
        echo $selectarray[$level][$type][$position] .", ";
        }
    }
}
  ?> ?????? ????????? ???????????? </font></b></p> 
<br> ???????????? :  <input type ="text" name="num" style="width:20px;"  value="<?=$member_num?> " >&nbsp<b>'<?	  print  $member_name  ?>'</b>?????? ?????? ?????? ???????????? <b><? print $member_manager_id ?>'</b>??? ?????????.
<br>????????? ??????????????? ??????????????? ???????????? ????????? ????????????????????????. ?????? ????????? ????????? ???????????? ??????????????? ????????????.
	</p>
	<form>
	<fieldset style="background-color:#F2F2F2" >
	<legend><span style="color:black">#????????????</span></legend>
	 <body>
    <table>
      <thead>
      </thead>
   
      <tbody>        
      <tr>
          <th style="float:center; " >????????????</th>
          <td><? print  $member_major_disability  ?>(<? print  $member_delay_type ?>)</td>
        </tr>
        <tr>
          <th style="float:center; " >??????</th>
          <td><?php if 
	($mr2_right_arm == "??????" || $mr2_left_arm ==  "??????"  ||  $mr2_right_leg ==  "??????"  || $mr2_left_leg == "??????" ) 
	echo "?????????" ; else echo "????????????"; ?></td>

        </tr>
        <tr>
          <th style="float:center; " >????????????</th>
          <td><? if ($mr2_function_level = '1' ) echo "?????? " ; else if ($mr2_function_level = '2' ) echo "??????" ; else if($mr2_function_level = '3' ) echo "??????"; ?> </td>

        </tr>
        <tr>
          <th style="float:center; " >BMI</th>
          <td> <? print $mbe_bmi ?> kg/m??</td>
          <td> <? if ($mbe_bmi > '250') echo "(??????)" ;  else echo "(??????)"; ?></td>
          
        </tr>
        <tr>
          <th style="float:center; " >???????????????</th>
          <td>  <? print $mbe_blood_glucose_before ?>% </td>
          <td> <? if ($mbe_bmi > '5.7') echo "(??????)" ; else echo "(??????)"; ?> </td>
        </tr>
        <tr>
          <th style="float:center; " >HDL???????????????, ????????????</th>
          <td>   <? print $mbe_chol ?>mg/dL, <? print $mbe_tg ?>mg/dL </td>
          <td>  <? if ($mbe_tg > '150' or  ($mbe_chol < '40' and $member_gender ='???') or ($mbe_chol < '50' and $member_gender ='???')  ) echo "(????????????)" ; else echo "(??????)"; ?> </td>
        </tr>
        
      </tbody>
    </table>
  </body>
	
</fieldset>
<br>
<fieldset style="background-color:#E6E6E6" >
    <legend ><span style="color:black" style="float:center; " >#????????????</span></legend>
			<body>
			<table style="float:center; " >
	        <thead>
            </thead>
			<tbody>
		<tr>
          <th style="float:center; ">????????????</th>
       		<td><input type="checkbox" name="member_ex_type1"  value="??????" <?php if($member_ex_type1 == "??????" ) { echo "checked=true";}?> >??????
       <input type="checkbox" name="member_ex_type2"  value="?????????" <?php if($member_ex_type2 == "?????????" ) { echo "checked=true";}?> >?????????
       <input type="checkbox" name="member_ex_type3"  value="?????????" <?php if($member_ex_type3 == "?????????" ) { echo "checked=true";}?> >?????????
       <input type="checkbox" name="member_ex_type4"  value="??????" <?php if($member_ex_type4 == "??????" ) { echo "checked=true";}?> >??????

       </td> 
         </tr>
         
                  <tr>
          <th style="float:center; ">????????????</th>
       		<td><input type="checkbox" name="position1"  value="??????" <?php if($position1 == "??????" ) { echo "checked=true";}?> >??????
       <input type="checkbox" name="position2"  value="??????" <?php if($position2 == "??????" ) { echo "checked=true";}?> >??????
       <input type="checkbox" name="position3"  value="??????" <?php if($position3 == "??????" ) { echo "checked=true";}?> >??????
       
       </td> 
         </tr>
         
         <tr>
          <th style="float:center; " >?????????</th>
      		 <td><input type="checkbox" name="member_ex_level1"  value="???"  <?php if($member_ex_level1 == "???" ) { echo "checked=true";}?>  >???
         <input type="checkbox" name= "member_ex_level2"  value="???"  <?php if($member_ex_level2 == "???" ) { echo "checked=true";}?> >???
       </td>
         </tr>
         	
         </tbody>
         	</table>
         </body>
         <td id="button" style="float:center; " ><input type="submit" value="????????????"></td> <!--<a href="http://interlaw88.cafe24.com/test/updatePro_ex.php"> <onclick="check_input()"><b> ???????????? ??????</b> </a> </td>--!>
	</form>
                         </fieldset>  
                         <br>                                                      
       <fieldset>
    <legend >#????????? <? 
    			
    					
   				if ( 
   				$member_ex_type1 == "??????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1') 
   					  and
   					  ( position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #1/15 1/7  / 315
   					 
   				else if ( 
   				$member_ex_type1 == "??????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position2 == "??????" and
				empty ($position1) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= '$member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1') 
   					  and
   					  ( position = '$position2' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #1/15 2/7  / 315
   					 
   					 
   			     else if ( 
   				$member_ex_type1 == "??????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position3 == "??????" and
				empty ($position1) and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1') 
   					  and
   					  ( position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #1/15 3/7  / 315


   			     else if ( 
   				$member_ex_type1 == "??????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" 
   				and $position2 == "??????" and
				empty ($position3)		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1') 
   					  and
   					  ( position = '$position1' or position = '$position2' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #1/15 4/7  / 315
   					 
     			     else if ( 
   				$member_ex_type1 == "??????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" 
   				and $position3 == "??????" and
				empty ($position2)		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1') 
   					  and
   					  ( position = '$position1' or position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #1/15 5/7  / 315 					 

	     else if ( 
   				$member_ex_type1 == "??????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position2 == "??????"
   				and $position3 == "??????" and
				empty ($position1)		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1') 
   					  and
   					  ( position = '$position2' or position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #1/15 6/7  / 315 		

	     else if ( 
   				$member_ex_type1 == "??????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????"
   				and $position2 == "??????"
   				and $position3 == "??????" 
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1') 
   					  and
   					  (position = '$position1' or position = '$position2' or position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #1/15 7/7  / 315 	

 			    else if ( 
 			    $member_ex_type2 == "?????????"and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  ( type_of_exercise = '$member_ex_type2' )
   					  and
   					 ( position = '$position1' )
   					 and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #2/15 1/7 / 315
				
				
				else if ( 
			    $member_ex_type2 == "?????????"and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4)
   				and $position2 == "??????" and
				empty ($position1) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= '$member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type2') 
   					  and
   					  ( position = '$position2' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #2/15 2/7  / 315

				else if ( 
			    $member_ex_type2 == "?????????"and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4)
   				and $position3 == "??????" and
				empty ($position1) and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= '$member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type2') 
   					  and
   					  ( position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #2/15 3/7  / 315

				else if ( 
			    $member_ex_type2 == "?????????"and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4)
   				and $position1 == "??????" and
   				    $position2 == "??????" and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= '$member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type2') 
   					  and
   					  ( position = '$position1' or position = '$position2')
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #2/15 4/7  / 315
   					 
   					 
   				else if ( 
			    $member_ex_type2 == "?????????"and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4)
   				and $position1 == "??????" and
   				    $position3 == "??????" and
				empty ($position2)	
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= '$member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type2') 
   					  and
   					  ( position = '$position1' or position = '$position3')
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #2/15 5/7  / 315	 

   				else if ( 
			    $member_ex_type2 == "?????????"and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4)
   				and $position2 == "??????" and
   				    $position3 == "??????" and
				empty ($position1) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= '$member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type2') 
   					  and
   					  ( position = '$position2' or position = '$position3')
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #2/15 6/7  / 315	

   				else if ( 
			    $member_ex_type2 == "?????????"and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4)
   				and $position1 == "??????" and
   				    $position2 == "??????" and
   				    $position3 == "??????" 	
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{
     			  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= '$member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type2') 
   					  and
   					  ( position = '$position1' or position = '$position2' or position = '$position3')
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   					$stmh2 = $pdo->prepare($sql2);  
   			 	    $stmh2->execute();           
   				    $count = $stmh2->rowCount();  
     
   					}
   					 #2/15 7/7  / 315
   					 
   				else if ( $member_ex_type3 == "?????????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  ( type_of_exercise = '$member_ex_type3' )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #3/15 1/7 / 315

   				else if ( $member_ex_type3 == "?????????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type4) 
   				and $position2 == "??????" and
				empty ($position1) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  ( type_of_exercise = '$member_ex_type3' )
   					  and
   					  (position = '$position2' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #3/15 2/7 / 315

   				else if ( $member_ex_type3 == "?????????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type4) 
   				and $position3 == "??????" and
				empty ($position1) and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  ( type_of_exercise = '$member_ex_type3' )
   					  and
   					  (position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #3/15 3/7 / 315

   				else if ( $member_ex_type3 == "?????????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				    $position2 == "??????" and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  ( type_of_exercise = '$member_ex_type3' )
   					  and
   					  (position = '$position1' or position = '$position2'  )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #3/15 4/7 / 315

   				else if ( $member_ex_type3 == "?????????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				    $position3 == "??????" and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  ( type_of_exercise = '$member_ex_type3' )
   					  and
   					  (position = '$position1' or position = '$position3'  )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #3/15 5/7 / 315

   				else if ( $member_ex_type3 == "?????????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type4) 
   				and $position2 == "??????" and
				    $position3 == "??????" and
				empty ($position1) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  ( type_of_exercise = '$member_ex_type3' )
   					  and
   					  (position = '$position2' or position = '$position3'  )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #3/15 6/7 / 315

   				else if ( $member_ex_type3 == "?????????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type4) 
   				and $position2 == "??????" and
				    $position3 == "??????" and
					 $position1 == "??????" 
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  ( type_of_exercise = '$member_ex_type3' )
   					  and
   					  (position = '$position1' or position = '$position2' or position = '$position3'  )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #3/15 7/7 / 315
     		    	 
   				else if ( $member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position1') 
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #4/15 1/7 / 315

   				else if ( $member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) 
   				and $position2 == "??????" and
				empty ($position1) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position2') 
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #4/15 2/7 / 315

   				else if ( $member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) 
   				and $position3 == "??????" and
				empty ($position1) and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position3') 
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					} 
    		    	 #4/15 3/7 / 315


   				else if ( $member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) 
   				and $position1 == "??????" and $position2 == "??????" and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position1' or position = '$position2') 
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #4/15 4/7 / 315

   				else if ( $member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) 
   				and $position1 == "??????" and $position3 == "??????" and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position1' or position = '$position3') 
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #4/15 5/7 / 315

   				else if ( $member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) 
   				and $position2 == "??????" and $position3 == "??????" and
				empty ($position1) 	
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position2' or position = '$position3') 
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #4/15 6/7 / 315

   				else if ( $member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) 
   				and $position1 == "??????" and $position2 == "??????" and $position3 == "??????"
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position1' or position = '$position2' or position = '$position3') 
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #4/15 7/7 / 315

				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #5/15 1/7 / 315

				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position2 == "??????" and
				empty ($position1) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' )
   					  and
   					  (position = '$position2' )
   					  and
   					  (level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #5/15 2/7 / 315
  
  				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position3 == "??????" and
				empty ($position1) and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' )
   					  and
   					  (position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #5/15 3/7 / 315

  				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and $position2 == "??????" and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' )
   					  and
   					  (position = '$position1' or position = '$position2' )
   					  and
   					  (level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #5/15 4/7 / 315

  				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and $position3 == "??????" and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' )
   					  and
   					  (position = '$position1' or position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #5/15 5/7 / 315

  				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position2 == "??????" and $position3 == "??????" and
				empty ($position2) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' )
   					  and
   					  (position = '$position2' or position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #5/15 6/7 / 315

  				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				empty ($member_ex_type3) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and $position2 == "??????" and	 $position3 == "??????" 
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' )
   					  and
   					  (position = '$position1' or  position = '$position2' or position = '$position3' )
   					  and
   					  (level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #5/15 7/7 / 315
     		    	 
				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type3 == "?????????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type3')
   					   and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1' )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #6/15 1/7 / 315
     		    	 
     		    else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type4 == "??????" and
   				empty ($member_ex_type2) and
   				empty ($member_ex_type3) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)	     		    	 
   				 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position1')
   					  and
   					  (level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #7/15 / 315
     		    	   
				else if ( 
				$member_ex_type2 == "?????????" and
   				$member_ex_type3 == "?????????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
     			{ $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (
   					  type_of_exercise = '$member_ex_type2' or
   					  type_of_exercise = '$member_ex_type3') 
   					  and
   					  (position = '$position1' )
   					  and
   					  ( level =   '$member_ex_level1'  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #8/15 / 315   
     		    	 
				else if ( 
				$member_ex_type2 == "?????????" and
   				$member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type3) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				 { $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (
   					  type_of_exercise = '$member_ex_type2' or
   					  type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1'
   					  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #9/15 / 315  
     		    	 
				else if ( 
				$member_ex_type3 == "?????????" and
   				$member_ex_type4 == "??????" and
   				empty ($member_ex_type1) and
   				empty ($member_ex_type2) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type3' or
   					  type_of_exercise = '$member_ex_type4' )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1'
   					  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #10/15 / 315   
     		    	 
				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				$member_ex_type3 == "?????????" and
   				empty ($member_ex_type4) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' or
   					  type_of_exercise = '$member_ex_type3' 
   					  )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1'
   					  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #11/15 / 315   

				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type2 == "?????????" and
   				$member_ex_type4 == "??????" and
   				empty ($member_ex_type3) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' or
   					  type_of_exercise = '$member_ex_type4' 
   					  )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1'
   					  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #12/15 / 315      
     		    	   		    	      		    	   			
				else if ( 
				$member_ex_type1 == "??????" and
   				$member_ex_type3 == "?????????" and
   				$member_ex_type4 == "??????" and
   				empty ($member_ex_type2) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type3' or
   					  type_of_exercise = '$member_ex_type4' 
   					  )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1'
   					  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #13/15 / 315  
     		    	 
     		    	 
				else if ( 
				$member_ex_type2 == "?????????" and
   				$member_ex_type3 == "?????????" and
   				$member_ex_type4 == "??????" and
   				empty ($member_ex_type1) 
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (
   					  type_of_exercise = '$member_ex_type2' or
   					  type_of_exercise = '$member_ex_type3' or
   					  type_of_exercise = '$member_ex_type4'
   					  )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1')
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #14/15 / 315      		    	  	

				else if ( 
				$member_ex_type1 == "??????" and
				$member_ex_type2 == "?????????" and
   				$member_ex_type3 == "?????????" and
   				$member_ex_type4 == "??????"
   				and $position1 == "??????" and
				empty ($position2) and
				empty ($position3) 		
   				and  $member_ex_level1 == "???" and
   				empty ($member_ex_level2)
   				)
   				{  $sql2 = "select * from interlaw88.content 
   					  where 
   					  (type1='$member_major_disability' and ( type2= 'member_delay_type' or type2='$member_major_disability' ))
   					  and 
   					  (
   					  type_of_exercise = '$member_ex_type1' or
   					  type_of_exercise = '$member_ex_type2' or
   					  type_of_exercise = '$member_ex_type3' or
   					  type_of_exercise = '$member_ex_type4' 
   					  )
   					  and
   					  (position = '$position1' )
   					  and
   					  (level =   '$member_ex_level1'
   					  )
   					 " ;
   					 
   				     $stmh2 = $pdo->prepare($sql2);  
   			     	 $stmh2->execute();           
 					 $count = $stmh2->rowCount();  
     
     					}
     		    	 #15/15 / 315  
     		    	 
     		    	 
     		    	 
    
    echo $count ?>?????? ?????? ?????????</legend>
     <div id="view_content" style="width:700px; float:center; " >
         <!--   <tr>--!>
           
           <?php  // ??? ?????? ??????
           
	
           
             while($row2 = $stmh2->fetch(PDO::FETCH_ASSOC)){
             $item_num     = $row2["num"];
    		 $item_date    = $row2["regist_day"];
    		 $item_date    = substr($item_date,0,10);
   		     $item_subject = str_replace(" ", "&nbsp;", $row2["subject"]);
   			 $item_content = $row2["content"];
    		 $high_blood_pressure = $row2["high_blood_pressure"];
     		 $diabetes      = $row2["diabetes"];
    		 $hyperlipidemia  = $row2["hyperlipidemia"];
    		 $obesity      = $row2["obesity"];
    		 $osteoporosis      = $row2["osteoporosis"];
    		 $logic_num      = $row2["logic_num"];
    		 $type1      = $row2["type1"];
    		 $type2      = $row2["type2"];
   		     $functional_level      = $row2["functional_level"];
		     $position      = $row2["position"];
		     $type_of_exercise      = $row2["type_of_exercise"];
		     $level      = $row2["level"];
        
        
        	
             
         
?>

            <h4><?=$row2['subject'] ?> </h4>
             [????????????:<?=$item_num?>]&nbsp&nbsp<?=$type_of_exercise ?>??????&nbsp&nbsp ?????????&nbsp<?=$level ?>
              <? echo $high_blood_pressure ?> <? echo $diabetes ?> <? echo $obesity ?> <? echo $osteoporosis ?>
              <? if ($row2["high_blood_pressure"] == 'y') echo "(????????? ?????? ??????)"; else echo ""; ?>
              <? if ($row2["diabetes"] == 'y') echo "(?????? ?????? ??????)"; else echo ""; ?>
              <? if ($row2["hyperlipidemia"] == 'y') echo "(????????? ?????? ??????)"; else echo ""; ?>
              <? if ($row2["obesity"] == 'y') echo "(?????? ?????? ??????)"; else echo ""; ?>
              <? if ($row2["osteoporosis"] == 'y') echo "(???????????? ?????? ??????)"; else echo ""; ?> 
              <li style="width:700px; float:center; " > <?=$item_content?> </li><br> 
             <hr>
              
  
            
            <?php } ?>

  
		  </fieldset>
			</div>
	</div>
	<div class="clear"></div>
	
	  <?php
    if(isset($_SESSION["userid"])) {
	if( $_SESSION["userid"]=="interlaw88" )
        {
  ?>
<a href="javascript:printIt(document.getElementById('printme').innerHTML)" 
#print-button{display : none;}><button id="print-button" >????????????</button></a><p>

 <?php  	}
 ?>

 <?php
	}
  } catch (PDOException $Exception) {
       print "??????: ".$Exception->getMessage();
  }
 ?>
	
     </div> <!??? end of col2 ???>
  </div> <!??? end of content ???>
 </div> <!??? end of wrap ???>
 </body>
 </html>