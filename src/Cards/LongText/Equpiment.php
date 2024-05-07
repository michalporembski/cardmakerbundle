<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Equpiment
 *
 * @package CardMaker\Cards\LongText
 */
class Equpiment extends AbstractCard
{
    protected $layerFile = 'equipment_a';

    protected int $imageAreaStartX = 25;

    protected int $imageAreaStartY = 110;

    protected int $imageAreaWidth = 410;

    protected int $imageAreaHeight = 240;

    protected int $titleHeight = 87;

    protected int $tagHeight = 331;

    protected int $descriptionHeight = 350;

    protected int $cardLevelX = 387;

    protected int $cardLevelY = 671;

    protected int $maxTitleWidth = 380;

    protected int $maxTagWidth = 230;

    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;

    protected int $dummyTriangleStart = 560;
}
