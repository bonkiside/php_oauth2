<?php

$code = urldecode($_GET['code']);

$access_url;
$client_id;
$client_secret;
$redirect_uri;

$url = $access_url .
    '?client_id=' . urlencode($client_id) .
    '&client_secret=' . urlencode($client_secret) .
    '&redirect_uri=' . urlencode($redirect_uri) .
    '&code=' . urlencode($code);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($ch);
curl_close($ch);

$pairs = explode('&', $result);
$values = explode('=', $pairs[0]);
$access_token = $values[1];
$values = explode('=', $pairs[1]);
$expires = $values[1];

session_start();
$_SESSION['token'] = $access_token;

?>