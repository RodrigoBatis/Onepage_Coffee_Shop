<?php

    /**************************************************************************
     * Objetivo: Arquivo responsavel pelas manipulações de usuarios
     *      OBS(Este fará a ponte entre a View e é Model) 
     * Autor: Rodrigo
     * Data: 06/05/2022
     * Versão: 1.0 
     **************************************************************************/

function listarUsuarios()
{
    require_once("model/bd/gerencionamentoUsuarios.php");

  // chama a função que vai buscar os dados no BD
  $dados = selectAllUsuario();

  if(!empty($dados))
  {
      return $dados;
  }else
  {
      return false;
  }

}    


?>