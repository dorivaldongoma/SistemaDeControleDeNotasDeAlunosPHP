<?php

use classes\Estudante;

include_once "conexao.php";
include_once "../classes/Estudante.php";
$estudante = new Estudante($_POST["nome"], $_POST["grupo"], $_POST["id"]);
$estudante->actualizar();
header("Location: ../mostrar_estudantes.php");
