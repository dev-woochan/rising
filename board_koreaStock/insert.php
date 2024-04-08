<?php
//작성한 게시글을 업로드하는 백엔드 부분 db호출 및 insert가 주된 내용임 
include '../dbconfig.php';
// db호출 db이름은 mysqli

$loadIdSql = "SELECT login.id, user.id , user.name
FROM login
JOIN user ON login.id = user.id";
$loginResult = mysqli_query($mysqli,$loadIdSql);
$login_array = mysqli_fetch_array($loginResult);
if($login_array['name']){
    $user_name = $login_array['name'] ;
    $user_id = $login_array['id'];
}
// 로그인 아이디 불러오기 =>세션으로 변경예정 ?? 

$targetDir = "image/"; //이미지 디렉토리지정 
$targetFile = date("mdhis",time()).basename($_FILES["image"]["name"]); // 저장할 파일이름 만들기 특수성을위해 date함수를 추가해서 시간+이름이 되도록하였다
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// 파일 유효성 검사
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]); // getimagesize함수로 이미지파일정보를 받아옴 이미지가아니면 반환이 안되니 이미지 인지 아닌지 판단가능 
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// 파일 업로드
if ($uploadOk == 0) { 
    echo "Sorry, your file was not uploaded.";
} else { //파일을 업로드한다  첫번째는 업로드할파일,두번째는 url = 경로/파일명 
    move_uploaded_file($_FILES["image"]["tmp_name"],$targetDir.$targetFile);
   
}

$title = $_POST['title'];
$boardType = 'korea';
$stockName = $_POST['stockName'];
$content = $_POST['editordata'];
$goalDate = $_POST['goalDate'];
$postPrice = $_POST['postPrice'];
$create_time = date("Y-m-d H:i:s");
$riseSelect = $_POST['riseSelect'];
//게시글 post 받기


$stmt = $mysqli->prepare("INSERT INTO koPost (create_time, title ,user_id, stockName, content, watchCnt, likeCnt, riseSelect, goalDate, postPrice, image) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//db에는 이미지 이름을 저장하여 불러올수있게하였다.

$stockCode = 0;
$watchCnt = 0;
$likeCnt = 0;

$stmt->bind_param("ssisssissis", $create_time, $title ,$user_id , $stockName, $content, $watchCnt, $likeCnt, $riseSelect, $goalDate, $postPrice, $targetFile);

$stmt->execute();

$mysqli->close();

header("location: " ."../board_koreaStock.php");


?>