<?php
session_start();
require_once('conexao.php');

$tarefa = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $tarefaId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tarefas WHERE id = '{$tarefaId}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $tarefa = mysqli_fetch_array($query);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Editar usuário <i class="bi bi-person-fill-gear"></i>
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($tarefa) :
                        ?>

<form action="acao.php" method="POST">
<input type="hidden" name="tarefa_id" value="<?=$tarefa['id']?>">
            <div class="tudo float-start">
            <div class="mb-3">
                <label for="txtTarefa" class="form-label">Tipo de tarefa</label>
                <input type="text" class="form-control" name="txtTarefa"  id="txtTarefa" value="<?=$tarefa['tarefa']?>">
              </div>
            <div class="mb-3">
                <label for="txtTitulo" class="form-label">Qual parte irá fazer?</label>
                <input type="text" class="form-control" name="txtTitulo" id="txtTitulo" value="<?=$tarefa['titulo']?>">
              </div>
            <div class="mb-3">
                <label for="txtFazer" class="form-label">Bloco de notas</label>
                <textarea class="form-control" name="txtFazer" id="txtFazer" rows="2" value="<?=$tarefa['fazer']?>"></textarea>
              </div>
              <div class="form-check">
             
              <input type="checkbox" value="Pendente" name="txtPendente" id="txtPendente" value="<?=$tarefa['termino']?>">
                <label for="txtPendente" name="txtPendente"> Pendente</label> 
                <input type="checkbox" value="A fazer" name="txtPendente" id="txtPendente" value="<?=$tarefa['termino']?>">
                <label for="txtPendente" name="txtPendente"> A fazer</label> 
                <input type="checkbox" value="Concluido" name="txtPendente" id="txtPendente" value="<?=$tarefa['termino']?>">
                <label for="txtPendente" name="txtPendente"> Concluido</label> 

              </div>
                    <div class="data">
                        <label class="form-check-label" for="txtData">Data da entrega</label>
                        <br>
                        <input type="date"name="txtData" id="txtData" class="data" value="<?=$tarefa['data']?>">
                    </div>
                    <br>
                    <button class="btn btn-primary" name="edita_usuario" type="submit">Salvar a edição</button>
                </div>
                <h4 class="tarefa">Crie aqui a sua tarefa !</h4>
                   
                    
        </form>
    </div>
                       
                        <?php
                        else:
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Usuário não encontrado
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>