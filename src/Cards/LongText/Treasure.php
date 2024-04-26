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

    protected $imageAreaStartX = 25;
    protected $imageAreaStartY = 110;
    protected $imageAreaWidth = 410;
    protected $imageAreaHeight = 240;

    protected $titleHeight = 85;
    protected $tagHeight = 337;
    protected $descriptionHeight = 350;

    protected $cardLevelX = 390;
    protected $cardLevelY = 673;

    protected $maxTitleWidth = 370;
    protected $maxTagWidth = 210;
    protected $maxCaptionWidth = 380;

    protected $maxWriteHeight = 670;
    protected $dummyTriangleStart = 560;
}
