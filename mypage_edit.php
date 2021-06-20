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
	<link href="css/mypage_edit.css" rel="stylesheet" type="text/css" />
     <link href="css/common.css" rel="stylesheet" type="text/css" />
</head>
<body style="overflow-x:hidden;">
     	<div class="container">
            <?php
                $sql = "SELECT * FROM user WHERE id ='".$_SESSION['user_id']."'";
                $result=mysqli_query($conn, $sql)or die(mysqli_error($conn));
                $row=mysqli_fetch_array($result);
            ?>
            <div class="container2">
                <!-- 현재 프로필 -->
                <div class="now_profile">
                    <img id="profile_img" src="img/sample_proflie.png">
                    <h3 id="mypage_name"><?php echo $row['name']?></h3>
     		        <h3 id="mypage_hakgwa"><?php echo $row['major']?></h3>
                </div>
                
                <!-- 프로필 수정 박스 -->
                <div class="edit_profile_box">
                    <h1>Public profile</h1>
                    <hr>
                    <!-- 프로필 (이름, 과, 이메일, 소개 수정 등) 정보 수정 박스 -->
                    <form>
                        <div class="edit_profile_info_box">
                            <h1>Name</h1>
                            <input type="text" name="name" id="name" value="<?php echo $row['name']?>">
                            <h1>Department</h1>
                            <select name="major" style="background-color: #00000000;">
                                <option value="none" style="color: #000000;">학과</option>
                                <option value="soft" style="color: #000000;">뉴미디어소프트웨어과</option>
                                <option value="web" style="color: #000000;">뉴미디어웹솔루션과</option>
                                <option value="design" style="color: #000000;">뉴미디어디자인과</option>
                            </select><br>
                            <h1>Email</h1>
                            <input type="email" name="email" id="email" style="margin-bottom: 4%;" value="<?php echo $row['email']?>">
                            <h1>About me</h1>
                            <textarea id="about_me" name="intro"></textarea>
                            <button type="submit" id="Update_profile_btn" onclick="location.href='mypage.php'">Update profile</button><br><br>
                        </div>
                        <!-- 프로필 사진 수정 박스 -->
                        <div class="edit_profile_img_box">
                            <h1>Profile picture</h1>
                            <img id="profile_img" src="img/sample_proflie.png">
                            <button type="button" id="profile_img_edit_btn"><img src="img/pen.png" alt=""> Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     	</div>
          <div class="menu">
			<a href="main.php"><img id="logo" src="img/logo.png"></a>
			<a href="mypage.php"><h3 id="mypage">마이페이지</h3></a>
			<h3>|</h3>
			<a href="group_lookup.php"><h3 id="lookup">그룹조회</h3></a>
			<h3>|</h3>
			<a href="group_create.php"><h3 id="create">그룹생성</h3></a>
			<h3>|</h3>
			<a href="recommand.php"><h3 id="recommand">추천받기</h3></a>
		</div>
<script type="text/javascript" src="js/mypage.js"></script> 
</body>
</html>
  