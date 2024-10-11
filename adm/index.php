<?php
session_start();
$seguranca = true;

echo "Bem vindo ". $_SESSION['nome'];