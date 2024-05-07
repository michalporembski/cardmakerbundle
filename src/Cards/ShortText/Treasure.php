<?php

namespace MPorembski\CardMaker\Cards\ShortText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Treasure
 *
 * @package CardMaker\Cards\ShortText
 */
class Treasure extends AbstractCard
{
    protected $layerFile = 'treasure_b';

    protected int $imageAreaStartX = 25;

    protected int $imageAreaStartY = 110;

    protected int $imageAreaWidth = 410;

    protected int $imageAreaHeight = 349;

    protected int $titleHeight = 85;

    protected int $tagHeight = 447;

    protected int $descriptionHeight = 460;

    protected int $cardLevelX = 390;

    protected int $cardLevelY = 673;

    protected int $maxTitleWidth = 370;

    protected int $maxTagWidth = 210;

    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;

    protected int $dummyTriangleStart = 560;
}
