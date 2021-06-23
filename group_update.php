<?php

include "db.php";
session_start();
 
$title=$_GET['title'];
# 리더 : 로그인 해 있는 사람, 최대 인원 수 : people, 카테고리 : category
# 그룹 명 : group_name, 가입 학년 : grade[], 가입 학과 : major[]
# 모임 방법 : how, 모임 날짜 : day[], 시작 시간 : start, 끝나는 시간 : end
# 그룹 소개 : intro, 사진 : study_img

$leader = $_SESSION['user_id'];
$people = $_POST['people'];
$grade = $_POST['grade'];
$major = $_POST['major'];
$how = $_POST['way'];
$day = $_POST['day'];
$start = $_POST['start'];
$end = $_POST['end'];
$intro = $_POST['intro'];

$grade_array = array($grade);
foreach($grade_array as $value) {
  $result = implode("|", $value);
}
$grade = $result;

$major_array = array($major);
foreach($major_array as $value) {
  $result = implode("|", $value);
}
$major = $result;

$day_array = array($day);
foreach($day_array as $value) {
  $result = implode("|", $value);
}
$day = $result;

$uploaddir = 'upload/';

$uploadfile = $uploaddir.$_FILES['study_img']['name'];
$f_name = $_FILES['study_img']['name'];
$f_type = $_FILES['study_img']['type'];
$f_size = $_FILES['study_img']['size'];
$tmp_name= $_FILES['study_img']['tmp_name'];
$img_ad = $uploadfile;

if(move_uploaded_file($_FILES['study_img']['tmp_name'], $uploadfile)){
  $img_ad = $uploadfile;
  move_uploaded_file($tmp_name,$uploaddir);
}

$sql  = "UPDATE study SET max_mem='$people', grade='$grade', major='$major', how='$how', study_day='$day', start_time='$start', end_time='$end', img_path='$img_ad', intro='$intro' WHERE title='$title'";

$result = mysqli_query($conn, $sql);

if($result==true){
?>
  <script>
      alert("<?php echo $title;?>");
      location.href='mypage.php';
  </script>

<?php
}else{
  echo $result;
?>

<script>
    alert("그룹 수정에 실패했습니다.");
    location.href='mypage.php';
</script>

<?php
}
?>
