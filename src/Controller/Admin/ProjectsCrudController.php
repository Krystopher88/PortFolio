<?php

namespace App\Controller\Admin;

use App\Entity\Projects;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjectsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projects::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title', 'Titre');
        yield TextareaField::new('description', 'Description');
        yield AssociationField::new('langages', 'Langages');
        yield TextField::new('github_link', 'Lien Github');
        yield TextField::new('website_link', 'Lien du site');
        yield DateField::new('created_at', 'Date de création');
        yield TextField::new('screen_file', 'Images de présentation')
            ->setFormType(VichImageType::class)
            ->onlyOnForms();
        yield ImageField::new('screen_name', 'Aperçu')
            ->setBasePath('uploads/projects')
            ->onlyOnIndex();
            
    }
    
}
