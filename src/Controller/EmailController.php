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
<<<<<<< HEAD
<<<<<<< HEAD
            ->from('bloodifyesprit@gmail.com')
=======
            ->from('walaazhani6@gmail.com')
>>>>>>> 6f2e479 (walaa+bundles)
=======
            ->from('bloodifyesprit@gmail.com')
>>>>>>> 7caf93a (walaa+bundles+final)
            ->to('walaazhani808@gmail.com')
            ->subject('Test Email')
            ->text('Th from Symfony.');

        $mailer->send($email);

        return new Response('Email sent successfully!');
    }
}
