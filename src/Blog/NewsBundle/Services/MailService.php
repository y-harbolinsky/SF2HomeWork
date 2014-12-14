<?php

namespace Blog\NewsBundle\Services;

class MailService
{
    protected $mailer;

    public function setMailer(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail()
    {
        $message = \Swift_Message::newInstance()
                    ->setSubject('Hello world')
                    ->setFrom('email@amail.com')
                    ->setTo('garbolinskui@ukr.net')
                    ->setBody('Hello knmdknvf fvj odfv jodv sfj vsd vds');

        $this->mailer->send($message);

    }
}
