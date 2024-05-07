<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Bridge
 *
 * @package CardMaker\Cards\LongText
 */
class Remnant extends AbstractCard
{
    protected $layerFile = 'remnant_a';

    protected int $imageAreaStartX = 25;

    protected int $imageAreaStartY = 110;

    protected int $imageAreaWidth = 410;

    protected int $imageAreaHeight = 230;

    protected int $titleHeight = 89;

    protected int $tagHeight = 331;

    protected int $descriptionHeight = 355;

    protected int $cardLevelX = 391;

    protected int $cardLevelY = 671;

    protected int $maxTitleWidth = 380;

    protected int $maxTagWidth = 230;

    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;

    protected int $dummyTriangleStart = 560;
}
