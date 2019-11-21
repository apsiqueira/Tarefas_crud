<?php 
require_once "conexao.php";

?>

<fieldset>
    <legend>Lista de Tarefas</legend>



    <table border="1">
      <tr>
        <th>Tarefas</th>
        <th>Descrição</th>
        <th>Prazo</th>
        <th>Prioridade</th>
        <th>Concluida</th>
        <th>Edita</th>
        <th>Deleta</th>
      </tr>

      <?php foreach ($lista_tarefas as $tarefa) : ?>
        <tr>

          <td><?php echo $tarefa['nome']; ?> </td>
          <td><?php echo $tarefa['descricao']; ?> </td>
          <td><?php echo  traduz_data_para_banco($tarefa['prazo']); ?> </td>
          <td><?php

                if ($tarefa['prioridade'] == 0) {

                  echo "Baixa";
                } elseif ($tarefa['prioridade'] == 1) {

                  echo "Media";
                } else {

                  echo "Alta";
                }; ?> </td>
          <td><?php
                if ($tarefa['concluida'] == 0 or $tarefa['concluida'] == "") {
                  echo "Não";
                } else {
                  echo "Sim";
                }

                echo $tarefa['concluida']; ?> </td>
          </td>
          <td>
            <!-- O campo com os links para editar e remover -->
            <a href="editar.php?id=<?php echo $tarefa['id']; ?> ">
              Editar
            </a>
          </td>
          <td>
            <!-- O campo com os links para editar e remover -->
            <a href="remover.php?id=<?php echo $tarefa['id'];?>">
              Deletar
            </a>
          </td>


        </tr>
      <?php endforeach;
      ?>


    </table>


  </fieldset>
