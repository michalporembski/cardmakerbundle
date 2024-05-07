<?php

namespace MPorembski\CardMaker\Cards\ShortText;

use MPorembski\CardMaker\Cards\AbstractCard;

/**
 * Class Highland
 * @package CardMaker\Cards\ShortText
 */
class Highland extends AbstractCard
{
    protected $layerFile = 'highland_b';

    protected int $imageAreaStartX = 25;
    protected int $imageAreaStartY = 110;
    protected int $imageAreaWidth = 410;
    protected int $imageAreaHeight = 345;

    protected int $titleHeight = 89;
    protected int $tagHeight = 447;
    protected int $descriptionHeight = 460;

    protected int $cardLevelX = 391;
    protected int $cardLevelY = 671;

    protected int $maxTitleWidth = 380;
    protected int $maxTagWidth = 230;
    protected int $maxCaptionWidth = 380;

    protected int $maxWriteHeight = 670;
    protected int $dummyTriangleStart = 560;
}
