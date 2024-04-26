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

    protected $imageAreaStartX = 20;

    protected $imageAreaStartY = 110;

    protected $imageAreaWidth = 415;

    protected $imageAreaHeight = 340;

    protected $titleHeight = 87;

    protected $tagHeight = -999;

    protected $descriptionHeight = 200;

    protected $cardLevelX = 390;

    protected $cardLevelY = 670;

    protected $maxTitleWidth = 370;

    protected $maxTagWidth = 230;

    protected $maxCaptionWidth = 380;

    protected $maxWriteHeight = 670;

    protected $dummyTriangleStart = 999;

    protected $displayLevel = false;

    protected $displayImage = false;
}
