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
            }elseif($action == "INSERIR")
            {
                $resposta = inserirCategoria($_POST);

                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                alert('Registro inserido com sucesso');
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
            }elseif($action == "BUSCAR")
            {
                $idCategoria = $_GET["id"];

                $dados = buscarCategoria($idCategoria);

                session_start();

                $_SESSION["dadosCategoria"] = $dados;

                require_once("categorias.php");
            }elseif($action == "EDITAR")
            {
                $idCategoria = $_GET["id"];
                
                $resposta = atualizarCategoria($_POST, $idCategoria);

                if(is_bool($resposta))
                     {
                         if($resposta){
                             echo("<script>
                                     alert('Registro Atualizado com sucesso');
                                     window.location.href = 'categorias.php'; 
                                 </script>");
                         }
                     }elseif(is_array($resposta)){
                         echo("<script>
                                 alert('".$resposta['message']."');
                                 window.history.back(); 
                             </script>");
                     }
            }
            break;

            case "USUARIOS":

            require_once("Controller/controllerUsuarios.php");

            if($action == 'INSERIR')
            {
                $resposta = inserirUsuarios($_POST);

                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                alert('Registro inserido com sucesso');
                                window.location.href = 'usuarios.php'; 
                            </script>");
                    }
                }elseif(is_array($resposta))
                {
                    echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back(); 
                            </script>");
                }
            }elseif($action == 'DELETAR')
            {
                $idProduto = $_GET["id"];
                   
                $resposta = excluirUsuario($idProduto);
                    
                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                    alert('Usuario excluido com sucesso');
                                    window.location.href = 'usuarios.php'; 
                                </script>");
                    }
                }elseif(is_array($resposta))
                {
                    echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back(); 
                            </script>");
                }
            }elseif($action == 'BUSCAR')
            {
                $idProduto = $_GET["id"];

                $dados = buscarUsuario($idProduto);

                session_start();

                $_SESSION["dadosUsuario"] = $dados;

                require_once("usuarios.php");
            }elseif($action == 'EDITAR')
            {
                $idProduto = $_GET["id"];
                
                $resposta = atualizarUsuario($_POST, $idProduto);

                if(is_bool($resposta))
                     {
                         if($resposta){
                             echo("<script>
                                     alert('Registro Atualizado com sucesso');
                                     window.location.href = 'usuarios.php'; 
                                 </script>");
                         }
                     }elseif(is_array($resposta)){
                         echo("<script>
                                 alert('".$resposta['message']."');
                                 window.history.back(); 
                             </script>");
                     }
            }
            break;

            case "PRODUTOS":

            require_once("Controller/controllerProdutos.php");
         
            if($action == 'INSERIR')
            {
                $resposta = inserirUsuarios($_POST);

                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                alert('Registro inserido com sucesso');
                                window.location.href = 'usuarios.php'; 
                            </script>");
                    }
                }elseif(is_array($resposta))
                {
                    echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back(); 
                            </script>");
                }
            }elseif($action == 'DELETAR')
            {
                $idProduto = $_GET["id"];
                   
                $resposta = excluirProduto($idProduto);
                    
                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                    alert('Usuario excluido com sucesso');
                                    window.location.href = 'produtos.php'; 
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