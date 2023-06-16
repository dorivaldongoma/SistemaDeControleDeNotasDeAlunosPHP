<?php include "inc/cabecalho.php" ?>
<div class="row">
    <div class="col-12">
        <h1>Registro de estudante</h1>
        <form action="conf/guardar_estudante.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" required type="text" id="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="grupo">Grupo</label>
                <input name="grupo" required type="text" id="grupo" class="form-control" placeholder="Turma">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include "inc/rodape.php" ?>