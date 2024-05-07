<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Spell
 * @package CardMaker\Cards\LongText
 */
class Spell extends AbstractCard
{
    protected $layerFile = 'spell_a';

    protected int $imageAreaStartX = 25;
    protected int $imageAreaStartY = 110;
    protected int $imageAreaWidth = 405;
    protected int $imageAreaHeight = 240;

    protected int $titleHeight = 87;
    protected int $tagHeight = 331;
    protected int $descriptionHeight = 350;

    protected $displayLevel = false;
    protected int $cardLevelX = 390;
    protected int $cardLevelY = 670;

    protected int $maxTitleWidth = 370;
    protected int $maxTagWidth = 210;
    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;
    protected int $dummyTriangleStart = 560;
}
