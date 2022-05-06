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

function inserirUsuarios($dadosUsuarios)
{
        if(!empty($dadosUsuarios))
        {
            if(!empty($dadosUsuarios["txtNome"]) && !empty($dadosUsuarios["txtLogin"]) && !empty($dadosUsuarios["txtSenha"]) && !empty($dadosUsuarios["txtVerificarSenha"]))
            {
                $senha = $dadosUsuarios["txtSenha"];
                $senhaVeri = $dadosUsuarios["txtVerificarSenha"];

                if($senhaVeri == $senha ){
                    $senhaCripty = md5($senha.uniqid(time()));

                    $arrayDados = array
                    (
                        "nome"      => $dadosUsuarios["txtNome"],
                        "login"     => $dadosUsuarios["txtLogin"],
                        "senha"     => $senhaCripty,
                    );
                    
                    require_once("model/bd/gerencionamentoUsuarios.php");

                    if(insertUsuario($arrayDados))
                    {
                        return true;
                    }else
                    {
                        return array("idErro" => 1, 
                        "message" => "não foi possivel inserir os dados no Banco de Dados!!!");
                    }
                }else{
                    return array("idErro" => 3, 
                    "message" => "Senha digitada errada");
                }

            }else
            {
                return array("idErro" => 2,
                            "message" => "existem campos obrigatorios que não foram preenchidos!!!");
            }
        }
}

function excluirUsuario($id)
{
        // Validação para verificar se contem um numero valido
        if($id != 0 &&  !empty($id) && is_numeric($id))
        {
            
            require_once("model/bd/gerencionamentoUsuarios.php");

            
            if(deleteUsuario($id))
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

function buscarUsuario($id)
{
   // Validação para verificar se contem um numero valido 
   if($id != 0 &&  !empty($id) && is_numeric($id))
   {
       // Importe do arquivo de contato
       require_once("model/bd/gerencionamentoUsuarios.php");

       $dados = selectByidUsuario($id);

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

function atualizarUsuario($dadosUsuarios, $id)
{
    // validação para verificar se o objeto está vazio
    if(!empty($dadosUsuarios))
    {
        //validação de caixa vazia dos lementos nome, celular e email pois são obrigatorios no banco de dados
        if(!empty($dadosUsuarios["txtNome"])&& !empty($dadosUsuarios["txtLogin"]) && !empty($dadosUsuarios["txtSenha"]) && !empty($dadosUsuarios["txtVerificarSenha"]))
        {
            //validação para garantir que o id seja valido
            if(!empty($id) && $id != 0 && is_numeric($id))
           {
                $senha = $dadosUsuarios["txtSenha"];
                $senhaVeri = $dadosUsuarios["txtVerificarSenha"];

                if($senhaVeri == $senha)
                {
                    $senhaCripty = md5($senha.uniqid(time()));

                    $arrayDados = array 
                    (
                        "id"             => $id,   
                        "nome"           => $dadosUsuarios["txtNome"],
                        "login"          => $dadosUsuarios["txtLogin"],
                        "senha"          => $senhaCripty
                    );
    
                    // Import do arquivo da modelagem para manipular o BB
                    require_once("model/bd/gerencionamentoUsuarios.php");
    
                    // Chama a função que fará o insert no BD(esta função está na model)
                    if(updateUsuario($arrayDados))
                    {
                        return true;
                    }else
                    {
                        return array("idErro" => 1, 
                                    "message" => "não foi possivel atualizar os dados no Banco de Dados!!!");
                    }
                }else
                {
                    return array("idErro" => 3, 
                    "message" => "Senha digitada errada");
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