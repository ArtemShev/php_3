<!-- я нашел этот код на хабре и немного его подредактировал, сам решить с нуля задачу не смог -->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Алгоритм</title>
    </head>

    <body>
        <?php

        class Main {

            var $arrayOfNode = Array();

            public function calc($x, $y, $z)
            {
// не смог сделать алгоритм для всех констант сразу
                if($x)
                {
                    foreach ($this->arrayOfNode as $obj){
                        if($obj->const == "x"){
                            $obj->var = $x;
                            break;
                        }
                    }
                }

                if($y)
                {
                    foreach ($this->arrayOfNode as $obj){
                        if($obj->const == "y"){
                            $obj->var = $y;
                            break;
                        }
                    }
                }

                if($z)
                {
                    foreach ($this->arrayOfNode as $obj){
                        if($obj->const == "z"){
                            $obj->var = $z;
                            break;
                        }
                    }
                }

                foreach ($this->arrayOfNode as $obj)
                {
                    if(!$obj->parent){
                        return $obj->calc();
                    }
                }
            }

            public function buildTree ($str)
            {

                $arrayOfNode = Array();

                function parse($str)
                {

                    $str = mb_strtolower($str, 'UTF-8');
                    $str = str_replace(" ", "", $str);
                    $n = mb_strlen($str, 'UTF-8');
                    $arStr = preg_split('/(?!^)(?=.)/u', $str);

                    echo '<pre>';
                    echo print_r($arStr);
                    echo '</pre>';

                    $j=0;
                    $accum = $arStr[0];
                    for($i=1; $i<$n+1; ++$i){

                        if ($i==$n+1){
                            $arLec[$j] = $accum;
                            break;
                        }

                        if($accum=="-" && $i==1){
                            if(preg_match("/\d/", $arStr[$i])){
                                $accum = $accum.$arStr[$i];
                            }
                            if($arStr[$i]=="("){
                                $arLec[$j] = "0";
                                $arLec[++$j] = "-";
                                ++$j;
                                $accum = $arStr[$i];
                            }
                            continue;
                        }

                        if($accum=="-" && $arLec[$j-1]=="("){
                            $accum = $accum.$arStr[$i];
                            continue;
                        }

                        if (preg_match("/^[\d.]/", $accum) && preg_match("/^[\d.]/", $arStr[$i])){
                            $accum = $accum.$arStr[$i];
                        }else{
                            $arLec[$j] = $accum;
                            ++$j;
                            $accum = $arStr[$i];
                        }
                    }
                    echo '<pre>';
                    echo print_r($arLec);
                    echo '</pre>';

                    return $arLec;
                }

                function buildOneObj($point){

                    static $arNumNode = Array(
                        "addition" => 1,
                        "subtraction" => 1,
                        "exponentiation" =>1,
                        "multiplication" => 1,
                        "division" => 1,
                        "number" => 1,
                        "constant" => 1);

                    switch ($point){

                        case "+": $pointName = "Plus".$arNumNode["addition"];
                            $node = new Plus($pointName);
                            ++$arNumNode["addition"];
                            break;

                        case "-": $pointName = "Minus".$arNumNode["subtraction"];
                            $node = new Minus($pointName);
                            ++$arNumNode["subtraction"];
                            break;

                        case "*": $pointName = "Multiply".$arNumNode["multiplication"];
                            $node = new Multiply($pointName);
                            ++$arNumNode["multiplication"];
                            break;

                        case "/": $pointName = "Fission".$arNumNode["division"];
                            $node = new Fission($pointName);
                            ++$arNumNode["division"];
                            break;

                        case "^": $pointName = "Exponent".$arNumNode["exponentiation"];
                            $node = new Exponent($pointName);
                            ++$arNumNode["exponentiation"];
                            break;

                        case "x": $pointName = "Constant".$arNumNode["constant"];
                            $node = new Constant($pointName);
                            $node->const = "x";
                            $node->var = 0;
                            ++$arNumNode["constant"];
                            break;

                        case "y": $pointName = "Constant".$arNumNode["constant"];
                            $node = new Constant($pointName);
                            $node->const = "y";
                            $node->var = 0;
                            ++$arNumNode["constant"];
                            break;

                        case "z": $pointName = "Constant".$arNumNode["constant"];
                            $node = new Constant($pointName);
                            $node->const = "z";
                            $node->var = 0;
                            ++$arNumNode["constant"];
                            break;

                        default: $pointName = "Variable".$arNumNode["number"];
                            $node = new Variable($pointName);
                            $node->var = $point;
                            ++$arNumNode["number"];
                    }
                    return $node;
                }

                function buildTriple($topLec, $leftLec, $rightLec, $topPeak, $leftPeak, $rightPeak, $topObj){

                    if(!$topObj){
                        $topTriple = buildOneObj($topPeak);
                        $topTriple->lec = $topLec;
                    }  else {
                        $topTriple = $topObj;
                    }

                    $leftTriple = buildOneObj($leftPeak);
                    $leftTriple->lec = $leftLec;

                    $rightTriple = buildOneObj($rightPeak);
                    $rightTriple->lec = $rightLec;

                    $topTriple->childrenLeft = $leftTriple;
                    $topTriple->childrenRight = $rightTriple;
                    $leftTriple->parent = $topTriple;
                    $rightTriple->parent = $topTriple;
                    if(!$topObj){
                        $triple = Array($topTriple, $leftTriple, $rightTriple);
                        return $triple;
                    }  else {
                        $pair = Array($leftTriple, $rightTriple);
                        return $pair;
                    }
                }

                function  treeFullOrNot($arrayOfNode){
                    foreach ($arrayOfNode as $obj){
                        if($obj->lec[1] && !$obj->childrenLeft && !$obj->childrenRight){
                            return FALSE;
                        }
                    }
                    return TRUE;
                }

                function searchNextPeak($arrayOfNode){
                    foreach ($arrayOfNode as $obj){
                        if($obj->lec[1] && !$obj->childrenLeft && !$obj->childrenRight){
                            return $obj;
                        }
                    }
                }

                function findInflectionPoint($lec){
                    $inflection=0;
                    $max=0;
                    static $br = 0;
                    static $arPriotity = Array(
                        "+" => 3,
                        "-" => 3,
                        "*" => 2,
                        "/" => 2,
                        "^" => 1);

                    foreach ($lec as $key=>$value){
                        if(preg_match("/^[\d.]/", $value)){
                            continue;
                        }
                        if($value=="("){
                            ++$br;
                            continue;
                        }
                        if($value==")"){
                            --$br;
                            continue;
                        }
                        if($arPriotity[$value]-3*$br >= $max){
                            $max=$arPriotity[$value]-3*$br;
                            $inflection=$key;
                        }
                    }
                    return $inflection;
                }

                $arLec = parse($str);

                $topNode = findInflectionPoint($arLec);
                $topPeak = $arLec[$topNode];
                $leftLec = array_slice($arLec, 0, $topNode);
                if($leftLec[0]=="(" && $leftLec[count($leftLec)-1]==")"){
                    array_shift($leftLec);
                    array_pop($leftLec);
                }
                $rightLec = array_slice($arLec, $topNode+1);
                if($rightLec[0]=="(" && $rightLec[count($rightLec)-1]==")"){
                    array_shift($rightLec);
                    array_pop($rightLec);
                }
                $leftNode = findInflectionPoint($leftLec);
                $leftPeak = $leftLec[$leftNode];
                $rightNode = findInflectionPoint($rightLec);
                $rightPeak = $rightLec[$rightNode];
                $triple = buildTriple($arLec, $leftLec, $rightLec, $topPeak, $leftPeak, $rightPeak, NULL);
                $arrayOfNode = $triple;

                while (! treeFullOrNot($arrayOfNode)){
                        $topTriple = searchNextPeak($arrayOfNode);
                        $arLec = $topTriple->lec;
                        $topNode = findInflectionPoint($arLec);
                        $leftLec = array_slice($arLec, 0, $topNode);
                        if($leftLec[0]=="(" && $leftLec[count($leftLec)-1]==")"){
                            array_shift($leftLec);
                            array_pop($leftLec);
                        }
                        $rightLec = array_slice($arLec, $topNode+1);
                        if($rightLec[0]=="(" && $rightLec[count($rightLec)-1]==")"){
                            array_shift($rightLec);
                            array_pop($rightLec);
                        }
                        $leftNode = findInflectionPoint($leftLec);
                        $leftPeak = $leftLec[$leftNode];
                        $rightNode = findInflectionPoint($rightLec);
                        $rightPeak = $rightLec[$rightNode];
                        $pair = buildTriple(NULL, $leftLec, $rightLec, NULL, $leftPeak, $rightPeak, $topTriple);
                        $arrayOfNode = array_merge($arrayOfNode, $pair);
                }
                $this->arrayOfNode = $arrayOfNode;
            }
        }

        abstract class Term {

            public $pointName;
            public $childrenLeft;
            public $childrenRight;
            public $parent;
            public $lec;
            public $const;
            public $var;

            public function __construct($pointName) {
                $this->name = $pointName;
            }

            abstract function calc();
        }
        class Plus extends Term {
            public function calc() {
                return $this->childrenLeft->calc()+$this->childrenRight->calc();
            }
        }

        class Minus extends Term {
            public function calc() {
                return $this->childrenLeft->calc()-$this->childrenRight->calc();
            }
        }

        class Multiply extends Term {
            public function calc() {
                return $this->childrenLeft->calc()*$this->childrenRight->calc();
            }
        }

        class Fission extends Term {
            public function calc() {
                return $this->childrenLeft->calc()/$this->childrenRight->calc();
            }
        }

        class Exponent extends Term {
            public function calc() {
                return pow ($this->childrenLeft->calc(), $this->childrenRight->calc());
            }
        }

        class Constant extends Term {
            public function calc() {
                return $this->var;
            }
        }

        class Variable extends Term {
            public function calc() {
                return $this->var;
            }
        }

        $str = "50x*25y*(25-5z)^2";
        $x = 1;
        $y = 2;
        $z = 3;

        $parse = new Main();

        $parse->buildTree($str);

        echo $str." = ".$parse->calc($x, $y, $z);

        echo " при: x=".$x."; y=".$y."; z=".$z;

        ?>
    </body>

</html>
