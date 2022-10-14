<?php

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'https://ipgeolocation.abstractapi.com/v1/?api_key=99da888ca62b494d9da1db3b97d05672');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);


curl_close($ch);
print_r($data);
?>