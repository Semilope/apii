
<?php

// error_reporting(E_ALL);To report all errors except for notices, then the parameter
$connect= mysqli_connect('localhost','root','','apii') or die("couldn't connect to database");


// ENDPOINT FROM THE AGENT
$data = file_get_contents('php://input') ;
$data = json_decode($data);



$agent_name = ($data->agent_name);
$description = ( $data->case_description);
$location = ($data->location);
if(!$agent_name){
    $fall = array(
        'status' => false,
        'msg' => "Name empty" 
    );
    echo json_encode($fall);
    exit();
}
elseif(!$description){
    $fall = array(
        'status' => false,
        'msg' => "description empty" 
    );
    echo json_encode($fall);
    exit();
}
elseif(!$location ){
    $fall = array(
        'status' => false,
        'msg' => "location empty" 
    );
    echo json_encode($fall);
    exit();
}
   else{
     $user_check_query = " SELECT * FROM newrural where agent_name = '$agent_name' or case_description = '$description' or location ='$location' ";
     $user_check_result = mysqli_query($connect, $user_check_query);

      
     }
    

   $inset_new_user = "INSERT INTO newrural (agent_name , case_description ,  location) VALUES('$agent_name' , '$description' , '$location')" ;
   $query_new_user = mysqli_query($connect, $inset_new_user);

   if($query_new_user == true){

    $connect = array(
        'status' => true,
        'msg' => "Case Recorded" 
    );
    echo json_encode($connect);
    exit();
   }else{
    $connect = array(
        'status' => false,
        'msg' => "Case not Recorded" 
    );
    echo json_encode($connect);
    exit();
   }



?>