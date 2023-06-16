<?php

use classes\Materia;

include_once "conexao.php";
include_once "../classes/Materia.php";
$materia = new Materia($_POST["nome"]);
$materia->guardar();
header("Location: ../mostrar_materias.php");
