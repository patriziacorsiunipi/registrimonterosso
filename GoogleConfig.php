<?php
  require_once 'vendor/autoload.php';
  $google_client = new Google_Client();
  $google_client->setClientId('858032679972-qnpsidch3n6lih3f40fnqbtlu48oo369.apps.googleusercontent.com');
  $google_client->setClientSecret('YNXorifGbSD5vbuC2AzMKC9G');
  $google_client->setRedirectUri("https://registrimonterosso.labcd.unipi.it/index.php");
  $google_client->addScope('email');
  $google_client->addScope('profile');
?>
