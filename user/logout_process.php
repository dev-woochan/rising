<?php
//로그아웃 프로세스 현재는 db에 있는 로그인 값을 다 삭제하고 홈으로 이동시킨다.
require '../dbconfig.php';

$sql = "DELETE FROM login";
//login에 들어간 값 모두 삭제 

mysqli_query($mysqli,$sql);


echo "<script> alert('로그아웃 되었습니다');</script>";

mysqli_close($mysqli);


header("Location:http://192.168.101.129/risingproject/home.php");
//게시판으로 이동하기 





?>