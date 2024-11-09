<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tarefas";
$tarefa = mysqli_query($conn, $sql);

?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Tarefa</title>
</head>
<body>
    <div class="container text-center">
      
       
            <div class="p-3 mb-2 bg-dark-subtle text-dark-emphasis">
                <h4> <i class="bi bi-list-check float-start"></i> Suas tarefas aqui 
                    <a href="adicionar.php" button type="button" class="btn btn-info float-end" >Adicionar tarefas</button></a>
                </h4>
                
            </div>
          </div>
        </div>
        
        
        <div class="container" style="display:flex">
            <div class="row">             
             <tbody>
                <?php foreach ($tarefa as $tarefas): ?>
                    <div class="card" style="width:400px" style="box-shadow:0px 0px 5px;">
                   <div class="card-body" >
                   <a href="tarefa-edit.php?id=<?=$tarefas['id']?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-fill"></i> Editar</a>
                            <form action="acao.php" method="POST" class="d-inline">
                                <button onclick="return confirm('Tem certeza que deseja excluir?')" name="delete_usuario" type="submit" value="<?=$tarefas['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>Excluir</button>
                            </form>
             <p>ID</p>
             <p class="card-title"><?php echo $tarefas['id']; ?></p>
             <p style="color:white; background-color:black; width:40%; text-align:center; border-radius:10px;">TIPO DE TAREFA</p>
             <p class="card-title" style="font-size:20px;"><?php echo $tarefas['tarefa']; ?></p>
             <hr>
             <p style="color:white; background-color:gray; width:60%; text-align:center; border-radius:10px;">QUAL PARTE FAZER?</p>
             <p class="card-title" style="font-size:20px;"><?php echo $tarefas['titulo']; ?></p>
             <hr>
             <p style="color:white; background-color:gray; width:60%; text-align:center; border-radius:10px;">BLOCO DE NOTAS</p>
             <p class="card-title" style="font-size:20px;" ><?php echo $tarefas['fazer']; ?></p>
             <hr>
             <p style="color:white; background-color:black; width:40%; text-align:center; border-radius:10px;">STATUS</p>
             <p class="card-title" style="color: green; font-size:20px;"><?php echo $tarefas['termino']; ?></p>
             <hr>
             <p style="color:white; background-color:black; width:60%; text-align:center; border-radius:10px;">DATA DA ENTREGA</p>
             <p class="card-title" style="font-size:20px;"><?php echo date('d/m/Y', strtotime($tarefas['data'])); ?></p>
             </div>
           </div>
                <?php endforeach; ?>
            </tbody>
            </div>
        </div> 
      </div>
    </div>
 </div>
 </div>
    </div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>