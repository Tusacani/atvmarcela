<?php
    require_once "../../conf/Conexao.php";

    include 'acao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Hobbies</title>
        <link rel="stylesheet" href="estilo.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
        <style>
            .teste{
                margin: 1vh;
            }
        </style>
    </head>
    <body>
        <a href="../../index.php">Voltar</a>
        <center><h1>Cadastro de Hobbies & Contatos</h1></center>
        
        <div class='row teste'>
            <div class='col-12 '>
                <form action="acao.php" method="post">
                    <div class='row'>
                        <div class='col-6'>
                            <label for="descricao">Contato:</label>
                            <select class="form-select" name="idContato" id="idContato">
                                    <?php
                                        $conexao = Conexao::getInstance();
                                        $consulta=$conexao->query("SELECT*FROM contatos;");
                                        while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                            if ($linha['id'] == $dados['idContato']) {
                                                echo "<option value='".$linha['id']."' selected>".$linha['nome']."</option>";
                                            }else{
                                                echo "<option value='".$linha['id']."'>".$linha['nome']."</option>";
                                            }
                                        }

                                    ?>
                            </select>
                        </div>
                    
                        <div class='col-6'>
                            <label for="descricao">Hobbies:</label>
        
                            <select class="form-select" name="idHobbie" id="idHobbie">
                                <?php
                                    $conexao = Conexao::getInstance();
                                    $consulta=$conexao->query("SELECT*FROM hobbies;");
                                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                        if ($linha['id'] == $dados['idHobbie']) {
                                            echo "<option value='".$linha['id']."' selected>".$linha['descricao']."</option>";
                                        }else{
                                            echo "<option value='".$linha['id']."'>".$linha['descricao']."</option>";
                                        }
                                    }

                                ?>
                            </select>
                        </div>
                    </div>  
                        <br>
                    <div class='row'>
                        <div class='col-12'>
                            <center><button type='submit' name='acao' class="btn btn-success" id='acao' value='salvar'>Salvar</button></center>
                        </div>
                    </div>       
                </form>
            </div>
        </div> 
        <div class='row'>
            <?php

            ?>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Contato</th>
                            <th>Hobbie</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                                $conexao = Conexao::getInstance();
                                $consulta=$conexao->query("SELECT contato_hobbie.id as id, idContato, idHobbie, contatos.nome as contato, hobbies.descricao as hobbie FROM contato_hobbie JOIN contatos ON idContato = contatos.id JOIN hobbies ON idHobbie = hobbies.id;");
                                while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                    echo "
                                        <td value='{$linha['idContato']}'>{$linha['contato']}</td>
                                        <td value='{$linha['idHobbie']}'>{$linha['hobbie']}</td>
                                        <td><a class='btn btn-warning' href='index.php?acao=editar&id={$linha['id']}'>Editar</a></td>
                                        <td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&idContato={$linha['idContato']}&idHobbie={$linha['idHobbie']}'>Excluir</a></td>
                                        </tr>\n
                                    ";
                                
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>