
<?php
include('database.php');
// $connect = mysqli_connect('localhost','root','','apii');

// mysqli_select_db($connect, 'apii');

$select = " SELECT * FROM newrural WHERE agent_name ='$agent_name' or case_description = '$description' or location ='$location'" ;
$result = mysqli_query($connect, $select) ;
$data = array();

while ($fetch = mysqli_fetch_assoc($result)){

    array_push($data, $fetch);
   
}
$datas = json_encode($data);
$datass = json_decode($datas);
// echo $datass[0]->username;   
echo $datas;
exit();
?>