<?php
/**************************************************************************
* Objetivo: Arquivo responsavel pelas manipulações de usuarios
*      OBS(Este fará a ponte entre a View e é Model) 
* Autor: Rodrigo
* Data: 06/05/2022
* Versão: 1.0 
**************************************************************************/

function inserirProdutos($dadosProdutos)
{
    $nomeFoto = (String) null;
        if(!empty($dadosProdutos))
        {
            

            if(!empty($dadosProdutos["txtNome"]) && !empty($dadosProdutos["txtpreco"]) && !empty($dadosProdutos["fileFoto"]))
            {
                require_once("modulo/upload.php");

                $nomeFoto = uploadFile($file['fileFoto']);

                $arrayDados = array
                (
                    "nome"         => $dadosProdutos["txtNome"],
                    "login"        => $dadosProdutos["txtPreco"],
                    "nome"         => $dadosProdutos["txtDesconto"],
                    "login"        => $dadosProdutos["sltCategoria"],
                    "destaque"     => $dadosProdutos["rdoDestaque"],
                    "foto"         => $nomeFoto,
                    "idCategoria"  => $dadosContato["sltCategoria"]
                );
                    
                require_once("model/bd/gerencionamentoProdutos.php");

                if(insertProduto($arrayDados))
                {
                    return true;
                }else
                {
                    return array("idErro" => 1, 
                    "message" => "não foi possivel inserir os dados no Banco de Dados!!!");
                }

            }else
            {
                return array("idErro" => 2,
                            "message" => "existem campos obrigatorios que não foram preenchidos!!!");
            }
        }
}

function excluirProduto($id)
{
        if($id != 0 &&  !empty($id) && is_numeric($id))
        {
            
            require_once("model/bd/gerencionamentoProdutos.php");

            
            if(deleteProduto($id))
            {
                return true;
            }else
            {
                return array('idErro' => 3,
                'message' => "O banco não pode excluir o registro.");
            }
        }else
        {
            return array('idErro' => 4,
                         'message' => "Não é possivel excluir o registro sem informar um id valido.");
        }
}


function listarProdutos()
{
    require_once("model/bd/gerencionamentoProdutos.php");

  // chama a função que vai buscar os dados no BD
  $dados = selectAllProdutos();

  if(!empty($dados))
  {
      return $dados;
  }else
  {
      return false;
  }

}    

?>