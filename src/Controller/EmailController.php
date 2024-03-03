<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailController extends AbstractController
{
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('bloodifyesprit@gmail.com')
            ->to('walaazhani808@gmail.com')
            ->subject('Test Email')
            ->text('Th from Symfony.');

        $mailer->send($email);

        return new Response('Email sent successfully!');
    }
}
