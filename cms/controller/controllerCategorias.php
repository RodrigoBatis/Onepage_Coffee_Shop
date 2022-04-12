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
?>