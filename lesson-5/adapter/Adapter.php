<?php
class Adapter implements ISquare,ICircle{

    private $squareLib;
    private $circleLib;

    public function __construct(SquareAreaLib $squareLib, CircleAreaLib $circleLib)
    {
        $this->squareLib = $squareLib;
        $this->circleLib = $circleLib;
    }

    public function squareArea(int $sideSquare)
    {
        $diagonal = 2*($sideSquare**2);
        return $this->squareLib->getSquareArea($diagonal);
    }

    public function circleArea(int $circumference)
    {
        $diagonal = $circumference/pi();
        return $this->circleLib->getCircleArea($diagonal);
    }
}

function ClientCode(ISquare $iSquare, ICircle $iCircle, $sideSquare, $circumference){
    print $iSquare->squareArea($sideSquare)."\n";
    print $iCircle->circleArea($circumference);
}

$iSquareArea = new ISquare;
$iCircleArea = new ICircle;
ClientCode($iSquareArea,$iCircleAream,5,5);

$squareArea = new SquareAreaLib;
$squareArea->getSquareArea(5);
$circleArea = new CircleAreaLib;
$circleArea->getCircleArea(5);

$adapter = new Adapter($squareArea,$circleArea);
ClientCode($adapter,5,5);

