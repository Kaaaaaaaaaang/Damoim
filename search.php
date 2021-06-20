<?php

$major = $_POST['major'];
$age = $_POST['age'];
$category = $_POST['category'];


$sql = "select * from study";
$result=mysqli_query($conn, $sql);

?>