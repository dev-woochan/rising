<?php
//db 실행 
include '../dbconfig.php';

$loadIdSql = "SELECT login.id, user.id , user.password
FROM login
JOIN user ON login.id = user.id";
$loginResult = mysqli_query($mysqli,$loadIdSql);
$login_array = mysqli_fetch_array($loginResult);
if($login_array['id']){
    $user_pass = $login_array['password'] ;
    $user_id = $login_array['id'];
}
//아이디 불러오기 끝

    $pass = $_POST['password'];
    $newPass = $_POST['new_password'];
    $newPassConfrim = $_POST['new_password_confirm'];

    if($user_pass == $_POST['password']){//입력한값이 맞은경우 
        if($newPass == $newPassConfrim){ //둘다 맞은경우 
            $updatePass = "UPDATE user SET password = '$newPass' WHERE id = '$user_id' ";
 
            mysqli_query($mysqli,$updatePass);

            echo "<script>window.parent.location.href='http://192.168.101.129/risingproject/user/mypage.php';</script>";

            echo "<script>window.alert('비밀번호가 변경되었습니다'); </script>";

        }else{
            echo "<script>window.parent.alert('비밀번호가 일치하지 않습니다'); </script>";
        }
    }else{
        echo "<script>window.parent.alert('현재 비밀번호가 틀립니다'); </script>";

    } 

    ?>