<?
setcookie("user_name", $login, time()-60*24*30, "/");
header("location: /");
?>