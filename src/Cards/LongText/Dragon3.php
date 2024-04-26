<?php

namespace MPorembski\CardMaker\Cards\LongText;

use MPorembski\CardMaker\Cards\AbstractCard;

class Dragon3 extends AbstractCard{
	
  protected $layerFile = 'dragon3_a';
  
    protected $imageAreaStartX = 25;
    protected $imageAreaStartY = 110;
    protected $imageAreaWidth = 415;
    protected $imageAreaHeight = 225;

    protected $titleHeight = 87;
    protected $tagHeight = 332;
    protected $descriptionHeight = 350;

    protected $cardLevelX = 390;
    protected $cardLevelY = 670;

      protected $maxTitleWidth = 380;
    protected $maxTagWidth = 230;
    protected $maxCaptionWidth = 380;

    protected $maxWriteHeight = 670;
    protected $dummyTriangleStart = 560;

}
