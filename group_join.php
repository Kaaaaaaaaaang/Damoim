<?php

include "db.php";
session_start();
 
$title=$_GET['title'];

$student = $_SESSION['user_name'].'|';

$sql = "UPDATE study SET member='$student' WHERE title='$title'";

$result = mysqli_query($conn, $sql);

if($result==true){
?>
  <script>
      alert("그룹 가입에 성공했습니다.");
      location.href='group_lookup.php';
  </script>

<?php
}else{
?>

<script>
    alert("그룹 가입에 실패했습니다.");
    location.href='group_lookup.php';
</script>

<?php
}
?>
