<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$base_de_dados = "escola";
$mysqli = new mysqli($host, $usuario, $senha, $base_de_dados);
if ($mysqli->connect_errno) {
    echo "Falha na conexão com o MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}