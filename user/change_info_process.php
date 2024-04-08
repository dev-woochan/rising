<?php
//db 실행 
include '../dbconfig.php';

$loadIdSql = "SELECT login.id, user.id , user.password
FROM login
JOIN user ON login.id = user.id";
$loginResult = mysqli_query($mysqli,$loadIdSql);
$login_array = mysqli_fetch_array($loginResult);
if($login_array['name']){
    $user_pass = $login_array['password'] ;
    $user_id = $login_array['id'];
}
//아이디 불러오기 끝

//post로 회원가입 값 받기 
if($_POST['user_name']){ // 유저 정보 변경의 경우 
$name = $_POST['user_name'];
$email = $_POST['user_mail'];
$id = $_POST['user_id'];

echo 'POST 성공<br>';
//sql 준비
$updateSql = "UPDATE user SET name = '$name', email = '$email' WHERE id = '$id'";//bind params;

mysqli_query($mysqli,$updateSql);

header("location: " ."mypage.php");// 리다이렉트 마이페이지로 



mysqli_close($mysqli);



exit;
}

?>
