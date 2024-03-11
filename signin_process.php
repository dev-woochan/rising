<?php
$name = $_POST['user_name'];
$id = $_POST['user_mail'];
$pass = $_POST['user_password'];

echo $name;
header("Location: login.php");


// $url = 'login.php';
// $data = array('id' => $id, 'pass' => $pass);

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, true);             //true시 post 전송
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

// //POST data
//     header("Location: login.php");

//     $response = curl_exec($ch);

//     curl_close($ch);

//     return $response;
?>