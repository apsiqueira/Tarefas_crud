<?php 
include_once "conexao.php";




if(isset($_GET["id"])){

    $id=$_GET["id"];

    removerTarefa($conexao,$id);
    
    
    ;?>

  <script>alert ("Tarefa Excluida")</script>
    <h1>teste</h1>
 
   
<?php
header("location:index.php");


}





?>