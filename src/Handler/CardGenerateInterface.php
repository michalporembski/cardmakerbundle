<?php

namespace MPorembski\CardMaker\Handler;

use MPorembski\CardMaker\Entity\Dto\GenerateCardCommand;

/**
 * Interface CardGenerateInterface
 *
 * @package CardMaker\Handler
 */
interface CardGenerateInterface
{
    public function handle(GenerateCardCommand $generateCardCommand);
}
