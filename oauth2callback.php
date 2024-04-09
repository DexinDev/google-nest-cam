<?php

require __DIR__ . '/vendor/autoload.php';

$client = new Google\Client();

$client->authenticate($_GET['code']);
$access_token = $client->getAccessToken();
var_dump($access_token);