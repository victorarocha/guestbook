<?php

namespace App\EntityListener;

use App\Entity\Conference;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

class ConferenceEntityListener
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Conference $conference, LifecycleEventArgs $eventArgs)
    {
        $conference->computeSlug($this->slugger);
    }

    public function preUpdate(Conference $conference) //aquí le quité el LifecycleEventArgs y aparentemente sigue trabajando OK
    {
        $conference->computeSlug($this->slugger);
    }
}