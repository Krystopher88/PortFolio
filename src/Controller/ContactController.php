<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\DeveloperRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(
    Request $request,
    EntityManagerInterface $entityManagerInterface,
    MailerInterface $mailerInterface,
    DeveloperRepository $developerRepository): Response
    {
        $developer = $developerRepository->find(1);
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();

            $entityManagerInterface->persist($contact);
            $entityManagerInterface->flush();

            $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('hello@krystdev.fr')
                ->subject($contact->getSubject())
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'contact' => $contact,
                ]);

            $confirmationEmail = (new TemplatedEmail())
            ->from('hello@krystdev.fr')
            ->to($contact->getEmail())
            ->subject('KrystDev - Confirmation de réception de votre message')
            ->htmlTemplate('emails/confirmationContact.html.twig')
            ->context([
                'contact' => $contact,
            ]);

            $mailerInterface->send($email);
            $mailerInterface->send($confirmationEmail);

            $this->addFlash('dark', 'Votre message a bien été envoyé, je vous repondrai sous 48h.');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('pages/contact.html.twig', [
            'form' => $form->createView(),
            'developer' => $developer,
        ]);
    }
}
