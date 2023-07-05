
<!DOCTYPE html>
<html>
<head>
<?php
require_once('../classes/triangulo.class.php');
require_once('../classes/quadro.class.php');

$triangulo = new Triangulo('',1,1,1,'x','x',0);

$id = isset($_GET['id'])?$_GET['id']:0;
if ($id > 0){
    $dados = $triangulo->listar(1,$id);
    $qeditando = new Triangulo($dados[0]['idrtriangulo'],$dados[0]['lado1'],$dados[0]['lado2'],$dados[0]['lado3'],$dados[0]['cor'],$dados[0]['un'],$dados[0]['idquadro']);
}
?>
   <center> <title>Cadastrar Triângulo</title>
</head>
<body>
<img src="../img/logo.png"></img> 
<a href="../Quadro/index.php">Voltar</a>
    <h1>Cadastrar Triângulos</h1>

    <form method="post" action="acaotriangulo.php">
        <label for="lado1">Lado 1:</label>
        <input type="number" name="lado1" id="lado1" required>

        <label for="lado2">Lado 2:</label>
        <input type="number" name="lado2" id="lado2" required>

        <label for="lado3">Lado 3:</label>
        <input type="number" name="lado3" id="lado3" required>

        <label for="cor">Cor:</label>
        <input type="color" name="cor" id="cor" required>

        <label for="un">UN:</label>
            <select name='un' id='un'>
                <option value=''>Selecione</option>
                <option value='cm' <?php  if(isset($qeditando)) if ($qeditando->getUn() == 'cm') echo 'selected'; ?> >Centímetros</option>
                <option value='px' <?php  if(isset($qeditando)) if ($qeditando->getUn() == 'px') echo 'selected'; ?>  >Pixel</option>
                <option value='%' <?php  if(isset($qeditando)) if ($qeditando->getUn() == '%') echo 'selected'; ?> >Porcentagem</option>
                <option value='vh' <?php  if(isset($qeditando)) if ($qeditando->getUn() == 'vh') echo 'selected'; ?> >View Port Height</option>
                <option value='vw' <?php  if(isset($qeditando)) if ($qeditando->getUn() == 'vw') echo 'selected'; ?> >View Port Width</option>
            </select>

        <label for="quadro">Quadro:</label>
            
            <select name="quadro" id="quadro">
                <?php
                    $quadro = new Quadro('', '');
                    $q = $quadro->listar();
                    foreach ($q as $qd) {
                        echo "<option value='{$qd["idquadro"]}'>{$qd["nome"]}</option> ";
                    }
                ?>
            </select>

            <button type="submit" value='salvar' name='acao' id='acao'>Salvar</button>
    </form>
    <div style='height:70vw'>
    <?php
        
        $lista = $triangulo->listar();
        foreach($lista as $item){
            $q = new Triangulo($item['idtriangulo'],$item['lado1'],$item['lado2'],$item['lado3'],$item['cor'],$item['un'],$item['idquadro']);
            echo '<a draggable="true" href="index.php?id='.$q->getId().'">';
            echo $q->desenhar();
            echo '</a>';
        }
    ?>

    </div>
    <?php
    /* // Incluir o arquivo de conexão com o banco de dados
    require_once 'conexao.php';

    // Incluir a classe Triangulo
    require_once 'triangulo.class.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os valores enviados pelo formulário
        $lado1 = $_POST["lado1"];
        $lado2 = $_POST["lado2"];
        $lado3 = $_POST["lado3"];
        $cor = $_POST["cor"];

        // Cria um objeto Triangulo com os lados fornecidos
        $triangulo = new Triangulo($lado1, $lado2, $lado3);

        // Verifica o tipo de triângulo
        if ($triangulo->getLado1() == $triangulo->getLado2() && $triangulo->getLado2() == $triangulo->getLado3()) {
            $tipo = "Equilátero";
        } elseif ($triangulo->getLado1() == $triangulo->getLado2() || $triangulo->getLado1() == $triangulo->getLado3() || $triangulo->getLado2() == $triangulo->getLado3()) {
            $tipo = "Isósceles";
        } else {
            $tipo = "Escaleno";
        }

        // Insere os dados do triângulo no banco de dados
        $sql = "INSERT INTO triangulos (lado1, lado2, lado3, tipo, cor) VALUES ($lado1, $lado2, $lado3, '$tipo', '$cor')";
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Erro ao salvar o triângulo : " . $conn->error;
        }

        // Desenha o triângulo na tela usando as informações fornecidas pelo usuário
        echo "<div style='width: 0; height: 0; border-left: {$lado1}px solid transparent; border-right: {$lado2}px solid transparent; border-bottom: {$lado3}px solid {$cor};'></div>";

        echo "<p>Tipo de triângulo: $tipo</p>";
    }

    $conn->close(); */
    ?>
</body>
</center> 
</html>