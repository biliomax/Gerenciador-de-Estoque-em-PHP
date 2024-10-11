<?php
session_start();

// Segurança do ADM
$seguranca = true;
include_once("config/seguranca.php");

seguranca();

// Biblioteca auxiliares
include_once("config/config.php");
include_once("config/conexao.php");

echo "Bem vindo ". $_SESSION['nome'];
echo "<br> <a href='sair.php'>Sair</a>";