<?php

use classes\Estudante;
use classes\Materia;
use classes\Nota;

include_once "conf/conexao.php";
include_once "inc/cabecalho.php";
include_once "classes/Estudante.php";
include_once "classes/Materia.php";
include_once "classes/Nota.php";
$estudante = Estudante::obterUm($_GET["id"]);
$materias = Materia::obter();
$notas = Nota::obterDeEstudante($estudante->id);
$materiasConCalificacion = Nota::combinar($materias, $notas);
?>
<div class="row">
    <div class="col-12">
        <h1>Notas de <?php echo $estudante->nome ?></h1>
    </div>
    <div class="col-12 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Disciplina</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sumatoria = 0;
                foreach ($materiasConCalificacion as $materia) {
                    $sumatoria += $materia["pontuacao"];
                ?>
                    <tr>
                        <td>
                            <?php echo $materia["nome"]; ?>
                        </td>
                        <td>
                            <form action="conf/modificar_nota.php" method="POST" class="form-inline">
                                <input type="hidden" value="<?php echo $estudante->id ?>" name="id_estudante">
                                <input type="hidden" value="<?php echo $materia["id"] ?>" name="id_materia">
                                <input value="<?php echo $materia["pontuacao"] ?>" required min="0" name="pontuacao" placeholder="Digite a classificação" type="number" class="form-control">
                                <button class="btn btn-success mx-2">Guardar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Média</td>
                    <td>
                        <strong>
                            <?php
                            $media = $sumatoria / count($materias);
                            echo $media;
                            ?>
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php
include_once "inc/rodape.php";
