<?php

$auth_url;
$client_id;
$redirect_uri;
$scope;

$url = $auth_url .
    '?client_id=' . urlencode($client_id) .
    '&redirect_uri=' . urlencode($redirect_uri) .
    '&response_type=' . 'code' .
    '&scope=' . urlencode($scope) .
    '&state=' . urlencode(sha1(rand()));

header('Location: ' . $url);

?>