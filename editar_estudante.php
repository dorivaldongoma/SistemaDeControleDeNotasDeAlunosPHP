<?php

use classes\Estudante;

include_once "conf/conexao.php";
include_once "classes/Estudante.php";
include_once "inc/cabecalho.php";
$estudante = Estudante::obterUm($_GET["id"]);
?>
<div class="row">
    <div class="col-12">
        <h1>Editar estudante</h1>
        <form action="conf/actualizar_estudante.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input value="<?php echo $estudante->nome ?>" name="nome" required type="text" id="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="grupo">Turma</label>
                <input value="<?php echo $estudante->grupo ?>" name="grupo" required type="text" id="grupo" class="form-control" placeholder="Turma">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "inc/rodape.php" ?>