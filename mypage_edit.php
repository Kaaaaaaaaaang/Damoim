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
	<link href="css/mypage_edit_new.css" rel="stylesheet" type="text/css" />
    <link href="css/all.css" rel="stylesheet" type="text/css" />
    <script>
       var imgTarget = $('.preview-image .upload-hidden'); imgTarget.on('change', function(){ var parent = $(this).parent(); parent.children('.upload-display').remove(); if(window.FileReader){ //image 파일만 
       if (!$(this)[0].files[0].type.match(/image\//)) return; var reader = new FileReader(); reader.onload = function(e){ var src = e.target.result; parent.prepend('<div class="upload-display"><div class="upload-thumb-wrap"><img src="'+src+'" class="upload-thumb"></div></div>'); } reader.readAsDataURL($(this)[0].files[0]); } else { $(this)[0].select(); $(this)[0].blur(); var imgSrc = document.selection.createRange().text; parent.prepend('<div class="upload-display"><div class="upload-thumb-wrap"><img class="upload-thumb"></div></div>'); var img = $(this).siblings('.upload-display').find('img'); img[0].style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enable='true',sizingMethod='scale',src=\""+imgSrc+"\")"; } });


    </script>
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
                    <img id="profile_img" src="<?php echo $row['img_path']?>">
                    <h3 id="mypage_name"><?php echo $row['name']?></h3>
     		        <h3 id="mypage_hakgwa"><?php echo $row['major']?></h3>
                </div>
                
                <!-- 프로필 수정 박스 -->
                <div class="edit_profile_box">
                    <h1>Public profile</h1>
                    <hr>
                    <!-- 프로필 (이름, 과, 이메일, 소개 수정 등) 정보 수정 박스 -->
                    <form method="post" action="profile_update.php" enctype="multipart/form-data">
                        <div class="edit_profile_info_box">
                            <h1>Name</h1>
                            <input type="text" name="name" id="name" value="<?php echo $row['name'];?>">
                            <h1>Department</h1>
                            <h4 id="major"><?php echo $row['major']?></h4>
                            <h1>Email</h1>
                            <input type="email" name="email" id="email" style="margin-bottom: 4%;" value="<?php echo $row['email'];?>">
                            <h1>About me</h1>
                            <textarea id="about_me" name="intro"><?php echo $row['intro'];?></textarea>
                            <button type="submit" id="Update_profile_btn" onclick="location.href='profile_update.php'">Update profile</button><br><br>
                        </div>
                        <div class="filebox">
                            <label for="ex_file">profile upload</label>
                            <input type="file" id="ex_file" name="img_path" value="<?php echo $row['img_path'];?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
     	</div>
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

</body>
</html>