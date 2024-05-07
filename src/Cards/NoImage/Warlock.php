<?php

namespace MPorembski\CardMaker\Cards\NoImage;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Warlock
 *
 * @package CardMaker\Cards\NoImage
 */
class Warlock extends AbstractCard
{
    protected $layerFile = 'warlock_quest';

    protected int $imageAreaStartX = 20;

    protected int $imageAreaStartY = 110;

    protected int $imageAreaWidth = 415;

    protected int $imageAreaHeight = 340;

    protected int $titleHeight = 87;

    protected int $tagHeight = -999;

    protected int $descriptionHeight = 200;

    protected int $cardLevelX = 390;

    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 370;

    protected int $maxTagWidth = 230;

    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;

    protected int $dummyTriangleStart = 999;

    protected $displayLevel = false;

    protected $displayImage = false;
}
