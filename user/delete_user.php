<?php
include '../dbconfig.php';

$passwordinput = $_POST['password'];

$loadIdSql = "SELECT id FROM login";
$loginResult = mysqli_query($mysqli,$loadIdSql);
$login_array = mysqli_fetch_array($loginResult);

$login_id = $login_array['id'];

$loadUser = "SELECT id, password FROM user WHERE id = '$login_id'";
$result = mysqli_query($mysqli,$loadUser);
$result_array = mysqli_fetch_array($result);
$password = $result_array['password'];

if($password == $passwordinput){
    $update_postId = "UPDATE koPost SET user_id = 11 WHERE user_id ='$login_id' ";
$update_commentId = "UPDATE comment SET user_id = 11 WHERE user_id ='$login_id'";
mysqli_query($mysqli,$update_commentId);
mysqli_query($mysqli,$update_postId);
//댓글 , 포스팅 아이디값 변경 

$deletSql = "DELETE FROM user WHERE user.id = '$login_id'";
mysqli_query($mysqli,$deletSql);
// 계정 삭제 
$deletLogin = "DELETE FROM login";
mysqli_query($mysqli,$deletLogin);
// 로그인된 값 로그아웃
echo "<script>window.alert('회원탈퇴 되었습니다'); window.parent.location.href='http://192.168.101.129/risingproject/home.php';</script>";
//회원탈퇴후 홈으로 이동시키기위해 window.parent에 접근하였다 ! 


mysqli_close($mysqli);
}else{
    echo "<script>window.alert('비밀번호를 확인해주세요'); window.history.back();</script>";
    
}





?>