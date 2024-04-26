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

    protected $imageAreaStartX = 25;
    protected $imageAreaStartY = 110;
    protected $imageAreaWidth = 410;
    protected $imageAreaHeight = 240;

    protected $titleHeight = 87;
    protected $tagHeight = 332;
    protected $descriptionHeight = 350;

    protected $cardLevelX = 387;
    protected $cardLevelY = 670;

    protected $maxTitleWidth = 380;
    protected $maxTagWidth = 230;
    protected $maxCaptionWidth = 380;

    protected $maxWriteHeight = 670;
    protected $dummyTriangleStart = 560;
}
