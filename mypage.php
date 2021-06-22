<?php
session_start();
include "db.php";
if(!isset($_SESSION['user_name'])) echo("<script>location.href='login.html';</script>"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>다모임</title>
     <link rel='icon' type='images/png'href='img/logo.png'>
	<link href="css/mypage_new.css" rel="stylesheet" type="text/css" />
     <link href="css/all.css" rel="stylesheet" type="text/css" />
</head>

<body style="overflow-x:hidden;">
     	<div class="container2" style="float: left;">
     		<div class="box" style="background: #BDBDBD;"><img id="profile_img" src="<?php echo $row['img_path']?>"></div>
               <?php
                    $sql = "SELECT * FROM user WHERE id ='".$_SESSION['user_id']."'";
                    $result=mysqli_query($conn, $sql)or die(mysqli_error($conn));
                    $row=mysqli_fetch_array($result);
               ?>
     		<h3 id="mypage_name"><?php echo $row['name'];?></h3>
               <div class="layout">
                    <img src="img/building.png" style="width: 10%; float: left; margin-right: 4%;">
                    <h3 id="mypage_school">미림여자정보과학고등학교</h3>
               </div>
               <div class="layout">
                    <img src="img/major.png" style="width: 10%; float: left; margin-right: 4%;">
     		     <h3 id="mypage_hakgwa"><?php echo $row['major'];?></h3>
               </div>
               <div class="layout" style="margin-bottom: 10%;">
                    <img src="img/email.png" style="width: 10%; float: left; margin-right: 4%;">
                    <h3 id="mypage_email"><?php echo $row['email'];?></h3><br>
               </div>
               <div class="mypage_about_box">
                    <img src="img/quote02.png" style="width: 5%; float: left; margin-right: 4%;">
                    <p id="mypage_about"><?php echo $row['intro']?></p>
                    <img src="img/quote01.png" style="width: 5%; float: right; margin-left: 4%;">
               </div>
     		<a href="mypage_edit.php" style="text-decoration: none;"><div class="edit" style="margin-top: 10%;">수정</div></a>
     		<div class="delete" onclick="location.href='profile_delete.php'">탈퇴</div>
     	</div>
     	<div class="group_list" style="float: left;">
               <?php
               $sql1 = "select COUNT(*) FROM study where ".$_SESSION['user_id']." in member";
               $cnt=mysqli_query($conn, $sql1);

               $sql = "select * FROM study where ".$_SESSION['user_id']." in member";
               $result=mysqli_query($conn, $sql);
               if($result == 0){
                    ?>
                    <img id="not_moim" src="img/not_moim.png">
                    <?php
               }else{
                    while($row = mysqli_fetch_array($result)){
               ?>
                    <figure class="group_about_box">
          		<img id="group_img" src="<?php echo $row['img_path'][$i]; ?>">
                    <figcaption>
                         <br>
                        <h3 id="group_title"><?php echo $row['title'][$i];?></h3><br>
                        <p id="group_about"><?php echo $row['intro'][$i];?></p>
                    </figcaption>
                    <a href="my_group.html"></a>
               </figure>
               <?php
                    }
                    
               }
               ?>

               

     	</div>
          <!--하단 빈공간-->
          <div class="footer"></div>
          <!--상단메뉴-->
          <div class="menu">
			<a href="main.php"><img id="logo" src="img/logo.png"></a>
               <h2>" 미림인이라면 다 모여라! "</h2>
			<a href="mypage.php"><h3 id="mypage">마이페이지</h3></a>
			<h3>|</h3>
			<a href="group_lookup.php"><h3 id="lookup">그룹조회</h3></a>
			<h3>|</h3>
			<a href="group_create.php"><h3 id="create">그룹생성</h3></a>
			<h3>|</h3>
			<a href="stop.html"><h3 id="recommand">추천받기</h3></a>
		</div>
<script type="text/javascript" src="js/mypage.js"></script> 
</body>
</html>
  