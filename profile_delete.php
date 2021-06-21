<?php

include "db.php";
session_start();

$sql = "SELECT * FROM user WHERE id ='".$_SESSION['user_id']."'";
$result=mysqli_query($conn, $sql)or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$user_name = $row['name'];
$user_email = $row['email'];

$sql = "DELETE FROM user WHERE email = '$user_email';";

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
