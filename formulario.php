<fieldset>

    <legend>Gerenciador de Tarefas</legend>
    <form action="index.php" method="POST">
      <label for="nome">Tarefa :
      <?php 
        
        
        
        
        ?>
      
      
      </label>
      <input type="text" name="nome" placeholder="nome" required><br>

      <label for="descricao">Descrição :</label><br>
      <textarea name="descricao" id="" cols="30" rows="10"></textarea><br>
      <label for="prazo">Prazo :</label>
      <input type="date" name="prazo">

      <fieldset>

        <legend>Prioridade :</legend>

        <input type="radio" name="prioridade" value="1" checked>Baixa </radio>
        <input type="radio" name="prioridade" value="2">Media </radio>
        <input type="radio" name="prioridade" value="3">Alta </radio>



      </fieldset>
      <label>Tarefa Concluida :
        <input type="checkbox" name="concluida" value="sim">


      </label>







      <input type="submit" value="Inserir" name="btnEnviar">


    </form>





  </fieldset>