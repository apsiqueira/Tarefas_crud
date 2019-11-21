<?php
session_start();
require_once "conexao.php";
require_once "apoio.php";
$exibir_tabela = false;

$lista_tarefas = array();

$tarefa = array(
    'id'=> 0,
    'nome'=> '',
    'descricao'=>'',
    'prazo'=>'',
    'prioridade'=>1,
    'concluida' =>''
 
    );


if (isset($_GET["btnEnviar"]) and $_GET["nome"] != "") {




    $tarefa['nome'] = $_GET['nome'];

    if (isset($_GET['descricao'])) {
        $tarefa['descricao'] = utf8_encode($_GET['descricao']);
    } else {
        $tarefa['descricao'] = '';
    }
    if (isset($_GET['prazo'])) {
  
        $tarefa['prazo'] =( $_GET['prazo']);
      
    } else {
        $tarefa['prazo'] = '';
    }
    $tarefa['prioridade'] = $_GET['prioridade'];
    if (isset($_GET['concluida'])) {
        $tarefa['concluida'] = $_GET['concluida'];
    } else {
        $tarefa['concluida'] = '';
    }
    if (isset($_GET['concluida'])) {
$tarefa['concluida'] = 1;
} else {
$tarefa['concluida'] = 0;
}

  



    gravar_tarefa($conexao, $tarefa);
    header("location:index.php");
    die();




}

// elseif(){

if(isset ($_GET["btnEditar"])){
  
// var_dump($_GET);
(isset($_GET["id"]))?$tarefa["id"]=$_GET["id"]:"";
(isset($_GET["nome"]))?$tarefa["nome"]=$_GET["nome"]:"";
(isset($_GET["descricao"]))?$tarefa["descricao"]=$_GET["descricao"]:"";
(isset($_GET["prioridade"]))?$tarefa["prioridade"]=$_GET["prioridade"]:"";
(isset($_GET["prazo"]))?$tarefa["prazo"]=$_GET["prazo"]:"";
(isset($_GET["concluida"]))?$tarefa["concluida"]=$_GET["concluida"]:$tarefa["concluida"]=0;


echo "<pre>";
var_dump($tarefa);
echo "</pre>";
editar_tarefa($conexao,$tarefa);

header("location:index.php");
die();



}

// }




$lista_tarefas = buscar_tarefas($conexao);




?>