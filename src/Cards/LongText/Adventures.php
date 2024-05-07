<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Adventures
 *
 * @package CardMaker\Cards\LongText
 */
class Adventures extends AbstractCard
{
    protected $layerFile = 'adventures_a';

    protected int $imageAreaStartX = 30;

    protected int $imageAreaStartY = 110;

    protected int $imageAreaWidth = 405;

    protected int $imageAreaHeight = 235;

    protected int $titleHeight = 85;

    protected int $tagHeight = 330;

    protected int $descriptionHeight = 355;

    protected int $cardLevelX = 388;

    protected int $cardLevelY = 670;
}
