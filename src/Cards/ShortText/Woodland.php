<?php

namespace MPorembski\CardMaker\Cards\ShortText;

use MPorembski\CardMaker\Cards\AbstractCard;

class Woodland extends AbstractCard
{
    protected $layerFile = 'woodland_b';

    protected int $imageAreaStartX = 25;

    protected int $imageAreaStartY = 100;

    protected int $imageAreaWidth = 415;

    protected int $imageAreaHeight = 350;

    protected int $titleHeight = 85;

    protected int $tagHeight = 444;

    protected int $descriptionHeight = 465;

    protected int $cardLevelX = 390;

    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 380;

    protected int $maxTagWidth = 230;

    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;

    protected int $dummyTriangleStart = 560;
}
