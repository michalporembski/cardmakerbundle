<?php

namespace MPorembski\CardMaker\Cards\ShortText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Dungeon
 * @package CardMaker\Cards\ShortText
 */
class Dungeon extends AbstractCard
{
    protected $layerFile = 'dungeon_b';

    protected int $imageAreaStartX = 25;
    protected int $imageAreaStartY = 110;
    protected int $imageAreaWidth = 410;
    protected int $imageAreaHeight = 350;

    protected int $titleHeight = 85;
    protected int $tagHeight = 447;
    protected int $descriptionHeight = 460;

    protected int $cardLevelX = 387;
    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 340;
    protected int $maxTagWidth = 230;
    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;
    protected int $dummyTriangleStart = 560;
}
