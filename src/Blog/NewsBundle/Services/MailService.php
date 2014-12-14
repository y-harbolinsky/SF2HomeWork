<?php

namespace Blog\NewsBundle\Services;

class MailService
{
    private $mailer;
    private $message;

    public function __construct(\Swift_Mailer $mailer, \Swift_Message $message)
    {
        $this->mailer = $mailer;
        $this->message = $message;
    }

    public function hello($name)
    {
        $this->mailer->send($this->message);

        return 'Hello, ' . $name;
    }
}
