<?php

include "db.php";
session_start();
 
$title=$_GET['title'];

$sql = "SELECT * FROM study WHERE title='$title'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);


$member = $row['member'];
$student = array_search($_SESSION['user_name'], $member);

unset($member[$student]);

foreach($member as $value) {
  $result = implode("|", $value);
}
$mem = $result;

$sql = "UPDATE study SET member='$mem' WHERE title='$title'";

$result = mysqli_query($conn, $sql);

if($result==true){
?>
  <script>
      alert("그룹 탈퇴에 성공했습니다.");
      location.href='group_lookup.php';
  </script>

<?php
}else{
?>

<script>
    alert("그룹 탈퇴에 실패했습니다.");
    location.href='group_lookup.php';
</script>

<?php
}
?>
