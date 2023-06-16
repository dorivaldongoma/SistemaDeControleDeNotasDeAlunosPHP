<?php

use classes\Estudante;

include_once "conf/conexao.php";
include_once "inc/cabecalho.php";
include_once "classes/Estudante.php";
$estudantes = Estudante::obter();
?>
    <div class="row">
        <div class="col-12">
            <h1>Lista de estudantes</h1>
            <a href="formulario_registro_estudante.php" class="btn btn-info my-2">Novo</a>
        </div>
        <div class="col-12 table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Turma</th>
                    <th>Notas</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($estudantes as $estudante) { ?>
                    <tr>
                        <td><?php echo $estudante["nome"] ?></td>
                        <td><?php echo $estudante["grupo"] ?></td>
                        <td>
                            <a href="notas_estudante.php?id=<?php echo $estudante["id"] ?>" class="btn btn-info">
                                Notas
                            </a>
                        </td>
                        <td>
                            <a href="editar_estudante.php?id=<?php echo $estudante["id"]; ?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="conf/eliminar_estudante.php?id=<?php echo $estudante["id"]; ?>" class="btn btn-danger">
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
