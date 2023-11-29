<?php

namespace App\Controller\Admin;


use App\Entity\Developer;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DeveloperCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Developer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('username', 'Identifiant');
        yield TextField::new(propertyName: 'plainPassword')->hideOnIndex();
        yield ChoiceField::new('roles', 'Rôles')
            ->setChoices([
                'Administrateur' => 'ROLE_ADMIN',
                'User' => 'ROLE_USER',
            ])
            ->allowMultipleChoices();
        yield TextField::new('last_name', 'Nom');
        yield TextField::new('first_name', 'Prénom');
        yield TextareaField::new('biography', 'Biographie');
        yield TextField::new('email', 'Email');
        yield TextField::new('github_link', 'Github');
        yield TextField::new('linkedin_link', 'Linkedin');
        yield TextField::new('youtube_link', 'Youtube');
        yield ImageField::new('picture_name', 'Photo')
            ->setBasePath('/uploads/pictures/')
            ->setUploadDir('/public/uploads/developerProfil/');
        yield AssociationField::new('Skill', 'Compétences')
            ->setFormTypeOptions([
                'by_reference' => false,
            ]);
        ;
        
    }
}
