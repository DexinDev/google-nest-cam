<?php
require __DIR__ . '/vendor/autoload.php';

$client = new Google\Client();

// Required, call the setAuthConfig function to load authorization credentials from
// client_secret.json file.
$client->setAuthConfig('client_secret.json');

// Required, to set the scope value, call the addScope function
$client->addScope(Google\Service\Drive::DRIVE_METADATA_READONLY);

// Required, call the setRedirectUri function to specify a valid redirect URI for the
// provided client_id
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');

// Recommended, offline access will give you both an access and refresh token so that
// your app can refresh the access token without user interaction.
$client->setAccessType('offline');

// Optional, call the setPrompt function to set "consent" will prompt the user for consent
$client->setPrompt('consent');

// Optional, call the setIncludeGrantedScopes function with true to enable incremental
// authorization
$client->setIncludeGrantedScopes(true);

$auth_url = $client->createAuthUrl();

header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));