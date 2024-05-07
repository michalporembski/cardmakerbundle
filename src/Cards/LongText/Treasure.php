<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Treasure
 * @package CardMaker\Cards\LongText
 */
class Treasure extends AbstractCard
{
    protected $layerFile = 'treasure_a';

    protected int $imageAreaStartX = 25;
    protected int $imageAreaStartY = 110;
    protected int $imageAreaWidth = 410;
    protected int $imageAreaHeight = 240;

    protected int $titleHeight = 85;
    protected int $tagHeight = 337;
    protected int $descriptionHeight = 350;

    protected int $cardLevelX = 390;
    protected int $cardLevelY = 673;

    protected int $maxTitleWidth = 370;
    protected int $maxTagWidth = 210;
    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;
    protected int $dummyTriangleStart = 560;
}
