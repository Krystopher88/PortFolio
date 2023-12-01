<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Vich\UploaderBundle\Event\Event;
use Vich\UploaderBundle\Event\Events;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;

class VichUploaderSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Events::POST_UPLOAD => 'postUpload',
        ];
    }

    public function postUpload(\Vich\UploaderBundle\Event\Event $event)
    {
        $object = $event->getObject();
        $mapping = $event->getMapping();

        if ($mapping->getMappingName() === 'screenProject') {
            $imagine = new Imagine();
            $image = $imagine->open($mapping->getUploadDestination() . '/' . $mapping->getFileName($object, $mapping->getFilePropertyName()));

            $resizedImage = $image->resize(new Box(310, 175));

            $thumbnailPath = $mapping->getUploadDestination() . '/thumbnails/';
            $thumbnailFullPath = $thumbnailPath . $mapping->getFileName($object);

            // Assure-toi que le répertoire de destination existe
            if (!is_dir($thumbnailPath)) {
                mkdir($thumbnailPath, 0777, true);
            }

            // Sauvegarde l'image redimensionnée
            $resizedImage->save($thumbnailFullPath);
        }
    }
}
