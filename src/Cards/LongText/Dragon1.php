<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

class Dragon1 extends AbstractCard
{
    protected $layerFile = 'dragon1_a';

    protected int $imageAreaStartX = 25;
    protected int $imageAreaStartY = 110;
    protected int $imageAreaWidth = 415;
    protected int $imageAreaHeight = 225;

    protected int $titleHeight = 87;
    protected int $tagHeight = 332;
    protected int $descriptionHeight = 350;

    protected int $cardLevelX = 390;
    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 380;
    protected int $maxTagWidth = 230;
    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;
    protected int $dummyTriangleStart = 560;
}
