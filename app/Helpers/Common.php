<?php

function pr($a) {
	echo '<pre>'; print_r($a); echo '</pre>';
}

function pex($a) {
	pr($a);
	exit('PeX');
}

function displayMessage($message) {
	if (php_sapi_name() == 'cli') {
		echo "$message\n";
	} else {
		echo "$message</br>";
	}
}

function apiResponse($data, $status='ok', $message='') {
	if (!empty($data['error'])) {
		$data = false;
		$status = 'error';
		$message = $data['error'];
  } elseif (empty($data)) {
  	$message = 'No results found';
  }

	return array('status' => $status, 'message' => $message, 'result' => $data);
}

function error($message) {
	return array('error' => $message);
}

function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}