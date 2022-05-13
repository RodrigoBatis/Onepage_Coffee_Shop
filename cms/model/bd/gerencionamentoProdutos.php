<?php
/**************************************************************************
     * Objetivo: Arquivo responsavel por manipular os dados dentro do BD
     *          (insert, update, select, delete) 
     * Autor: Rodrigo
     * Data: 13/05/2022
     * Versão: 1.0 
**************************************************************************/

require_once("conexaomysql.php");

function insertProduto($dadosProduto)
{
    $conexao = conexaoMysql();

    $sql = "insert into tbl_usuarios 
        (nome, 
        preco, 
        desconto,
        destaque,
        foto)
    values(
        '".$dadosProduto["nome"]."',
        '".$dadosProduto["preco"]."',
        '".$dadosProduto["desconto"]."',
        '".$dadosProduto["destaque"]."',
        '".$dadosProduto["foto"]."');";
    
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

function deleteProduto($id)
{
    $conexao = conexaoMysql();

    $sql = "delete from tbl_produtos where id_produto =".$id;

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

function selectAllProdutos()
{
    $conexao = conexaoMysql();

    $sql = "select * from tbl_produtos order by id_produto desc";

    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont =0;
        while($rsDados = mysqli_fetch_assoc($result))
            {
                $arrayDados[$cont] = array(
                    "nome"      => $rsDados["nome"],
                    "preco"     => $rsDados["preco"],
                    "desconto"     => $rsDados["desconto"],
                    "id"        => $rsDados["id_produto"],
                    "foto"      => $rsDados["foto"],
                    "idcategoria"  => $rsDados["id_categoria"]
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

?>