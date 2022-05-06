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


?>