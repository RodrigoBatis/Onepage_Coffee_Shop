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
    <link rel="stylesheet" href="css-cms/sesaoContato.css">
    <title>Gerencionamento-Contatos</title>
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
        <section id="sesaoEscolha">
            <div class="container-escolha">
                <img src="img-cms/produtos.png" alt="admProdutos">

                <span>Adm. de Produtos</span>
            </div>
            <div class="container-escolha">
                <img src="img-cms/categorias.png" alt="categorias">
                <span>Adm. de Categorias</span>
            </div>

            <div class="container-escolha">
                <img src="img-cms/contato.png" alt="contatos">
                <span>Contatos</span>
            </div>

            <div class="container-escolha">
                <img src="img-cms/usuarios.png" alt="usuarios">
                <span>Usuarios</span>
            </div>

            <div class="container-escolha">
                <p>Bem Vindo <span>-- Rodrigo --</span></p>
                <img src="img-cms/sair.png" alt="sair">
                <span>Logout</span>
            </div>

        </section>
        <section>

            <div id="sesaoDashboard">
                <h1 id="tituloSesao">Contatos</h1>
                <div id="consultaDeDados">
                    <table id="tblConsulta">
                        <tr>
                            <td id="tblTitulo" colspan="6">
                                <h1> Consulta de Dados.</h1>
                            </td>
                        </tr>
                        <tr id="tblLinhas">
                            <td class="tblColunas destaque"> Nome </td>
                            <td class="tblColunas destaque"> Email </td>
                            <td class="tblColunas destaque"> Opções </td>
                        </tr>

                        <?php
                        require_once("controller/controllerContatos.php");
                        $listContato = listarContato();
                        foreach ($listContato as $item) {
                        ?>
                            <tr id="tblLinhas">
                                <td class="tblColunas registros"><?= $item["nome"] ?></td>
                                <td class="tblColunas registros"><?= $item["email"] ?></td>

                                <td class="tblColunas registros">
                                    <img src="img-cms/edit.png" alt="Editar" title="Editar" class="editar">

                                    <a onclick="return confirm('Tem certeza que quer excluir esse contato?')" href="../router.php?component=contatos&action=deletar&id=<?= $item['id'] ?>">
                                        <img src="img-cms/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                    </a>

                                    <img src="img-cms/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
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