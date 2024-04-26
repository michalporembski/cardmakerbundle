<?php

namespace MPorembski\CardMaker;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use MPorembski\CardMaker\DependencyInjection\CardMakerExtension;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

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
