<?php
session_start();
error_reporting(E_ALL);

require_once '../vendor/autoload.php';


use Symfony\Component\HttpFoundation\Request;
use Evdb\Cas\Client;
use Evdb\Cas\Config\ArrayCasConfig;
use Evdb\Cas\Request\GuzzleCasRequestClient;
use Evdb\Cas\Storage\SessionCasStorage;

$request = Request::createFromGlobals();


$cas = new Client(
    ArrayCasConfig::create(include 'config.hro.php'),
    GuzzleCasRequestClient::create(),
    $session = new SessionCasStorage()
);

if (is_null($request->get('ticket')) || $session->has('ticket')) {
    //if no ticket is set, or credentials were retrieved, redirect
    $session->set('ticket', null);
	$cas->login();
}

$session->set('ticket', $request->get('ticket'));

echo "<pre>";
echo htmlspecialchars($cas->serviceValidate()->getBody());