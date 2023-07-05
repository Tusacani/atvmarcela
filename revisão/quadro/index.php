<?php
require_once('../classes/quadro.class.php');
$quadro = new Quadro('',1,'x','x');

$id = isset($_GET['id'])?$_GET['id']:0;
if ($id > 0){
    $dados = $quadro->listar(1,$id);
    $qeditando = new Quadro($dados[0]['idquadro'],$dados[0]['nome']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <center> 
    <img src="../img/logo.png"></img> 
    <title>Cadastro de Quadros</title>
    <style>
        .desenho{
            border:1px solid black;
            display: inline-block;
        }
    </style>
     <title>Menu de Navegação</title>
  <style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #F8BBD0;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover {
      background-color: #111;
    }
  </style>
  <ul>
    <li><a href="../circulo/index.php">Circulo</a></li>
    <li><a href="../retangulo/index.php">Retangulo</a></li>
    <li><a href="../quadrado/index.php">Quadrado</a></li>
    <li><a href="../triangulo/index.php">Triangulo</a></li>
  </ul>
</head> 
<body>
    <h1>Cadastro de Quadros</h1>
    <section>
        <form action="acaoquadro.php" method='post'>
            <label for="id">Id:</label>
            <input readonly type="text" name='id' id='id' value='<?php echo isset($qeditando)?$qeditando->getId():0 ?>'>
            <label for="nome">Nome:</label>
            <input type="text" name='nome' id='nome' value='<?php if(isset($qeditando)) echo $qeditando->getNome(); ?>'>
            <button type="submit" value='salvar' name='acao' id='acao'>Salvar</button>
            <?php  if(isset($qeditando)){ ?>
                <button type="submit" value='excluir' name='acao' id='acao'>Excluir</button>
            <?php } ?>
        </form>
    </section>
    <hr>
    <div style='height:70vw'>
    <?php
        if (isset($qeditando)) {
            $qeditando->listarFormas();
        }else{
        $lista = $quadro->listar();
            foreach($lista as $item){
                $q = new Quadro($item['idquadro'],$item['nome']);
                echo '<a draggable="true" href="index.php?id='.$q->getId().'">';
                echo $q->getNome();
                echo '</a><br>';
            }
        }
    ?>

    </div>
    
</body>
</html>