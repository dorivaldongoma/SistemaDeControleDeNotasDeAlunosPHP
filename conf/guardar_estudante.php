<?php

use classes\Estudante;

include_once "conexao.php";
include_once "../classes/Estudante.php";
$estudiante = new Estudante($_POST["nome"], $_POST["grupo"]);
$estudiante->guardar();
header("Location: ../mostrar_estudantes.php");
