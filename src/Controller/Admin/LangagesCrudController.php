<?php

namespace App\Controller\Admin;

use App\Entity\Langages;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LangagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Langages::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('langage', 'Language');
        yield ImageField::new('file_name', 'Logo')
            ->setBasePath('/uploads/pictures/')
            ->setUploadDir('/public/uploads/langages/');
    }
    
}
