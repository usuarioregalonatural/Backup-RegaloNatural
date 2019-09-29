<?php
require_once __DIR__.'/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfigFile(__DIR__.'/client_secrets.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');

//Aqui tenemos que poner los SCOPES que vamos a solicitar.
$client->addScope(array("SCOPE1", "SCOPE2", "SCOPE3"));
//Tipo de acceso
$client->setAccessType("offline");
$client->setIncludeGrantedScopes(true);
$client->setApprovalPrompt('force');


if (! isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    $resultTokens = $client->authenticate($_GET['code']);
    //La variable $resultTokens tiene el refresh_token. Por lo que tendremos que almacenarlo.
    //Llamamos a la función que guardaEnBBDD($resultTokens['refresh_token'] );
    //Ahora solicitamos el access_token.
    $_SESSION['access_token'] = $client->getAccessToken();

    //Guardamos el access_token.
    //guardarAccessTokenEnBBDD( $_SESSION['access_token'] );

    //Volvemos a nuestro script inicial.
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}