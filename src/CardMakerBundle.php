<?php

namespace MPorembski\CardMaker;

use MPorembski\CardMaker\DependencyInjection\CardMakerExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class CardMakerBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return __DIR__;
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new CardMakerExtension();
    }
}
