<?php

use classes\Estudante;

include_once "conexao.php";
include_once "../classes/Estudante.php";
Estudante::eliminar($_GET["id"]);
header("Location: ../mostrar_estudantes.php");
