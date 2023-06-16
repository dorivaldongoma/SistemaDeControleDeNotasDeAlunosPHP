<?php

use classes\Materia;

include_once "conf/conexao.php";
include_once "classes/Materia.php";
include_once "classes/cabecalho.php";
$materia = Materia::obtenerUna($_GET["id"]);
?>
<div class="row">
    <div class="col-12">
        <h1>Editar disciplina</h1>
        <form action="conf/actualizar_materia.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input value="<?php echo $materia->nome ?>" name="nome" required type="text" id="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "inc/rodape.php" ?>