<?php

include "db.php";

# 리더 : 로그인 해 있는 사람, 최대 인원 수 : people, 카테고리 : category
# 그룹 명 : group_name, 가입 학년 : grade[], 가입 학과 : major[]
# 모임 방법 : how, 모임 날짜 : day[], 시작 시간 : start, 끝나는 시간 : end
# 그룹 소개 : intro, 사진 : study_img

$leader = $_GET['userID'];
$people = $_POST['people'];
$category = $_POST['category'];
$group_name = $_POST['group_name'];
$grade = $_POST['grade'];
$major = $_POST['major'];
$how = $_POST['how'];
$day = $_POST['day'];
$start = $_POST['start'];
$end = $_POST['end'];
$intro = $_POST['intro'];

if($category == "employment") $category = "취업 준비";
else if($category == "programming") $category = "전공 과목 스터디";
else if($category == "general_subject") $category = "인문 과목 스터디";

if($how == "online") $how = "온라인";
else if($how == "offline") $how = "오프라인";

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

if(isset($_POST['submit'])) {
  $name = $_FILES['study_img']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir.basename($_FILES["study_img"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $extensions_arr = array("jpg", "jpeg", "png", "gif");
  if(in_array($imageFileType, $extensions_arr)) {
    $sql  = "INSERT INTO study (leader, max_mem, category, title, grade, major, how, study_day, start_time, end_time, intro, img_path) VALUES ('$leader','$people','$category','$group_name','$grade', '$major', '$how', '$day', '$start', '$end', '$intro', '$study_img', '$target_file');";
    $result = mysqli_query($conn, $sql);
  }
}

if($result==true){

?>
  <script>
      alert("그룹 생성이 완료되었습니다.");
      location.href='group_lookup.html';
  </script>

<?php
}else{
?>

<script>
    alert("땡 탈락");
    location.href='group_lookup.html';
</script>

<?php
}
?>