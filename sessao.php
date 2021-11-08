<?php
//session_start();

echo $_SESSION['senha']. $_SESSION['login']. " variável sair n setada";
session_unset();
session_destroy();
?>