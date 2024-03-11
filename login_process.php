
<?php

$user_id = "test1234";
$user_pass = "pass1234";

$login_id = $_POST['id'];
$login_pass = $_POST['pw'];
$login_name = "김찬우";
if($login_id == $user_id){
    if($login_pass == $user_pass){
        echo "<script type='text/javascript'>
        alert('로그인 성공');
        location.replace('http://192.168.0.10/risingproject/home.php');</script>";
    }else{
        echo "<script type='text/javascript'>
        alert('아이디 패스워드를 확인해주세요');
        history.go(-1);
        </script>";
    }
}else{
    echo "<script type='text/javascript'>
    alert('아이디 패스워드를 확인해주세요');
    history.go(-1);
    </script>";
}


?>

