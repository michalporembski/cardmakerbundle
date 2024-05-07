<?php

namespace MPorembski\CardMaker\Cards\ShortText;

use MPorembski\CardMaker\Cards\AbstractCard;

class Adventures extends AbstractCard
{
    protected $layerFile = 'adventures_b';

    protected int $imageAreaStartX = 30;

    protected int $imageAreaStartY = 110;

    protected int $imageAreaWidth = 405;

    protected int $imageAreaHeight = 350;

    protected int $titleHeight = 85;

    protected int $tagHeight = 447;

    protected int $descriptionHeight = 470;

    protected int $cardLevelX = 388;

    protected int $cardLevelY = 670;
}
