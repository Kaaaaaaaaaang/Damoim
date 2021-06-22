<?php

$major = $_POST['major'];
$age = $_POST['age'];
$category = $_POST['category'];

$sql = "where major IN ('$major') and grade IN ('$age') and category = '$category'";
?>
<script>
    location.href="group_lookup.php?search=<?php echo $sql;?>";
</script>