<?php

/**************************************************************************
     * Objetivo: Arquivo responsavel por manipular os dados dentro do BD
     *          (insert, update, select, delete) 
     * Autor: Rodrigo
     * Data: 05/04/2022
     * Versão: 1.0 
**************************************************************************/

require_once("conexaomysql.php");

function selectAllContato()
{
    $conexao = conexaoMysql();

    $sql = "select * from tbl_contatos order by id_contato desc";

    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont =0;
        while($rsDados = mysqli_fetch_assoc($result))
            {
                $arrayDados[$cont] = array(
                    "nome"      => $rsDados["nome"],
                    "email"     => $rsDados["email"],
                    "obs"       => $rsDados["obs"],
                    "id"        => $rsDados["id_contato"]
                );
                $cont++;
            }   
            
            fecharConexaoMysql($conexao);
            
            if(empty($arrayDados)){
                return false;
            }else{
                return $arrayDados;
            }
    }
}

function deleteContato($id)
{
    $conexao = conexaoMysql();

    $sql = "delete from tbl_contatos where id_contato =".$id;

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