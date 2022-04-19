<?php
/**************************************************************************
 * Objetivo: arquivo para criar a conexão com o bd Mysql
 * Autor: Rodrigo
 * Data: 05/04/2022
 * Versão: 1.0
***************************************************************************/

const SERVER = "localhost";
const USER = "root";
const PASSWORD = "bcd127";
const DATABASE = "db_good_coffee";

$resultado = conexaoMysql();

function conexaoMysql()
{   
    $conexao = array();

    // Se a conexão for estabelecida com o BD, iremos ter um array de dados sobre a conexão
    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    //Validar para verificar se a conexão foi realizada com sucesso
    if($conexao){
        return $conexao;
    }else{
        return false;
    }
}

function fecharConexaoMysql($conexao)
{
    mysqli_close($conexao);
}

?>