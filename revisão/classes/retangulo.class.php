<?php
require_once('../classes/forma.class.php');
require_once ('../classes/database.class.php');

class Retangulo extends Forma{
    private $lado2;
    private $quadro;

    public function __construct($id, $lado1, $lado2, $cor, $un, $qd){
        parent::__construct($id, $lado1, $cor, $un);
        $this->setLado2($lado2);
        $this->setQuadro($qd);
    }

    public function setQuadro($qd){
        $this->quadro = $qd;
    }

    public function getQuadro(){
        return $this->quadro;
    }

    public function setLado2($lado2){
        if ($lado2 > 0){
            $this->lado2 = $lado2;
        }else
            throw new Exception('Valor para o lado 2 inválido.');
    }

    public function setLado1($lado1){
        if ($lado1 > 0){
            parent::setLado($lado1);
        }else
            throw new Exception('Valor para o lado 1 inválido.');
    }

    public function getLado1(){
        return parent::getLado();
    }

    public function getLado2(){
        return $this->lado2;
    }
    public function inserir(){
        $sql = 'INSERT INTO retangulo (altura, base, cor, un, idquadro)
                     VALUES (:altura, :base, :cor, :un, :idquadro)';
        $params = array(':altura'=>$this->getLado1(),
                        ':base'=>$this->getLado2(),
                        ':cor'=>$this->getCor(),
                        ':idquadro'=>$this->getQuadro(),
                        ':un'=>$this->getUn());
        Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM retangulo 
                 WHERE idretangulo = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }
    public function editar(){
        $sql = 'UPDATE retangulo
                   SET altura = :altura,
                       base = :base,
                       cor  = :cor,
                       un   = :un,
                       idquadro = :idquadro
                 WHERE   idretangulo = :id';
        $params = array(':id'=>$this->getId(),
                        ':altura'=> $this->getLado1(),
                        ':base'=>$this->getLado2(),
                        ':cor'=> $this->getCor(),
                        ':idquadro'=>$this->getQuadro(),
                        ':un'=> $this->getUn());
       return Database::executar($sql, $params);
       
    }
    public function desenhar(){
        $desenho = "<div draggable='true' class='desenho' 
                    style='width:{$this->getLado2()}{$this->getUn()};
                     height:{$this->getLado1()}{$this->getUn()};
                     background-color:{$this->getCor()}'></div>";
        return $desenho;
     }
    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM retangulo';
        switch($tipo){
            case 1: $sql .= ' WHERE idretangulo = :info'; break;
            case 2: $sql .= ' WHERE cor like :info';  break;
            case 3: $sql .= ' WHERE idquadro = :info'; break;
        }           
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
     }
    public function calcularArea(){}
    public function calcularPerimetro(){}
}

/* 
Triângulo Retângulo - possui um ângulo reto
considerar como hipotenusa o maior lado
h² = c1² + c2²  -> validar se é um triângulo Retângulo
a = (b*a)/2 (a = altura, b = base)
A altura é a hipotenusa
A base será o menor lado, ou seja, o cateto adjacente
=============================================================
Triângulo Equilátero
Possui todos os lados e ângulos internos com a mesma medida
Validar o tipo comparando medidas

a = (l² * raiz(3))/4
a = altura, l = lado
=============================================================
Triângulo Isósceles
Possui dois lados e dois ângulos iguais
Calular a base com o teorema de Pitágoras
h = l² - b² (h = altura, l = usar o maior lado, b = base, usar o menor lado)

area = (b * h)/2
=============================================================
Triângulo Escaleno
Tem todos os lados e ângulos diferentes
Como não temos a informação do ângulo, podemos usar a 
fórmula de Heron (que também calcula a área de qualquer triângulo...)
Calcular o perímetro do triângulo (fazer uma função para isso)
p = perímetro / 2
area = raiz(p*(p - l1)*(p-l2)*(p-l3)) 
l1, l2, l3 = são os lados do triângulo


*/

?>