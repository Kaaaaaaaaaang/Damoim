<?php

$major = $_POST['major'];
$age = $_POST['age'];
$category = $_POST['category'];

$sql = "select * from study where major=$major and grage=$age and category=$category";

?>
<script>
    location.href='group_lookup.php?search=<?echo $sql?>';
</script>