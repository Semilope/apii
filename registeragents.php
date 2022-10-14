<?php

session_start();
$data = file_get_contents('php://input') ;
$username = "";
$email = "";
$password = "";

$data = json_decode($data);


$status = array(
    'status' => true,
    'msg' => "Registration sucessful" 
);






$connect = mysqli_connect('localhost','root','','apii');

$username = mysqli_real_escape_string($connect ,$data->username);
$email = mysqli_real_escape_string($connect , $data->email);
$password = mysqli_real_escape_string($connect , $data->password);
$cpassword = mysqli_real_escape_string($connect , $data->cpassword);


$user_check_query = "SELECT * FROM agentinfo WHERE username = '$username' or email = '$email' or password ='$password'" ;
$results = mysqli_query($connect, $user_check_query);
while ( $user = mysqli_fetch_assoc($results)) {
    if($user['username'] == $username || $user['email'] == $email){
        $falll = array(
            'status' => false,
            'msg' => "same records" 
        );
    echo json_encode($falll);
    exit();
    
 } 
}
 if($data->password != $data->cpassword){
    $fail = array(
        'status' => false,
        'msg' => "Registration failed" 
    );
    echo json_encode($fail);
    exit();
  }
    else{
        $query = "INSERT INTO agentinfo (username, email , password ) VALUES ('$username' , '$email' ,  '$password')";
    mysqli_query($connect, $query);
    $status = json_encode($status);

    echo($status);
    exit();
    }
?>