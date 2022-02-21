<?php

// class HandHunter implements \SplSubject
// {
//     public $state;

//     private $observers;

//     public function __construct()
//     {

//         $this->observers = new \SplObjectStorage();
//     }

//     public function attach(\SplObserver $observer) : void
//     {

//         echo "HandHunter: atached an observer\n";
//         $this->observers->attach($observer);
//     }

//     public function detach(\SplObserver $observer) : void
//     {

//         $this->observers->detach($observer);
//         echo "Subject: Detached an observer.\n";
//     }

//     public function notify() : void
//     {

//         echo "Subject: Notifying observers...\n";
//         foreach ($this->observers as $observer) {
//             $observer->update($this);
//         }
//     }

//     public function NewJob() : void
//     {

//         echo "\nHandHanter: added new job\n";
//         $this->state += 1 ;

//         echo "I have new job for you\n";
//         $this->notify();
//     }

// }

// class ConcreteObserver implements \SplObserver
// {
//     public $name;
//     public $email;
//     public $jobTime;


//     public function __construct($name,$email,$jobTime)
//     {
//         $this->name=$name;
//         $this->email=$email;
//         $this->jobTime=$jobTime;

//     }
//     public function GetName()
//     {
//         return $this->name;
//     }

//     public function GetEmail()
//     {
//         return $this->email;
//     }

//     public function GetjobTime()
//     {
//         return $this->jobTime;
//     }

//     public function update(SplSubject $subject): void
//     {
//         if ($subject->state < 3) {
//             echo "Observer: Reacted to the new job.\n";
//         }
//     }

// }

// $handHunter = new HandHunter;r

// $client1 = new ConcreteObserver("manuel","111@gmail.com","11 years");
// $handHunter->attach($client1);
// $handHunter->NewJob();
// $handHunter->detach($client1);