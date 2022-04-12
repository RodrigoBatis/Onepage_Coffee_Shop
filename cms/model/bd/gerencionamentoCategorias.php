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
            
            return $arrayDados;
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




?>