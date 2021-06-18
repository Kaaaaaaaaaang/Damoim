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
$study_img = $_POST['study_img'];

if($category == "employment") $category = "취업 준비";
else if($category == "programming") $category = "전공 과목 스터디";
else if($category == "general_subject") $category = "인문 과목 스터디";

if($how == "online") $how = "온라인";
else if($how == "offline") $how = "오프라인";

/*
$grade_array = array($grade);

foreach($grade_array as $value) {
  $result = implode("|", $value);

  echo "<pre>";
  var_dump($result);
  echo "</pre>";
}

$grade = $result;

*/
?>

<script>
    alert("그룹 생성이 완료되었습니다.");
    location.href='group_lookup'.html';
</script>
