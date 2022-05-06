<?php
/**************************************************************************
     * Objetivo: Arquivo responsavel por manipular os dados dentro do BD
     *          (insert, update, select, delete) 
     * Autor: Rodrigo
     * Data: 06/05/2022
     * Versão: 1.0 
**************************************************************************/
require_once("conexaomysql.php");

function selectAllUsuario()
{
    $conexao = conexaoMysql();

    $sql = "select * from tbl_usuarios order by id_usuario desc";

    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont =0;
        while($rsDados = mysqli_fetch_assoc($result))
            {
                $arrayDados[$cont] = array(
                    "nome"      => $rsDados["nome"],
                    "login"     => $rsDados["login"],
                    "id"        => $rsDados["id_usuario"]
                );
                $cont++;
            }   
        
        fecharConexaoMysql($conexao);

        if(empty($arrayDados)){
            return false;
          }else
          {
            return $arrayDados;
          }
    }
}

function insertUsuario($dadosUsuario)
{
    $conexao = conexaoMysql();

    $sql = "insert into tbl_usuarios 
        (nome, 
        login, 
        senha)
    values(
        '".$dadosUsuario["nome"]."',
        '".$dadosUsuario["login"]."',
        '".$dadosUsuario["senha"]."');";
    
    if(mysqli_query($conexao, $sql))
    {
        if(mysqli_affected_rows($conexao))
        {
            $statusResultado = true;
        }else
        {
            $statusResultado = false;
        }
    }else
    {
        $statusResultado = false;
    }

    fecharConexaoMysql($conexao);
    return $statusResultado;
}

function deleteUsuario($id)
{
    $conexao = conexaoMysql();

    $sql = "delete from tbl_usuarios where id_usuario =".$id;

    if(mysqli_query($conexao, $sql)){
        if(mysqli_affected_rows($conexao)){
            $statusResultado = true;
        }else{
            $statusResultado = false;
        }

    }else{
        $statusResultado = false;
    }

    return $statusResultado;
}

function selectByidUsuario($id)
{

        $conexao = conexaoMysql();

        $sql = "select * from tbl_usuarios where id_usuario = ".$id;

        $result = mysqli_query($conexao, $sql);

        if($result)
        {

            if($rsDados = mysqli_fetch_assoc($result))
            {
                $arrayDados = array(
                    "id"        => $rsDados["id_usuario"],
                    "nome"      => $rsDados["nome"],
                );
            }   
            
            fecharConexaoMysql($conexao);

            return $arrayDados;
        }
}

function updateUsuario($dadosUsuario)
{
    $conexao = conexaoMysql();

    $sql = "update tbl_usuarios set
       nome = '".$dadosUsuario['nome']."',
       login = '".$dadosUsuario['login']."'
       where id_usuario =  ".$dadosUsuario['id'];

       
   if (mysqli_query($conexao, $sql))
    {
        // Validação para verificar se uma linha foi acrescentada no BD 
        if(mysqli_affected_rows($conexao)){
            $statusResultado = true;
        }else{
            $statusResultado = false;
        }
       
    }else{
        $statusResultado = false;
    }

    fecharConexaoMysql($conexao);
    return $statusResultado;
}

?>