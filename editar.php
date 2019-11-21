
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <?php
   
    include "conexao.php";
    include "apoio.php";
    include_once "tarefas.php";
    $exibir_tabela = false;


    if (isset($_GET["id"]) and $_GET["id"] != "") {

         
        $tarefa = buscar_tarefa($conexao, $_GET["id"]);
    
        ?>
 

        <fieldset>

            <legend>Gerenciador de Tarefas</legend>
            <form action="index.php" action="GET">
                <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?> " />
                <label for="nome">Tarefa :</label>
                <input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>"><br>

                <label for="descricao">Descrição :</label><br>
                <textarea name="descricao" id="descricao" cols="30" rows="10" te>
                <?php echo $tarefa['descricao']; ?>
                </textarea><br>
                <label for="prazo">Prazo :</label>
                <input type="date" name="prazo" value="<?php echo $tarefa['prazo']; ?>" >

                <fieldset>

                    <legend>Prioridade :</legend>
               

                    <input type="radio" name="prioridade" value="1" <?php echo ($tarefa['prioridade']==1)? 'checked':'';?>> Baixo </radio>
                    <input type="radio" name="prioridade" value="2" <?php echo ($tarefa["prioridade"]==2)? "checked" :"";?>>Media </radio>
                    <input type="radio" name="prioridade" value="3" <?php echo ($tarefa["prioridade"]==3)? "checked" :"";?> >Alta </radio>



                </fieldset>
                <label>Tarefa Concluida :
                    <input type="checkbox" name="concluida" value="1" <?php echo ($tarefa['concluida']==1)? 'checked' : '';   ?>>


                </label>







                <input type="submit" value="<?php echo ($tarefa['id'] > 0)?'Atualizar':'Cadastrar';?>" name="btnEditar">
               
    <?php 
  
    ?>

            </form>





        </fieldset>









    <?php }

    $lista_tarefas = buscar_tarefas($conexao);




    ?>






    <?php if ($exibir_tabela) : ?>
        <?php include('tabela.php'); ?>
    <?php endif; ?>






</body>

</html>