<?php
if (!isset($_SESSION['jeton'])) {
   $_SESSION['jeton'] = bin2hex(openssl_random_pseudo_bytes(6));
}
if(isset($_SESSION['email'])){
    $repo = New \App\repositories\UserRepository();
    $user = $repo->searchUserByMail($_SESSION['email']);

    $repo->updateCookies($_SESSION['email'],$_SESSION['jeton']);
}
?>