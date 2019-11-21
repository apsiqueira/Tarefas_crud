<?php
session_start();
require_once "conexao.php";
require_once "apoio.php";
$exibir_tabela = false;
$temErros;
$erros_validacao=array();



$lista_tarefas = array();

$tarefa = array(
    'id'=> 0,
    'nome'=> '',
    'descricao'=>'',
    'prazo'=>'',
    'prioridade'=>1,
    'concluida' =>''
 
    );

if (existPost()) {




    if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
        $tarefa['nome'] = $_POST['nome'];
        } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome da tarefa é obrigatório!';
        }

    if (isset($_POST['descricao'])) {
        $tarefa['descricao'] = utf8_encode($_POST['descricao']);
    } else {
        $tarefa['descricao'] = '';
    }
    if (isset($_POST['prazo'])) {
  
        $tarefa['prazo'] =( $_POST['prazo']);
      
    } else {
        $tarefa['prazo'] = '';
    }
    $tarefa['prioridade'] = $_POST['prioridade'];
    if (isset($_POST['concluida'])) {
        $tarefa['concluida'] = $_POST['concluida'];
    } else {
        $tarefa['concluida'] = '';
    }
    if (isset($_POST['concluida'])) {
$tarefa['concluida'] = 1;
} else {
$tarefa['concluida'] = 0;
}

  


if (! $tem_erros) {
    gravar_tarefa($conexao, $tarefa);
    header('Location: tarefas.php');
    die();
    }


    // gravar_tarefa($conexao, $tarefa);
    // header("location:index.php");
    // die();




}

// elseif(){

if(isset ($_POST["btnEditar"])){
  
// var_dump($_POST);
(isset($_POST["id"]))?$tarefa["id"]=$_POST["id"]:"";
(isset($_POST["nome"]))?$tarefa["nome"]=$_POST["nome"]:"";
(isset($_POST["descricao"]))?$tarefa["descricao"]=$_POST["descricao"]:"";
(isset($_POST["prioridade"]))?$tarefa["prioridade"]=$_POST["prioridade"]:"";
(isset($_POST["prazo"]))?$tarefa["prazo"]=$_POST["prazo"]:"";
(isset($_POST["concluida"]))?$tarefa["concluida"]=$_POST["concluida"]:$tarefa["concluida"]=0;


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