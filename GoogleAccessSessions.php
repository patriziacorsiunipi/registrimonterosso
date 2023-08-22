<?php
include 'GoogleConfig.php';
$login_button='';
if (isset($_GET["code"])) {
  $token = $google_client -> fetchAccessTokenWithAuthCode($_GET["code"]);

  if (!isset($token["error"])){
    $google_client->setAccessToken($token['access_token']);
    $_SESSION["access_token"] = $token['access_token'];
    $google_service = new Google_Service_Oauth2($google_client);
    $data = $google_service->userinfo->get();
    if (!empty($data["given_name"])){
      $_SESSION['nome'] = $data['given_name'];
    }
    if (!empty($data["family_name"])){
      $_SESSION['cognome'] = $data['family_name'];
    }
    if (!empty($data["email"])){
      $_SESSION['emailUtente'] = $data['email'];
    }
    $_SESSION['loginUtente'] = "true";
  }
}
if (!isset($_SESSION['access_token'])){
  $login_button = '<a href="'.$google_client->createAuthUrl().'"><img class="img-fluid" src="img/btn_google.png" alt="Google Login"></a>';
}
?>
