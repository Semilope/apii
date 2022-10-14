<?php
session_start();


$select = "SELECT * FROM agentinfo " ;
$result = mysqli_query($connect, $select) ;
$data = array();

while ($fetch = mysqli_fetch_assoc($result)){

    array_push($data, $fetch);
   
}
$datas = json_encode($data);
$datass = json_decode($datas);
$_SESSION['username'] = $datass[0]->username; 
echo $_SESSION['username'];   
// echo $datas;
exit();
?>