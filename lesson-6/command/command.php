<?php

interface TextEdit
{
    public function handle() : void;
}

class Save implements TextEdit
{
    private $savetext;

    public function __construct(string $savetext)
    {
        $this->savetext = $savetext;
    }

    public function handle(): void
    {
        echo "Your text saved";
    }
}


class Past implements TextEdit
{
    private $savetext;

    public function __construct(string $savetext)
    {
        $this->savetext = $savetext;
    }

    public function handle(): void
    {
        echo "Your text: ".$this->savetext;
    }
}

class Invoker
{
    private $onStart;

    private $onFinish;

    public function setOnStart(TextEdit $command) : void
    {

        $this->onStart = $command;
    }

    public function setOnFinish(TextEdit $command) : void
    {

        $this->onFinish = $command;
    }

    public function CopyPast() : void
    {

        echo "Invoker: I save your text\n";
        if ($this->onStart instanceof TextEdit) {
            $this->onStart->handle();
        }

        echo "Invoker: ...doing something really important...\n";

        echo "Invoker: write your text\n";
        if ($this->onFinish instanceof TextEdit) {
            $this->onFinish->handle();
        }
    }
}


$invoker = new Invoker;
$invoker->setOnStart(new Save("hello world"));
$invoker->setOnFinish(new Past("hello world"));
$invoker->CopyPast();