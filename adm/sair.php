<?php

session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['niveis_acesso_id']);

$_SESSION['msg'] = "Deslogado com sucesso";

header("Location: login.php");