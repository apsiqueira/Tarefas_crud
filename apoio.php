<?php 
session_start();



function traduz_data_para_banco($data)
{
if ($data == "") {
return "";
}
$dados = explode("-", $data);
$data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
return $data_mysql;
}


function checaprioridade($value){

    switch($value){

    case 1: return "checked";
    break;

    case 2: return "checked";
    break;


    case 3: return "checked";
    break;

    default: return "";






    }




}
