<?php

namespace MPorembski\CardMaker\Cards\NoImage;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Evil
 *
 * @package CardMaker\Cards\NoImage
 */
class Evil extends AbstractCard
{
    protected $layerFile = 'evil';

    protected int $imageAreaStartX = 20;

    protected int $imageAreaStartY = 110;

    protected int $imageAreaWidth = 415;

    protected int $imageAreaHeight = 340;

    protected int $titleHeight = 200;

    protected int $tagHeight = 444;

    protected int $descriptionHeight = 280;

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
