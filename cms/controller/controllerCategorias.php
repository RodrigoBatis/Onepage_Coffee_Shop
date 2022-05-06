<?php
/**************************************************************************
     * Objetivo: Arquivo responsavel pelas manipulações de categorias
     *      OBS(Este fará a ponte entre a View e é Model) 
     * Autor: Rodrigo
     * Data: 12/04/2022
     * Versão: 1.0 
     **************************************************************************/


    function listarCategorias()
    {
        require_once("model/bd/gerencionamentoCategorias.php");

      // chama a função que vai buscar os dados no BD
      $dados = selectAllCategoria();

      if(!empty($dados))
      {
          return $dados;
      }else
      {
          return false;
      }

    }    

    function excluirCategoria($id)
     {
        // Validação para verificar se contem um numero valido
        if($id != 0 &&  !empty($id) && is_numeric($id))
        {
            // Importe do arquivo de contato
            require_once("model/bd/gerencionamentoCategorias.php");

            // Chama a função da model e valida se o retorno foi verdadeiro ou falso
            if(deleteCategoria($id))
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

     function inserirCategoria($dadosCategoria)
     {
        if(!empty($dadosCategoria))
        {
            if(!empty($dadosCategoria["txtNome"]))
            {
                $arrayDados = array
                (
                    "nome" => $dadosCategoria["txtNome"]
                );

                require_once("model/bd/gerencionamentoCategorias.php");

                if(insertCategoria($arrayDados))
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

     function buscarCategoria($id)
     {
        // Validação para verificar se contem um numero valido 
        if($id != 0 &&  !empty($id) && is_numeric($id))
        {
            // Importe do arquivo de contato
            require_once("model/bd/gerencionamentoCategorias.php");

            $dados = selectByidCategoria($id);

            if(!empty($dados))
            {
                return $dados;
            }else
            {
                return false;
            }

        }else
        {
            return array('idErro' => 4,
                         'message' => "Não é possivel buscar um registro sem informar um id valido.");
        }
     }

     function atualizarCategoria($dadosCategoria, $id)
     {
         // validação para verificar se o objeto está vazio
         if(!empty($dadosCategoria))
         {
             //validação de caixa vazia dos lementos nome, celular e email pois são obrigatorios no banco de dados
             if(!empty($dadosCategoria["txtNome"]))
             {
                 //validação para garantir que o id seja valido
                 if(!empty($id) && $id != 0 && is_numeric($id))
                {

                    $arrayDados = array 
                    (
                        "id"        => $id,   
                        "nome"      => $dadosCategoria["txtNome"]
                    );

                    // Import do arquivo da modelagem para manipular o BB
                    require_once("model/bd/gerencionamentoCategorias.php");
    
                    // Chama a função que fará o insert no BD(esta função está na model)
                    if(updateCategoria($arrayDados))
                    {
                        return true;
                    }else
                    {
                        return array("idErro" => 1, 
                                    "message" => "não foi possivel atualizar os dados no Banco de Dados!!!");
                    }
                    
                }else
                {
                    return array('idErro' => 4,
                    'message' => "Não é possivel editar o registro sem informar um id valido.");
                }
             }else
             {
                 return array("idErro" => 2,
                             "message" => "existem campos obrigatorios que não foram preenchidos!!!");
             }
         }
     }

     
?>