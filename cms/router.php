<?php

 /***************************************************************************
     * Objetivo: Arquivo de rota, para segmentar as ações pela view
     *      (dados de um form, listagem de dados, ação de excluir ou atualizar).
     *      Esse arquivo será responsavel por encaminar as solicitações para 
     *      a controller
     * Autor: Rodrigo
     * Data: 05/04/2022
     * Versão: 1.0 
     
     **************************************************************************/

    $action     = (String) null;
    $component  = (String) null;

    if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET")
    {
     
        $component  = strtoupper($_GET["component"]);
        $action     = strtoupper($_GET["action"]);

        
        switch ($component)
        {
            case "CONTATOS":

            require_once("Controller/controllerContatos.php");

            if($action == 'DELETAR')
            {
                $idContato = $_GET["id"];

                    $resposta = excluirContato($idContato);

                    if(is_bool($resposta))
                    {
                        if($resposta)
                        {
                            echo("<script>
                                    alert('Registro excluido com sucesso');
                                    window.location.href = 'contatos.php'; 
                                </script>");
                        }
                    }elseif(is_array($resposta))
                    {
                        echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back(); 
                            </script>");
                    }
            }
            break;

            case "CATEGORIAS":

            require_once("Controller/controllerCategorias.php");    

            if($action == 'DELETAR')
            {
                $idCategoria = $_GET["id"];
                   
                $resposta = excluirCategoria($idCategoria);
                    
                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                    alert('Categoria excluido com sucesso');
                                    window.location.href = 'categorias.php'; 
                                </script>");
                    }
                }elseif(is_array($resposta))
                {
                    echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back(); 
                            </script>");
                }
            }
        }
    }    

?>