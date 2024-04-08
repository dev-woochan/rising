<?php

include '../dbconfig.php';
//db호출 myslqi

header('Content-Type: application/json; charset=UTF-8');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

session_start(); //세션 연동

if(isset($_SESSION['login_id'])){ //세션에 아이디가 있어야댐
    $user_name = $_SESSION['login_name'] ;
    $user_id = $_SESSION['login_id'];
} else{
    $user_name  ="Guest"; //로그인 값없을시 안전하게 user_name사용하기위해서 예외처리해줌 
}
//아이디 불러오기 끝

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