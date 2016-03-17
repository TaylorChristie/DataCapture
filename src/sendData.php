<?php


namespace MineSQL;


// Useful for debugging callback/api response pages

class sendData {


	private $endpoint;
	private $post;
	private $headers;


	public function __construct($url)
	{
		$this->endpoint = $url;
	}


	public function send($get = [], $post = [], $headers = [], $cookie = [])
	{


	if(count($get))
	{
		$url = $this->endpoint.'?'.http_build_query($get)
	}
	$url = $this->endpoint

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	if(count($post)) {

		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($post));  //Post Fields
	}

	//Don't know how I want to implement this yet...  $_SERVER['cookie'] = 'key=value;key=value;'
	// if(count($cookie))
	// {
	// 	foreach($cookie as $key=>$value)
	// 	{
	// 		$headers['Cookie'] .= $key.''
	// 	}
	// }
	
	
	if(count($headers)) {	

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}
	


	$server_output = curl_exec ($ch);

	$err = curl_errno($ch)

	// Check if any error occurred
	if(!$err)
	{
	 $info = curl_getinfo($ch);
	 curl_close($ch);
	 return array('response' => 1, 'curl' => $info);

	}

	$error = curl_error($ch);
	curl_close($ch);

	return array('response' => 0, 'curl' => $error);

	

	}

}