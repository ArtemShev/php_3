<?php
class Notifier
{
    protected $notifier;

    public function __construct(Notifier $nextNotifier = null)
    {
        $this->notifier = $nextNotifier;
    }

    public function sendNotification($message)
    {
        if($this->notifier){
            $this->notifier->sendNotification($message);
        }
    }
}

$notifier = new Notifier();
$notifier = new SmsNotifier($notifier);
$notifier = new EmailNotifier($notifier);
$notifier = new ChromeNotifier($notifier);
$notifier->sendNotification('hello world');