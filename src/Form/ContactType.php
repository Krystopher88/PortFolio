<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, [
                'attr' => [
                    'minlength' => '2',
                    'maxlength' => '32',
                ],
                'label' => 'Prénom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre prénom',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 32,
                        'minMessage' => 'Veuillez saisir votre prénom',
                        'maxMessage' => 'Veuillez saisir votre prénom',
                    ]),
                ]
            ])
            ->add('last_name', TextType::class, [
                'attr' => [
                    'minlength' => '2',
                    'maxlength' => '32',
                ],
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre nom',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 32,
                        'minMessage' => 'Veuillez saisir votre nom',
                        'maxMessage' => 'Veuillez saisir votre nom',
                    ]),
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'minlength' => '2',
                    'maxlength' => '255',
                ],
                'label' => 'Email',
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Veuillez saisir un email valide',
                        'maxMessage' => 'Veuillez saisir un email valide',
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir votre email',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                        'message' => 'Veuillez saisir un email valide',
                    ]),
                ]
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'minlength' => '2',
                    'maxlength' => '100',
                ],
                'label' => 'Sujet',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un sujet',
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 100,
                        'minMessage' => 'Veuillez saisir un sujet',
                        'maxMessage' => 'Veuillez saisir un sujet',
                    ]),
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre message',
                    ]),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
            ])
            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(),
                'action_name' => 'contact',
                'locale' => 'fr',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
