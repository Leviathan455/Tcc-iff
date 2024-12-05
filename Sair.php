<?php
session_start();
session_destroy();

unset($_SESSION['id']);
echo"<script language='javascript' type='text/javascript'>alert('Você saiu da sua conta!');window.location.href='Login.php'</script>";
?>