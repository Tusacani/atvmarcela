<?php
    require_once "../../conf/Conexao.php";

    $acao = "";
    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    switch($acao){
        case 'excluir': excluir(); break;
        case 'salvar': {
            if ($dados == 0)
                salvar(); 
            else
                editar();
            break;
        }
    }

    function excluir(){  
        echo "FUNCTION EXCLUIR";  


        $idContato = isset($_GET['idContato']) ? $_GET['idContato']: 0;
        $idHobbie = isset($_GET['idHobbie']) ? $_GET['idHobbie']: 0;

        $dados = formToArray();
        $conexao = Conexao::getInstance();
        $sql = "DELETE FROM contato_hobbie WHERE idContato = '$idContato' AND idHobbie = '$idHobbie';";

        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function editar(){
        echo "FUNCTION EDITAR";
        $dados = formToArray();

        $conexao = Conexao::getInstance();
        $sql = "UPDATE `contato_hobbie` SET `idContato` = '".$dados['idContato']."', `idHobbie` = '".$dados['idHobbie']."' WHERE (`idContato` = '".$idContato.") and (`idHobbie` = '".$idHobbie."');";

        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function salvar(){
            echo "FUNCTION SALVAR";
        $dados = formToArray();
        var_dump($dados);
        $conexao = Conexao::getInstance();
        $sql = "INSERT INTO contato_hobbie (idContato, idHobbie) VALUES ('".$dados['idContato']."','".$dados['idHobbie']."')";
        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function formToArray(){
        $idContato = isset($_POST['idContato']) ? $_POST['idContato']: 0;
        $idHobbie = isset($_POST['idHobbie']) ? $_POST['idHobbie']: 0;
        $dados = array(
            'idContato' => $idContato,
            'idHobbie' => $idHobbie
        );

        return $dados;

    }
    function findById($idContato,$idHobbie){
        $conexao = Conexao::getInstance();
        $conexao = $conexao->query("SELECT*FROM contato_hobbie WHERE idContato = $idContato AND idHobbie = $idHobbie;");
        $result = $conexao->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }
?>