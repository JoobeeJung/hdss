<?php $x=['type1','type2']?>
<?php
  session_start(); 
  
  if(isset($_SESSION["userid"])){
            if($_SESSION["userid"]=="interlaw88"){
         
  if(isset($_REQUEST["mode"]))  //수정 버튼을 클릭해서 호출했는지 체크
   $mode=$_REQUEST["mode"];
  else
   $mode="";
  
  if(isset($_REQUEST["num"]))  //수정 버튼을 클릭해서 호출했는지 체크
   $num=$_REQUEST["num"];
  else
   $num="";


  if ($mode=="modify"){
    try{
      require_once("../lib/MYDB.php");
      $pdo = db_connect();
  
      $sql = "select * from interlaw88.content where num = ? ";
      $stmh = $pdo->prepare($sql); 

    $stmh->bindValue(1,$num,PDO::PARAM_STR); 
      $stmh->execute();
      $count = $stmh->rowCount();              
    if($count<1){  
      print "검색결과가 없습니다.<br>";
     }else{
      $row = $stmh->fetch(PDO::FETCH_ASSOC);
      $item_subject = $row["subject"];
      $item_content = $row["content"];
      $item_disease_1=$row["high_blood_pressure"];
      $item_disease_2=$row["diabetes"];
      $item_disease_3=$row["hyperlipidemia"];
      $item_disease_4=$row["obesity"];
      $item_disease_5=$row["osteoporosis"];
      $item_order = $row["n_id"];   
      }
     }catch (PDOException $Exception) {
       print "오류: ".$Exception->getMessage();
     }
  }
?>
   <!DOCTYPE HTML>
   <html>
   <head> 
   <meta charset="utf-8">
   <link  rel="stylesheet" type="text/css" href="../css/common.css">
   <link  rel="stylesheet" type="text/css" href="../css/concert.css">
   <script type="text/javascript" src="../../editor/js//HuskyEZCreator.js" charset="utf-8"></script>
   </head>
 
   <script>
       function reset_form() //취소버튼 눌렀을때
{
    if(confirm("취소하시겠습니까?")){

   document.board_form.subject.value = "";
   document.board_form.content.value = "";
   document.board_form.high_blood_pressure.value="";
   document.board_form.diabetes.value="";
   document.board_form.hyperlipidemia.value="";
   document.boadr_form.obesity.value="";
   document.board_form.osteoporosis.value="";
   document.board_form.subject.focus();

  return;
    }
}

</script>
<div id="first">
   <body>
   <div id="wrap">
   <div id="header">
   <?php include "../lib/top_login2.php"; ?>
   </div>  
   <div id="menu">
   <?php include "../lib/top_menu2.php"; ?>
   </div>  
   <div id="content" style="overflow-y:auto">
     <div id="col1">
	<div id="left_menu">
        <?php include "../lib/left_menu2.php";?>
	</div>
     </div> 
  <div id="col2_1" >
      <div id="title"><img src="../img/exercise_menu.jpg"</div>
          <div class="clear"></div>
        <div id="write_form_title">
           운동컨텐츠(운동유형/자세) 신규등록
	</div>
           <div class="clear"></div>
  <?php
    if($mode=="modify"){
  ?>
	<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>" enctype="multipart/form-data" onsubmit="submitContents();"> 
  <?php  } else {
  ?>
            <form  name="board_form" method="post" action="insert.php" enctype="multipart/form-data" onsubmit="submitContents();"> 
  <?php
	}
  ?>
	<div id="write_form">
  <?php if($mode=="modify"){ ?>
            <div class="write_line"></div>
	<div id="write_row1">
            <div class="col1"> 목록 순서   </div>
            <div class="col2"><input type="text" name="n_id" size="10" 
                   value="<?=$item_order?>"></div> 
        </div><?php }?>
	    <div class="write_line"></div>
	<div id="write_row2">
            <div class="col1"> 운동 제목   </div>
            <div class="col2"><input type="text" name="subject" size="90" 
                <?php if($mode=="modify"){ ?>value="<?=$item_subject?>" <?php }?> required></div> 
	</div>
	    <div class="write_line"></div>
	<div id="write_row3">
            <div class="col1"> 설명   </div>
            <div class="col2"><textarea data-width="300"name="content"id="ir1" rows="10" cols="100" width="100px" charset="utf-8"><?php if($mode=="modify") print $item_content?></textarea>
<script type="text/javascript">

var oEditors = [];

nhn.husky.EZCreator.createInIFrame({

    oAppRef: oEditors,

    elPlaceHolder: "ir1",

    sSkinURI: "../../editor/SmartEditor2Skin.html",

    fCreator: "createSEditor2"
    

});

//var text = data.replace(/[<][^>]*[>]/gi, "");
// ‘저장’ 버튼을 누르는 등 저장을 위한 액션을 했을 때 submitContents가 호출된다고 가정한다.
</script><br><br><br>

            </div>
	</div>
     
            
            <div id ="category">
            <div class="clear"></div>
	 <div id="write_row4">
            &nbsp;&nbsp; 피해야할 질병 :    

            고혈압<input type="checkbox" name="high_blood_pressure" value="y" <?php if($mode=="modify" && $item_disease_1 == "y" ) { echo "checked=true";}?>>
            당뇨<input type="checkbox" name="diabetes" value="y"  <?php if($mode=="modify" && $item_disease_2 == "y" ) { echo "checked=true";}?>>
            고지혈<input type="checkbox" name="hyperlipidemia" value="y"  <?php if($mode=="modify" && $item_disease_3 == "y" ) { echo "checked=true";}?>>
            비만<input type="checkbox" name="obesity" value="y"  <?php if($mode=="modify" && $item_disease_4 == "y" ) { echo "checked=true";}?>>
            골다공증<input type="checkbox" name="osteoporosis" value="y"   <?php if($mode=="modify" && $item_disease_5 == "y" ) { echo "checked=true";}?>>
        </div>
                 <?php   if($mode!="modify"){?>
            <div class="clear"></div><br>
            &nbsp;&nbsp; 이 운동컨텐츠가 추가될 로직 :
            <div id="save">            
                         <br><br>
                        <div id="logic_0">                        
                            &nbsp;&nbsp; <select onchange="categoryChange1(this)" name="type1_0" id="type1_0">
                                <option value="NULL">--장애유형1--</option>
                                <option value="뇌병변">뇌병변</option>
                                <option value="지체">지체</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>
                            </select>
                            
                            <script>
                            function categoryChange1(e){
                                var type2_1 = ["편마비","비편마비"];
                                var type2_2 = ["척수(경수)","척수(흉요수)","비척수"];
                                var type2_3 = ["시각"];
                                var type2_4 = ["청각"];
                                var type2_5 = ["발달"];
                                var target = document.getElementById("type2_0");
                                
                                if(e.value == "뇌병변") var d = type2_1;
                                else if(e.value=="지체") var d = type2_2;
                                else if(e.value=="시각") var d = type2_3;
                                else if(e.value=="청각") var d = type2_4;
                                else if(e.value=="발달") var d = type2_5;
                                
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>
                                                                 
                            <select name="type2_0" onchange="categoryChange2(this)" id="type2_0">
                                <option value="">--장애유형2--</option>      
                            </select>
         
                                                                                                  
                            <select name="functional_level_0" id="functional_level_0">
                                <option value="">--기능수준--</option>
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                                               
                            
                            <script>
                            function categoryChange2(e){
                                var functional_level_1 = ["눕기","앉기","서기"];
                                var functional_level_2 = ["눕기","앉기"];
                                var functional_level_3 = ["서기"];
                      
                                var target = document.getElementById("functional_level_0");
                                
                                if(e.value == "편마비") var d = functional_level_1;
                                else if(e.value=="비편마비") var d = functional_level_1;
                                else if(e.value=="척수(경수)") var d = functional_level_2;
                                else if(e.value=="척수(흉요수)") var d = functional_level_2;
                                else if(e.value=="비척수") var d = functional_level_1;
                                else if(e.value=="시각") var d= functional_level_3;
                                else if(e.value=="청각") var d= functional_level_3;
                                else if(e.value=="발달") var d= functional_level_3;
                                                                 
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>               
        
  
                            
                            <select name="position_0" id="position_0">
                                <option value="">--운동자세--</option>                                
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="type_of_exercise_0" id="type_of_exercise_0">
                                <option value="">--운동유형--</option> 
                                <option value="유연성">유연성</option>
                                <option value="근력">근력</option>
                                <option value="유산소">유산소</option>
                                <option value="균형">균형</option>
                            </select>
                            
                                                       
                            <select name="level_0" id="level_0">
                                <option value="">--난이도--</option> 
                                <option value="상">상</option>
                                <option value="하">하</option>
                            </select>
                            
                        </div>

                         <br>
      <div id="logic_1">                        
                            &nbsp;&nbsp; <select name="type1_1"  onchange="categoryChange1_1(this)" id="type1_1">                   
                                <option value="NULL">--장애유형1--</option>
                                <option value="뇌병변">뇌병변</option>
                                <option value="지체">지체</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>
                            </select>
                            
                            <script>
                            function categoryChange1_1(e){
                                var type2_1 = ["편마비","비편마비"];
                                var type2_2 = ["척수(경수)","척수(흉요수)","비척수"];
                                var type2_3 = ["시각"];
                                var type2_4 = ["청각"];
                                var type2_5 = ["발달"];
                                var target = document.getElementById("type2_1");
                                
                                if(e.value == "뇌병변") var d = type2_1;
                                else if(e.value=="지체") var d = type2_2;
                                else if(e.value=="시각") var d = type2_3;
                                else if(e.value=="청각") var d = type2_4;
                                else if(e.value=="발달") var d = type2_5;
                                
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>
                                                        
                            <select name="type2_1" onchange="categoryChange2_1(this)" id="type2_1">
                                <option value="">--장애유형2--</option>     
                            </select>
                            
                            <script>
                            function categoryChange2_1(e){
                                var functional_level_1 = ["눕기","앉기","서기"];
                                var functional_level_2 = ["눕기","앉기"];
                                var functional_level_3 = ["서기"];
                      
                                var target = document.getElementById("functional_level_1");
                                
                                if(e.value == "편마비") var d = functional_level_1;
                                else if(e.value=="비편마비") var d = functional_level_1;
                                else if(e.value=="척수(경수)") var d = functional_level_2;
                                else if(e.value=="척수(흉요수)") var d = functional_level_2;
                                else if(e.value=="비척수") var d = functional_level_1;
                                else if(e.value=="시각") var d= functional_level_1;
                                else if(e.value=="청각") var d= functional_level_1;
                                else if(e.value=="발달") var d= functional_level_1;
                                                                 
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>               
        
                            <select name="functional_level_1" id="functional_level_1">
                                <option value="">--기능수준--</option>
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="position_1" id="position_1">
                                <option value="">--운동자세--</option>     
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="type_of_exercise_1" id="type_of_exercise_1">
                                <option value="">--운동유형--</option> 
                                <option value="유연성">유연성</option>
                                <option value="근력">근력</option>
                                <option value="유산소">유산소</option>
                                <option value="균형">균형</option>
                            </select>
                            
                                                       
                            <select name="level_1" id="level_1">
                                <option value="">--난이도--</option> 
                                <option value="상">상</option>
                                <option value="하">하</option>
                            </select>
                            
                        </div>       
                            <br>
                         <div id="logic_2">                        
                             &nbsp;&nbsp; <select name="type1_2" onchange="categoryChange1_2(this)" id="type1_2">               
                                <option value="NULL">--장애유형1--</option>
                                <option value="뇌병변">뇌병변</option>
                                <option value="지체">지체</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>
                            </select>
                            
                            <script>
                            function categoryChange1_2(e){
                                var type2_1 = ["편마비","비편마비"];
                                var type2_2 = ["척수(경수)","척수(흉요수)","비척수"];
                                var type2_3 = ["시각"];
                                var type2_4 = ["청각"];
                                var type2_5 = ["발달"];
                                var target = document.getElementById("type2_2");
                                
                                if(e.value == "뇌병변") var d = type2_1;
                                else if(e.value=="지체") var d = type2_2;
                                else if(e.value=="시각") var d = type2_3;
                                else if(e.value=="청각") var d = type2_4;
                                else if(e.value=="발달") var d = type2_5;
                                
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>
                            
                            <select name="type2_2" id="type2_2" onchange="categoryChange2_2(this)">
                                <option value="">--장애유형2--</option>        
                            </select>
                            
                             <script>
                            function categoryChange2_2(e){
                                var functional_level_1 = ["눕기","앉기","서기"];
                                var functional_level_2 = ["눕기","앉기"];
                                var functional_level_3 = ["서기"];
                      
                                var target = document.getElementById("functional_level_2");
                                
                                if(e.value == "편마비") var d = functional_level_1;
                                else if(e.value=="비편마비") var d = functional_level_1;
                                else if(e.value=="척수(경수)") var d = functional_level_2;
                                else if(e.value=="척수(흉요수)") var d = functional_level_2;
                                else if(e.value=="비척수") var d = functional_level_1;
                                else if(e.value=="시각") var d= functional_level_1;
                                else if(e.value=="청각") var d= functional_level_1;
                                else if(e.value=="발달") var d= functional_level_1;
                                                                 
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>               
                            
                            <select name="functional_level_2"  id="functional_level_2">
                                <option value="">--기능수준--</option>
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
      
                            </select>
                            
                            <select name="position_2" id="position_2">
                                <option value="">--운동자세--</option>     
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="type_of_exercise_2" id="type_of_exercise_2">
                                <option value="">--운동유형--</option> 
                                <option value="유연성">유연성</option>
                                <option value="근력">근력</option>
                                <option value="유산소">유산소</option>
                                <option value="균형">균형</option>
                            </select>
                            
                                                       
                            <select name="level_2" id="level_2">
                                <option value="">--난이도--</option> 
                                <option value="상">상</option>
                                <option value="하">하</option>
                            </select>
                            
                        </div>
                            <br>
     <div id="logic_3">                        
         &nbsp;&nbsp; <select name="type1_3" onchange="categoryChange1_3(this)" id="type1_3">
                                <option value="NULL">--장애유형1--</option>
                                <option value="뇌병변">뇌병변</option>
                                <option value="지체">지체</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>
                            </select>
                            
                            <script>
                            function categoryChange1_3(e){
                                var type2_1 = ["편마비","비편마비"];
                                var type2_2 = ["척수(경수)","척수(흉요수)","비척수"];
                                var type2_3 = ["시각"];
                                var type2_4 = ["청각"];
                                var type2_5 = ["발달"];
                                var target = document.getElementById("type2_3");
                                
                                if(e.value == "뇌병변") var d = type2_1;
                                else if(e.value=="지체") var d = type2_2;
                                else if(e.value=="시각") var d = type2_3;
                                else if(e.value=="청각") var d = type2_4;
                                else if(e.value=="발달") var d = type2_5;
                                
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>
                                                        
                            <select name="type2_3" id="type2_3" onchange="categoryChange2_3(this)">
                                <option value="">--장애유형2--</option>   

                            </select>
                            
                                                        
                             <script>
                            function categoryChange2_3(e){
                                var functional_level_1 = ["눕기","앉기","서기"];
                                var functional_level_2 = ["눕기","앉기"];
                                var functional_level_3 = ["서기"];
                      
                                var target = document.getElementById("functional_level_3");
                                
                                if(e.value == "편마비") var d = functional_level_1;
                                else if(e.value=="비편마비") var d = functional_level_1;
                                else if(e.value=="척수(경수)") var d = functional_level_2;
                                else if(e.value=="척수(흉요수)") var d = functional_level_2;
                                else if(e.value=="비척수") var d = functional_level_1;
                                else if(e.value=="시각") var d= functional_level_1;
                                else if(e.value=="청각") var d= functional_level_1;
                                else if(e.value=="발달") var d= functional_level_1;
                                                                 
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>               
                            
                            
                            <select name="functional_level_3" id="functional_level_3">
                                <option value="">--기능수준--</option>
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                                
                            </select>
                            
                            <select name="position_3" id="position_3">
                                <option value="">--운동자세--</option>                                
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="type_of_exercise_3" id="type_of_exercise_3">
                                <option value="">--운동유형--</option> 
                                <option value="유연성">유연성</option>
                                <option value="근력">근력</option>
                                <option value="유산소">유산소</option>
                                <option value="균형">균형</option>
                            </select>
                            
                                                       
                            <select name="level_3" id="level_3">
                                <option value="">--난이도--</option> 
                                <option value="상">상</option>
                                <option value="하">하</option>
                            </select>
                            
                        </div>
                            <br>
                         <div id="logic_4">                        
                             &nbsp;&nbsp; <select name="type1_4" id="type1_4" onchange="categoryChange1_4(this)">
                                <option value="NULL">--장애유형1--</option>
                                <option value="뇌병변">뇌병변</option>
                                <option value="지체">지체</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>
                            </select>
                                                        
                            
                            <script>
                            function categoryChange1_4(e){
                                var type2_1 = ["편마비","비편마비"];
                                var type2_2 = ["척수(경수)","척수(흉요수)","비척수"];
                                var type2_3 = ["시각"];
                                var type2_4 = ["청각"];
                                var type2_5 = ["발달"];
                                var target = document.getElementById("type2_4");
                                
                                if(e.value == "뇌병변") var d = type2_1;
                                else if(e.value=="지체") var d = type2_2;
                                else if(e.value=="시각") var d = type2_3;
                                else if(e.value=="청각") var d = type2_4;
                                else if(e.value=="발달") var d = type2_5;
                                
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>
                            
                            <select name="type2_4" id="type2_4" onchange="categoryChange2_4(this)">
                                <option value="">--장애유형2--</option>   
                            </select>
                            
                            <script>
                            function categoryChange2_4(e){
                                var functional_level_1 = ["눕기","앉기","서기"];
                                var functional_level_2 = ["눕기","앉기"];
                                var functional_level_3 = ["서기"];
                      
                                var target = document.getElementById("functional_level_4");
                                
                                if(e.value == "편마비") var d = functional_level_1;
                                else if(e.value=="비편마비") var d = functional_level_1;
                                else if(e.value=="척수(경수)") var d = functional_level_2;
                                else if(e.value=="척수(흉요수)") var d = functional_level_2;
                                else if(e.value=="비척수") var d = functional_level_1;
                                else if(e.value=="시각") var d= functional_level_1;
                                else if(e.value=="청각") var d= functional_level_1;
                                else if(e.value=="발달") var d= functional_level_1;
                                                                 
                                target.options.length=0;
                                for(x in d){
                                    var opt = document.createElement("option");
                                    opt.value = d[x];
                                    opt.innerHTML = d[x];
                                    target.appendChild(opt);
                                }
                            }
                            </script>     
                            
                            <select name="functional_level_4" id="functional_level_4">
                                <option value="">--기능수준--</option>
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="position_4" id="position_4">
                                <option value="">--운동자세--</option> 
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="type_of_exercise_4" id="type_of_exercise_4">
                                <option value="">--운동유형--</option> 
                                <option value="유연성">유연성</option>
                                <option value="근력">근력</option>
                                <option value="유산소">유산소</option>
                                <option value="균형">균형</option>
                            </select>
                            
                                                       
                            <select name="level_4" id="level_4">
                                <option value="">--난이도--</option> 
                                <option value="상">상</option>
                                <option value="하">하</option>
                            </select>
                            
          </div></div><?php }?>
                            <br>
                     <!--                  
                         <div id="logic_5">                        
                            &nbsp;&nbsp; <select name="type1_5" id="type1_5">
                                <option value="">--장애유형1--</option>
                                <option value="뇌병변">뇌병변</option>
                                <option value="지체">지체</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>
                            </select>
                                                        
                            <select name="type2_5" id="type2_5">
                                <option value="편마비">편마비</option>
                                <option value="비편마비">비편마비</option>
                                <option value="척수(경수)">척수(경수)</option>
                                <option value="척수(흉요수)">척수(흉요수)</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>         
                            </select>
                            
                            <select name="functional_level_5" id="functional_level_5">
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>  
                            </select>
                            
                            <select name="position_5" id="position_5">
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="type_of_exercise_5" id="type_of_exercise_5">
                                <option value="유연성">유연성</option>
                                <option value="근력">근력</option>
                                <option value="유산소">유산소</option>
                                <option value="균형">균형</option>
                            </select>
                            
                                                       
                            <select name="level_5" id="level_5">
                                <option value="상">상</option>
                                <option value="하">하</option>
                            </select>
                            
                        </div>
                            <br>                            <br>
                         <div id="logic_6">                        
                            &nbsp;&nbsp; <select name="type1_6" id="type1_6">
                                <option value="뇌병변">뇌병변</option>
                                <option value="지체">지체</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>
                            </select>
                                                        
                            <select name="type2_6" id="type2_6">
                                <option value="편마비">편마비</option>
                                <option value="비편마비">비편마비</option>
                                <option value="척수(경수)">척수(경수)</option>
                                <option value="척수(흉요수)">척수(흉요수)</option>
                                <option value="시각">시각</option>
                                <option value="청각">청각</option>
                                <option value="발달">발달</option>         
                            </select>
                            
                            <select name="functional_level_6" id="functional_level_6">
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>  
                            </select>
                            
                            <select name="position_6" id="position_6">
                                <option value="눕기">눕기</option>
                                <option value="앉기">앉기</option>
                                <option value="서기">서기</option>
                            </select>
                            
                            <select name="type_of_exercise_6" id="type_of_exercise_6">
                                <option value="유연성">유연성</option>
                                <option value="근력">근력</option>
                                <option value="유산소">유산소</option>
                                <option value="균형">균형</option>
                            </select>
                            
                                                       
                            <select name="level_6" id="level_6">
                                <option value="상">상</option>
                                <option value="하">하</option>
                            </select>
                            
                        </div>
                            <br>-->
            <script>
function submitContents() {

    // 에디터의 내용이 textarea에 적용된다.

    a = oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
    text.a;

 

    // 에디터의 내용에 대한 값 검증은 이곳에서

    // document.getElementById("ir1").value를 이용해서 처리한다.

    alert(document.getElementById("ir1").value);
}
   try {

     elClickedObj.form.submit();

  } catch(e) {}
        </script>
        <div id="write_button"><input type="image" src="../img/ok.png">&nbsp;
<!--<a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>-->
	</div>
	</form>
</div>
        </div>
    </div> 
  </div> 
 </div>
 </body>
   </div>
 </html>
 <?php }
else{ ?>

<script>
    alert("관리자 계정으로만 접속할 수 있습니다!");
    history.back();
</script>

 <?php }} else{?>

<script>
    alert("관리자 계정으로만 접속할 수 있습니다!");
    history.back();
</script>

<?php } ?>