<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
$id = $_POST('user_mail');
$pass = $_POST('user_password');
}



?>

<!DOCTYPE html>
<html lang="kr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>오른다 로그인</title>
    <link rel="stylesheet" href="login.css" type="text/css">
    <script src="login.js"></script>
</head>

<body>
    <header class="logo">
        <a href="/risingproject/home.php">
        <div class="logo"><img src="rise_logo.png" alt="오른다 로고" width="300px" height ="120px" alt="오른다로고"></div>
        </a>

    </header>
    <main>

        <div class="login">
            <div>
                로그인
            </div>
            <form action="home.php" method="post" class="login_form" onsubmit= "return loginCheck()" >
                <div class="login_wrap">
                    <div class="idpw_wrap">
                        <input type="text" id="id" class="id" name="id" placeholder="아이디">
                    </div>
                    <div class="idpw_wrap">
                        <input type="password" id="pw" class="pw" name="pw" placeholder="비밀번호">
                    </div>
                    <div>
                        <input type="checkbox"><span>로그인 상태 유지</span>
                    </div>
                    <div>
                        <button class="btn-login" type="submit">
                            <span>로그인</span></button>
                    </div>
            </form>

            <div>
                <div class="btn-signin">
                    <span>비밀번호찾기</span><span>회원가입</span>
                </div>
                <div>
                    <button type="submit" class="login_kakao">
                        <span style="visibility: hidden;">카카오 로그인</span></button>
                </div>
                <div>
                    <button type="submit"><span>네이버 로그인</span></button>
                </div>

            </div>
        </div>


    </main>

</body>
<footer>
    <div> Copyright 2024. KimChanWoo all rights reserved.

    </div>
</footer>

</html>