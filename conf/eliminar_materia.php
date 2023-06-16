<?php

use classes\Materia;

include_once "conexao.php";
include_once "../classes/Materia.php";
Materia::eliminar($_GET["id"]);
header("Location: ../mostrar_materias.php");
