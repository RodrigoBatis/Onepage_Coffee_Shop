<?php

    $form =(String) "router.php?component=categorias&action=inserir";

    if(session_status())    
    {
        if(!empty($_SESSION["dadosCategoria"]))
        {
            $id         = $_SESSION["dadosCategoria"]["id"];
            $nome       = $_SESSION["dadosCategoria"]["nome"];

            $form = "router.php?component=categorias&action=editar&id=".$id;

            //destroi uma vareavel da memoria do navegador
            unset($_SESSION["dadosCategoria"]);
        }
    }    

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-cms/reset.css">
    <link rel="stylesheet" href="css-cms/style.css">
    <link rel="stylesheet" href="css-cms/header.css">
    <link rel="stylesheet" href="css-cms/sesaoEscolha.css">
    <link rel="stylesheet" href="css-cms/sesaoDashboard.css">
    <link rel="stylesheet" href="css-cms/footer.css">
    <link rel="stylesheet" href="css-cms/sesaoCategoria.css">
    <title>Gerencionamento-Categorias</title>
</head>
<body>
    <header>
    <div id="divTextoHeader">
            <div>
                <span id="cms">C M S</span>
                <span id="nomeEmpresa">-- Good Coffee --</span>
            </div>
            <span id="descricao">Gerencionamento de Conteúdo do Site</span>
        </div>
        <div id="logo">
            <span id="txtLogo">Good Coffee</span>
        </div>
    </header>
    <main>
    <section class="sesaoEscolha">
            <div class="container-escolha">
                <a href="">
                    <img src="img-cms/produtos.png" alt="admProdutos">
                    <span>Adm. de Produtos</span>
                </a>
            </div>
            <div class="container-escolha">
                <a href="dashboard.php">
                    <img src="img-cms/categorias.png" alt="categorias">
                    <span>Adm. de Categorias</span>
                </a>
            </div>

            <div class="container-escolha">
                <a href="contatos.php">
                    <img src="img-cms/contato.png" alt="contatos">
                    <span>Contatos</span>
                </a>
            </div>

            <div class="container-escolha">
                <a href="">
                    <img src="img-cms/usuarios.png" alt="usuarios">
                    <span>Usuarios</span>
                </a>
            </div>

            <div class="container-escolha">
                <p>Bem Vindo <span>-- Rodrigo --</span></p>
                <a href="">
                    <img src="img-cms/sair.png" alt="sair">
                    <span>Logout</span>
                </a>
            </div>

        </section>
        <h1 class="tituloSesao">Categorias</h1>

            <div class="cadastroCategorias">
                <div class="tituloCadastro">
                    <h1> Cadastro de Categorias </h1>
                </div>
                <div class="cadastroInformacoes">
                   <form action="<?=$form?>" name="frmCadastro" method="post">
                   <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="" placeholder="Digite seu nome" maxlength="100">
                        </div>
                   </div>
                   <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                   </form>

                </div>

            </div>
        <section>
            
        </section>

        <section>
            <div class="sesaoDashboard">
            
            <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Categorias</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
                <?php
                    require_once("controller/controllerCategorias.php");
                    $listCategorias = listarCategorias();
                    foreach ($listCategorias as $item) {
                ?>

                <tr id="tblLinhas">   

                    <td class="tblColunas registros"><?= $item["nome"] ?></td>

                    <td class="tblColunas registros">

                            <a onclick="return confirm('Tem certeza que quer excluir essa categoria?')" href="router.php?component=categorias&action=deletar&id=<?=$item['id']?>">
                                <img src="img-cms/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>

                            <a href="router.php?component=categorias&action=buscar&id=<?=$item['id']?>">
                                <img src="img-cms/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>
                    </td>
                </tr>

                <?php
                    }
                ?>

            </table>
        </div>

            </div>
        </section>
    </main>
    <footer>
        <span>Copyright 2022 © | Rodrigo Batista</span>
    </footer>
</body>
</html>