<?php
session_start();
include "db.php";
if(!isset($_SESSION['user_name'])){
    echo("<script>location.href='login.html';</script>"); 
}

$q_count = $_GET['q_count'];
$sql = "SELECT * FROM reccommand WHERE num =".$q_count;
$result=mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>다모임</title>
  <link rel='icon' type='images/png'href='img/logo.png'>
	<link href="css/recommand.css" rel="stylesheet" type="text/css" />
  <link href="css/common.css" rel="stylesheet" type="text/css" />
</head>
<body style="overflow:hidden;">
	<div class="container">
     	<div class="background_box"></div>
     	<div class="container2">
     		<h3 id="question"><?php echo $row['Q']?></h3>
               <hr>
     		<div class="radio-wrap">
                 <input type="radio" name="answer" id="one"/>
                 <label for="one"><?php echo $row['A1']?></label>
               </div>
               <div class="radio-wrap">
                 <input type="radio" name="answer" id="two"/>
                 <label for="two"><?php echo $row['A2']?></label>
               </div>
               <div class="radio-wrap">
                 <input type="radio" name="answer" id="three"/>
                 <label for="three"><?php echo $row['A3']?></label>
               </div>
               <div class="button_box">
                 <?php
                    $query = "SELECT * FROM reccommand";
                    $data = mysqli_query($conn, $query);
                    if(mysqli_num_rows($data)==$q_count){
                    ?>
                    <button onclick="location.href='recommand_result.php'">result &nbsp; →</button>
                      <?php
                    }else{
                      ?><button onclick="location.href='recommand.php?q_count=<?php echo ($row['num']+1);?>'">Next &nbsp; →</button><?php
                    }                    
                 ?>
     		          
               </div>
     	</div>
       <div class="menu">
        <a href="main.php"><img id="logo" src="img/logo.png"></a>
        <a href="mypage.html"><h3 id="mypage">마이페이지</h3></a>
        <h3>|</h3>
        <a href="group_lookup.html"><h3 id="lookup">그룹조회</h3></a>
        <h3>|</h3>
        <a href="group_create.html"><h3 id="create">그룹생성</h3></a>
        <h3>|</h3>
        <a href="recommand.php"><h3 id="recommand">추천받기</h3></a>
      </div>
	</div>
</body>
</html>