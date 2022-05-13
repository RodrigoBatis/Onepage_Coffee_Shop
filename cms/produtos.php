<?php

$form =(String) "router.php?component=usuarios&action=inserir";

$foto = (String) null;
$idcategoria = (String) null;

if(session_status())
    {
        if(!empty($_SESSION["dadosProduto"]))
        {
            $id         = $_SESSION["dadosProduto"]["id"];
            $nome       = $_SESSION["dadosProduto"]["nome"];
            $telefone   = $_SESSION["dadosProduto"]["telefone"];
            $celular    = $_SESSION["dadosProduto"]["celular"];
            $email      = $_SESSION["dadosProduto"]["email"];
            $obs        = $_SESSION["dadosProduto"]["obs"]; 
            $foto       = $_SESSION["dadosProduto"]["foto"];
            $idestado   = $_SESSION["dadosProduto"]["idestado"]; 
            //mudamos a ação do form para editar o registro no click do botão salvar
            $form = "router.php?component=contatos&action=editar&id=".$id."&foto=".$foto;

            //destroi uma vareavel da memoria do navegador
            unset($_SESSION["dadosProduto"]);
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css-cms/reset.css">
    <link rel="stylesheet" href="./css-cms/header.css">
    <link rel="stylesheet" href="./css-cms/sesaoEscolha.css">
    <link rel="stylesheet" href="./css-cms/sesaoDashboard.css">
    <link rel="stylesheet" href="./css-cms/sesaoProdutos.css">
    <title>Gerencionamento-Produtos</title>
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
                <a href="usuarios.php">
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
                <h1 class="tituloSesao">Produtos</h1>

                <div class="cadastroProdutos">
                        <div class="tituloCadastro">
                            <h1> Cadastro de Produtos </h1>
                        </div>
                        <div class="cadastroInformacoes">
                        <form action="<?=$form?>" name="frmCadastro" method="post">

                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Nome Produto:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <input type="text" name="txtNome" value="" placeholder="Digite o nome do produto" maxlength="100">
                                </div>
                        </div>
                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Foto Produto:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                <input type="file"  class="foto" name="fileFoto"  accept=".png, .jpg, .svg, .jpeg">
                                </div>
                        </div>
                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Preço Produto:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <input type="number" name="txtPreco" class="numero" value="" placeholder="Digite o preço do produto" maxlength="100">
                                </div>
                        </div>
                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Percentual desconto:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <input type="number" name="txtDesconto" class="numero" value="" placeholder="Digite o percentual do desconto" maxlength="100">
                                </div>
                        </div>
                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Categoria Produto:</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <select name="sltCategoria">
                                        <option value="">Selecione uma categoria:</option>
                                        <?php
                                            require_once("controller/controllerCategorias.php");
                                            
                                            $listEstados = listarCategorias();

                                            foreach($listEstados as $item)
                                            {
                                                ?>
                                                    <option><?= $idcategoria == $item['idcategoria'] ?'selected':null?> value="<?=$item['idcategoria']?>"><?=$item['nome']?></option>
                                                <?php
                                            }
                                        
                                        ?>
                                    </select>
                                </div>
                        </div>
                        <div class="campos">
                                <div class="cadastroInformacoesPessoais">
                                    <label>Produto Destaque?</label>
                                </div>

                                <div class="cadastroEntradaDeDados">
                                    <input type="radio" class="radio" name="rdoDestaque" value="S"> Sim
                                    <input type="radio" class="radio" name="rdoDestaque" value="N"> Não
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
                                <h1> Consulta de Produtos</h1>
                                </td>
                            </tr>
                            <tr class="tblLinhas">
                                <td class="tblColunas destaque"> Nome </td>
                                <td class="tblColunas destaque"> Preço </td>
                                <td class="tblColunas destaque"> Desconto </td>
                                <td class="tblColunas destaque"> Foto </td>
                                <td class="tblColunas destaque"> Opções </td>
                            </tr>

                            <?php
                                // require_once("controller/controllerProdutos.php");
                                // $listProdutos = "";

                                // if(empty($listProdutos)){
                                //     return false;
                                // }else{

                                //     foreach ($listProdutos as $item) {
                            ?>

                            <tr class="tblLinhas">   

                                <td class="tblColunas registros"><?=$item["nome"]?></td>

                                <td class="tblColunas registros"><?=$item["preco"]?></td>

                                <td class="tblColunas registros"><?=$item["desconto"]?></td>

                                <td class="tblColunas registros"><?=$item["foto"]?></td>

                                <td class="tblColunas registros">

                                    <a onclick="return confirm('Tem certeza que quer excluir esse produto?')" href="router.php?component=produtos&action=deletar&id=<?=$item['id']?>">
                                        <img src="img-cms/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                    </a>

                                    <a href="">
                                        <img src="img-cms/edit.png" alt="Editar" title="Editar" class="editar">
                                    </a>
                                </td>
                            </tr>
                            <?php
                            //    }
                            //  }
                            ?>

                        </table>
                    </div>


            </div>
        </section>
    </main>
</body>
</html>