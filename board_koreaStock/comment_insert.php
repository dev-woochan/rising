<?php

include '../dbconfig.php';
//db호출 myslqi

header('Content-Type: application/json; charset=UTF-8');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

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

$content = $data['content'];
$user_id = $user_id;
$create_time = date("Y-m-d H:i:s");
$parentPostId = $data["parentPostId"];
$orderNumber = $data["orderNum"];
$depth = $data["depth"];
// $parentCommentId = $_POST['parentCommentId'];
//값들 받아오기 


$stmt = $mysqli->prepare("INSERT INTO comment (create_time, content, parentPostId, orderNumber, depth, user_id) 
VALUE (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssiiii", $create_time, $content, $parentPostId, $orderNumber, $depth, $user_id);

$result = $stmt->execute();

if($result){ //성공한경우 
    $response = array('valid' => true);
}else{
    $response = array('valid' => false);
}

echo json_encode($response); //결과값 반환 트루이면 추가하고  false면 댓글추가를 안하기 위함 

$mysqli->close();


?>