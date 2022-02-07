<?php

include('handHunter.php');

class ConcreteObserver implements \SplObserver
{
    public $name;
    public $email;
    public $jobTime;


    public function __construct($name,$email,$jobTime)
    {
        $this->name=$name;
        $this->email=$email;
        $this->jobTime=$jobTime;

    }
    public function GetName()
    {
        return $this->name;
    }

    public function GetEmail()
    {
        return $this->email;
    }

    public function GetjobTime()
    {
        return $this->jobTime;
    }

    public function update(SplSubject $subject): void
    {
        if ($subject->state < 3) {
            echo "Observer: Reacted to the new job.\n";
        }
    }

}

$handHunter = new HandHunter;

$client1 = new ConcreteObserver("manuel","111@gmail.com","11 years");
$handHunter->attach($client1);
$handHunter->NewJob();
$handHunter->detach($client1);