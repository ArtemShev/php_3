<?php

class Context
{
    private $strategy;

    public function __construct(Strategy $strategy)
    {

        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {

        $this->strategy = $strategy;
    }


    public function doPayment() : void
    {

        // ...

        echo "How would you like to pay?\n";
        $result = $this->strategy->payment([
            "Qiwi",
            "Yandex.Money",
            "WebMoney"
        ]);
        echo ($result) . "\n";

        // ...
    }
}

interface Strategy
{
    public function payment(array $data);
}


class Qiwi implements Strategy
{
    public function payment(array $data)
    {
        foreach($data as $name){
            if($name == "Qiwi"){
                return "Qiwi payment done";
            }
        }
    }
}

class YandexMoney implements Strategy
{
    public function payment(array $data)
    {
        foreach($data as $name){
            if($name == "Yandex.Money"){
                return "Yandex.Money payment done";
            }
        }
    }
}

class WebMoney implements Strategy
{
    public function payment(array $data)
    {
        foreach($data as $name){
            if($name == "WebMoney"){
                return "WebMoney payment done";
            }
        }
    }
}

$context = new Context(new Qiwi);
$context->doPayment();
$context->setStrategy(new WebMoney);
$context->doPayment();
$context->setStrategy(new YandexMoney);
$context->doPayment();