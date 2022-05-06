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

            <h1 class="tituloSesao">Usuarios</h1>

            <div class="cadastroUsuarios">
                <div class="tituloCadastro">
                    <h1> Cadastro de Usuarios </h1>
                </div>
                <div class="cadastroInformacoes">
                   <form action="" name="frmCadastro" method="post">
                   <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label>Usuario:</label>
                        </div>

                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="" placeholder="Digite seu nome" maxlength="100">
                        </div>
                   </div>
                   <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label>Senha:</label>
                        </div>

                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="" placeholder="Digite seu nome" maxlength="100">
                        </div>
                   </div>
                   <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label>Confirme sua Senha:</label>
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

    </main>
</body>
</html>