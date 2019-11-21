<?php

try {
$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '5122';
$bdBanco = 'bd_livro';
$port = 3306;

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $port);




if (mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}

// if(!$conexao){}
function buscar_tarefas($conexao)
{
    $sqlBusca = "SELECT * FROM tarefas;";
    $resultado = mysqli_query($conexao, $sqlBusca);
    $tarefas = array();
    while ($linhaBanco = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $linhaBanco;
    };
    return $tarefas;


    mysqli_close($conexao);
    mysqli_free_result($resultado);
}
//  function gravar_tarefa($conexao,$tarefa){
// $sqlGravar="INSERT INTO tarefas
// (nome, descricao, prioridade,prazo)
// VALUES
// (
// '{$tarefa['nome']}',
// '{$tarefa['descricao']}',
// {$tarefa['prioridade']},
// '{$tarefa[prazo]}'
// )
// ";


// mysqli_query($conexao, $sqlGravar);


// }
function gravar_tarefa($conexao, $tarefa)
{
    $sqlGravar = "INSERT INTO tarefas
(nome, descricao, prioridade, prazo,concluida)
VALUES
(
'{$tarefa['nome']}',
'{$tarefa['descricao']}',
{$tarefa['prioridade']},
'{$tarefa['prazo']}',
{$tarefa['concluida']}


);
";
    // var_dump($sqlGravar);
    mysqli_query($conexao, $sqlGravar);

    
 
}

// O codigo abaixo vai imprimir: 12345




function buscar_tarefa($conexao, $id)
{
    $sqlBusca = "SELECT * FROM tarefas WHERE id=$id;";
    $resultado = mysqli_query($conexao, $sqlBusca);

    while ($linhaBanco = mysqli_fetch_assoc($resultado)) {
        $tarefa = $linhaBanco;
    };
    // print_r($tarefa);
    return $tarefa;
 
 
}

function editar_tarefa($conexao, $tarefa)
{
    $sqlUpdate = "UPDATE tarefas SET nome= '{$tarefa['nome']}', descricao ='{$tarefa['descricao']}' , 
prioridade = {$tarefa['prioridade']},prazo='{$tarefa['prazo']}',concluida={$tarefa['concluida']} WHERE id={$tarefa['id']}";

var_dump($sqlUpdate);

    mysqli_query($conexao, $sqlUpdate);
 
}

function removerTarefa($conexao,$id){

$sql="DELETE FROM tarefas WHERE id=$id";
mysqli_query($conexao,$sql);




}


    

} catch (Exception $e) {
    echo $e;



} finally {



}