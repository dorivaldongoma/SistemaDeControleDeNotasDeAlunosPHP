<?php

use classes\Materia;

include_once "conf/conexao.php";
include_once "inc/cabecalho.php";
include_once "classes/Materia.php";
$materias = Materia::obter();
?>
<div class="row">
    <div class="col-12">
        <h1>Lista de disciplinas</h1>
        <a href="formulario_registro_materia.php" class="btn btn-info my-2">Nova</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materias as $materia) { ?>
                    <tr>
                        <td><?php echo $materia["nome"] ?></td>
                        <td>
                            <a href="editar_materia.php?id=<?php echo $materia["id"] ?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="conf/eliminar_materia.php?id=<?php echo $materia["id"]; ?>" class="btn btn-danger">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include_once "inc/rodape.php";
