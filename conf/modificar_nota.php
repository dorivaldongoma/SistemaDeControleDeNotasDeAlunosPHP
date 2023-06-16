<?php

use classes\Nota;

include_once "conexao.php";
include_once "../classes/Nota.php";
$nota = new Nota($_POST["pontuacao"], $_POST["id_estudante"], $_POST["id_materia"]);
$nota->guardar();
header("Location: ../notas_estudante.php?id=" . $_POST["id_estudante"]);
