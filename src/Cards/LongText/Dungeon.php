<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Dungeon
 * @package CardMaker\Cards\LongText
 */
class Dungeon extends AbstractCard
{
    protected $layerFile = 'dungeon_a';

    protected int $imageAreaStartX = 25;
    protected int $imageAreaStartY = 110;
    protected int $imageAreaWidth = 410;
    protected int $imageAreaHeight = 240;

    protected int $titleHeight = 87;
    protected int $tagHeight = 332;
    protected int $descriptionHeight = 350;

    protected int $cardLevelX = 387;
    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 380;
    protected int $maxTagWidth = 230;
    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;
    protected int $dummyTriangleStart = 560;
}
