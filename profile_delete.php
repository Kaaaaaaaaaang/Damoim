<?php

include "db.php";
session_start();

$id = $_SESSION['user_id'];

$sql = "DELETE FROM user WHERE id = '$id';";

$result = mysqli_query($conn, $sql);

if($result==true) {
?>
  <script>
      alert("회원 탈퇴가 완료되었습니다.");
      location.href='main.php';
  </script>

<?php
}else{
?>

<script>
    alert("회원 탈퇴에 실패했습니다.");
    location.href='mypage.php';
</script>

<?php
}
?>
