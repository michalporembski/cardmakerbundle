<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Relict
 * @package CardMaker\Cards\LongText
 */
class Relict extends AbstractCard
{
    protected $layerFile = 'relict_a';

    protected int $imageAreaStartX = 25;
    protected int $imageAreaStartY = 110;
    protected int $imageAreaWidth = 435;
    protected int $imageAreaHeight = 260;

    protected int $titleHeight = 85;
    protected int $tagHeight = 331;
    protected int $descriptionHeight = 350;

    protected int $cardLevelX = 392;
    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 340;
    protected int $maxTagWidth = 220;
    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;
    protected int $dummyTriangleStart = 530;
}
