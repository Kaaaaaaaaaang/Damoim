<?php
include "db.php";

$id=$_POST['id'];
$pw=$_POST['pw'];
 
$query = "select * from user where id='$id'";
$result = $conn->query($query);

if(mysqli_num_rows($result)==1) {

    $row=mysqli_fetch_assoc($result);
    if($row['pass']==$pw){
?>      
<?php
        session_start();
        $_SESSION["user_id"]=$row['id'];
        $_SESSION["user_pw"]=$row['pass'];
        $_SESSION["user_name"]=$row['name'];
        echo("<script>location.href='main.php';</script>"); 
        
        
    }else{
        ?>
        <script>
            alert("아이디 혹은 비밀번호가 잘못되었습니다.");
            history.back();
        </script>
        <?php
    }
}else {
?>              
<script>
    alert("아이디 혹은 비밀번호가 잘못되었습니다.");
    history.back();
</script>
<?php
        
}
?>