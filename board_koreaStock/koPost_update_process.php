<?php
include '../dbconfig.php';

$post_id = $_POST["id"];
$update_title = $_POST["title"];
$update_content = $_POST["editordata"];

$sql = "UPDATE koPost
SET title = '$update_title', content = '$update_content'
WHERE id = ($post_id)";

mysqli_query($mysqli,$sql);

echo "<script> window.alert('수정이 완료되었습니다');
</script>";

header("Location: http://192.168.101.129/risingproject/board_koreaStock.php");


mysqli_close($mysqli);

?>