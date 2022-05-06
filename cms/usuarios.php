<?php

$form =(String) "router.php?component=usuarios&action=inserir";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css-cms/reset.css">
    <link rel="stylesheet" href="./css-cms/header.css">
    <link rel="stylesheet" href="./css-cms/sesaoEscolha.css">
    <link rel="stylesheet" href="./css-cms/sesaoUsuarios.css">
    <link rel="stylesheet" href="./css-cms/sesaoDashboard.css">
    <title>Gerencionamento-Usuarios</title>
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
                <a href="categorias.php">
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
                <a href="dashboard.php">
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

            <section>
                <div class="sesaoDashboard">
                    <h1 class="tituloSesao">Usuarios</h1>

                    <div class="cadastroUsuarios">
                        <div class="tituloCadastro">
                            <h1> Cadastro de Usuarios </h1>
                        </div>
                        <div class="cadastroInformacoes">
                        <form action="<?=$form?>" name="frmCadastro" method="post">

                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Nome:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <input type="text" name="txtNome" value="" placeholder="Digite seu nome" maxlength="100">
                                </div>
                        </div>
                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Login:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <input type="text" name="txtNome" value="" placeholder="Digite seu login" maxlength="100">
                                </div>
                        </div>
                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Senha:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <input type="text" name="txtSenha" value="" placeholder="Crie sua senha" maxlength="100">
                                </div>
                        </div>
                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Confirme sua Senha:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <input type="text" name="txtVerificarSenha" value="" placeholder="Confirme sua senha" maxlength="100">
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

                    <div class="consultaDeDados">
                        <table class="tblConsulta">
                            <tr>
                                <td class="tblTitulo" colspan="6">
                                <h1> Consulta de Usuarios</h1>
                                </td>
                            </tr>
                            <tr class="tblLinhas">
                                <td class="tblColunas destaque"> Nome </td>
                                <td class="tblColunas destaque"> Login </td>
                                <td class="tblColunas destaque"> Opções </td>
                            </tr>

                            <?php
                                require_once("controller/controllerUsuarios.php");
                                $listUsuarios = listarUsuarios();

                                if(empty($listUsuarios)){
                                    return false;
                                }else{

                                    foreach ($listUsuarios as $item) {
                            ?>

                            <tr class="tblLinhas">   

                                <td class="tblColunas registros"><?=$item["nome"]?></td>

                                <td class="tblColunas registros"><?=$item["login"]?></td>

                                <td class="tblColunas registros">

                                    <a onclick="return confirm('Tem certeza que quer excluir esse usuario?')" href="">
                                        <img src="img-cms/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                    </a>

                                    <a href="">
                                        <img src="img-cms/edit.png" alt="Editar" title="Editar" class="editar">
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                             }
                            ?>

                        </table>
                    </div>

                </div>
            </section>
            

    </main>
</body>
</html>