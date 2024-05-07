<?php

namespace MPorembski\CardMaker\Cards;

class Info extends AbstractCard
{
    protected $layerFile = '../other_layers/info';

    protected $cardWidth = 1500;

    protected $cardHeight = 1200;

    protected int $imageAreaStartX = 20;

    protected int $imageAreaStartY = 110;

    protected int $imageAreaWidth = 415;

    protected int $imageAreaHeight = 340;

    protected int $titleHeight = 200;

    protected int $tagHeight = 444;

    protected int $descriptionHeight = 115;

    protected int $cardLevelX = 390;

    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 370;

    protected int $maxTagWidth = 230;

    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 1000;

    protected int $dummyTriangleStart = 9999;

    protected $displayLevel = false;

    protected $displayImage = false;

    protected $textTitleSize = 28;

    protected $textLevelSize = 27;

    protected $textTagSize = 19;

    protected $textCaptionSize = 30;

    protected $maxWidth = 1200;

    protected $textNormalSize = 10;

    /**
     * estimateFontSize()
     */
    protected function estimateFontSize()
    {
        $this->textNormalSize = 18;
    }
}
