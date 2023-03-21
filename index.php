<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Currículo</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@600&display=swap" rel="stylesheet">

    <script src="assets/js/script.js"></script>  
    <?php
        $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : ""; 

        switch ($aviso) {
     case 'sucesso':
     $msg = "Proposta Enviada com Sucesso!";
        alert($msg);
            break;
            default:
                # code...
                break;
        }
    function alert($msg) {
 echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    ?>
</head>
    <body>
        <nav class="menu">
            <ul>
                <li id="item">Página inicial</li>
                <li><a href='pages/contatos/index.php'>Contatos</a></li>
                <li><a href='pages/cidades/index.php'>Cidades</a></li>
                <li><a href='pages/hobbies/index.php'>Hobbies</a></li>
                <li><a href='pages/contatoHobbies/index.php'>Contato & Hobbies</a></li>
                <li><a href='pages/proposta/index.php'>Proposta</a></li>
            </ul>
        </nav>
        <section>
            <div class="row">
                <div class="col-6">
                    <h1 style="color:black">Currículo: Tuani R. Sacani</h1>
                    <p>Sou aluna de informática do IFC</p>
                    <h2>Meus Conhecimentos:</h2>
                    <ul>
                    <li>HTML</li>
                     <li>Cuidar de Crianças</li>
                    <li>Canva</li>
                    <li>Redes sociais</li>
            
                    </ul>
                    <h2>Experiência Profissional</h2>
                    <ol>
                     <li><a href="https://www.canva.com/design/DAFNJh2mf3c/4anpICRer_8YeY5qjMoDSQ/watch?utm_content=DAFNJh2mf3c&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton">Projeto sobre crianças com autismo</a></li>
                   
                    </ol>
                    <table class="dados">
                        <tr>
                            <th>Nome</th>
                            <th>Relação</th>
                            <th>Contato</th>
                        </tr>
                        <tr>
                            <td>Tuani</td>
                            <td>Funcionária</td>
                            <td>tuani@email.com</td>
                        </tr>
                     
                    </table>
                </div>
                <div class="col-2" id="colfoto">
                    <img class='foto' src="assets/img/tuani.jpg" alt="Foto">
                </div>
                <div class="col-4" id="formcontato">
                    <h2>Entre em contato...</h2>
                    <form action="pages/proposta/acao.php" method="POST">
                        <input type="hidden" name="loc" value="home">
                        <div class="row">
                            <div class="col-4">
                                <label for="nome">Nome:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id='nome' name='nome'>
                            </div>
                        </div>
                        <div class="row erro" id="erronome"><div class="col-12">O nome deve possuir pelo menos três letras</div></div>
                        <div class="row">
                            <div class="col-4">
                                <label for="email">E-Mail</label>
                            </div>
                            <div class="col-8">
                                <input type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="row erro" id="erroemail"><div class="col-12">E-mail informado incorreto</div></div>
                        <div class="row">
                            <div class="col-4">
                                <label for="salario">Proposta de Salário:</label>
                            </div>
                            <div class="col-8">
                                <input type="number" name="salario">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="obs">Observações:</label>
                            </div>
                            <div class="col-8">
                                <textarea name="observacoes" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" name='acao' id='acao' value='salvar'>Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    
        <footer>
            <div class="row">
                <div class="col-12">
                    <p>Feito por webdesign Tutu14@email</p>
                </div>
            </div>
        </footer>
    </body>
</html>