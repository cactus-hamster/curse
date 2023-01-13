<?php

setcookie('user', $user['name'], time() - 3600, "/");
session_destroy();
header('Location: index.php');

?>