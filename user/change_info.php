<?php 
include "../dbconfig.php";


$loginIdSql = "SELECT id from login";
$result = mysqli_query($mysqli,$loginIdSql);
$array = mysqli_fetch_array($result);
$loginId= $array['id'];
echo $loginId;

$loadIdSql = "SELECT  id , name , email
FROM user
WHERE id = '$loginId'";
$loginResult = mysqli_query($mysqli,$loadIdSql);
$login_array = mysqli_fetch_array($loginResult);

$user_name = $login_array['name'];
$user_id = $login_array['id'];
$user_eamil = $login_array['email'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보 변경</title>
    <link rel="stylesheet" href="signin.css" type="text/css">
</head>

<body>
            <main>
                <div style="margin-bottom : 30px;">
                    회원정보 변경
                </div>

                <form action="change_info_process.php" method="post"  >
                    <div class="form_list">
                        <label>이름</label>
                        <input type="text" placeholder="닉네임 3자이상" id="name" name="user_name" value="<?php echo $user_name ?>">
                        <div id="name_check" class="check"></div>
                    </div>
                    <div class="form_list">
                    <label>메일</label>
                        <input type="text" placeholder="아이디(이메일) abc@abc.com" id="mail" name="user_mail" value="<?php echo $user_eamil ?>">
                        <div id="mail_check" class="check"></div>
                    </div>
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <div>
                        <input type="submit" id="submit" value="회원정보 변경">
                    </div>
                </form>

        </div>
        </main>
</body>
<script src="signin.js"></script>

</html>