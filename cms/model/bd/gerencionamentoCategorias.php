<?php

/**************************************************************************
     * Objetivo: Arquivo responsavel por manipular os dados dentro do BD
     *          (insert, update, select, delete) 
     * Autor: Rodrigo
     * Data: 12/04/2022
     * Versão: 1.0 
**************************************************************************/

require_once("conexaomysql.php");

function selectAllCategoria()
{
    $conexao = conexaoMysql();

    $sql = "select * from tbl_categorias order by id_categoria desc";

    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont =0;
        while($rsDados = mysqli_fetch_assoc($result))
            {
                $arrayDados[$cont] = array(
                    "nome"      => $rsDados["nome"],
                    "id"        => $rsDados["id_categoria"]
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

function deleteCategoria($id)
{
    $conexao = conexaoMysql();

    $sql = "delete from tbl_categorias where id_categoria =".$id;

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

function insertCategoria($dadosCategoria)
{
    $conexao = conexaoMysql();

    $sql = "insert into tbl_categorias 
        (nome)
    values('".$dadosCategoria["nome"]."')";
    
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

function updateCategoria($dadosCategoria)
{
    $conexao = conexaoMysql();

    $sql = "update tbl_categorias set
       nome = '".$dadosCategoria['nome']."'
       where id_categoria =  ".$dadosCategoria['id'];

       
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

function selectByidContato($id)
{

        $conexao = conexaoMysql();

        $sql = "select * from tbl_categorias where id_categoria = ".$id;

        $result = mysqli_query($conexao, $sql);

        if($result)
        {

            if($rsDados = mysqli_fetch_assoc($result))
            {
                $arrayDados = array(
                    "id"        => $rsDados["id_categoria"],
                    "nome"      => $rsDados["nome"],
                );
            }   
            
            fecharConexaoMysql($conexao);

            return $arrayDados;
        }
}

?>