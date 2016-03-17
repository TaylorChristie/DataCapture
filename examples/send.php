<?php

require '../src/sendData.php';


$sd = new \MineSQL\sendData('http://minesql.me/');


$get = [];
$post = [];
$headers = [];


$response = $sd->send($get, $post, $headers);

// boolean value, either successful (1) or an error (0)
($response['response']) ? 'Ok Request' : 'Error in Request';

// Either returns the webpage's response, or the cURL error information
if($response['response']) ? $response['curl'] : print_r($response['curl']);