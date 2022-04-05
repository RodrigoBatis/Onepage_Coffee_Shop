<?php
/**************************************************************************
     * Objetivo: Arquivo responsavel pelas manipulações de dados de contatos
     *      OBS(Este fará a ponte entre a View e é Model) 
     * Autor: Rodrigo
     * Data: 05/04/2022
     * Versão: 1.0 
     **************************************************************************/

    function listarContato()
    {
      require_once("model/bd/contato.php");

      // chama a função que vai buscar os dados no BD
      $dados = selectAllContato();

      if(!empty($dados))
      {
          return $dados;
      }else
      {
          return false;
      }

    }    

    function excluirContato($id)
     {
        // Validação para verificar se contem um numero valido
        if($id != 0 &&  !empty($id) && is_numeric($id))
        {
            // Importe do arquivo de contato
            require_once("model/bd/contato.php");

            // Chama a função da model e valida se o retorno foi verdadeiro ou falso
            if(deleteContato($id))
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