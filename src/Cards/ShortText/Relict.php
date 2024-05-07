<?php

namespace MPorembski\CardMaker\Cards\ShortText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Relict
 * @package CardMaker\Cards\ShortText
 */
class Relict extends AbstractCard
{
    protected $layerFile = 'relict_b';

    protected int $imageAreaStartX = 25;
    protected int $imageAreaStartY = 110;
    protected int $imageAreaWidth = 435;
    protected int $imageAreaHeight = 365;

    protected int $titleHeight = 85;
    protected int $tagHeight = 447;
    protected int $descriptionHeight = 460;

    protected int $cardLevelX = 392;
    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 340;
    protected int $maxTagWidth = 220;
    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;
    protected int $dummyTriangleStart = 530;
}
