<?php

namespace MPorembski\CardMaker\Entity\Dto;

use MPorembski\CardMaker\Entity\Layer;
use MPorembski\CardMaker\Handler\CardGenerate;

/**
 * Class CardMaker
 *
 * @package Cardmaker\Entity\Dto
 */
class GenerateCardCommand
{
    private int $layer = Layer::CARD_ADVENTURES;

    /**
     * @deprecated
     * @var int
     */
    private int $mode = 0;

    /**
     * @var string
     */
    private string $title = '';

    /**
     * @var string
     */
    private string $tag ='';

    /**
     * @var int
     */
    private int $captionType = CardGenerate::CAPTION_TYPE_NONE;

    /**
     * @var string
     */
    private string $caption = '';

    /**
     * @var string
     */
    private string $level = '0';

    /**
     * @var string
     */
    private string $text = '';

    /**
     * @var string
     */
    private string $story = '';

    /**
     * @var string[]
     */
    private $places = [];

    /**
     * @var string
     */
    private string $image = '';

    //    /**
    //     * @var string|null
    //     */
    //    private $imageUrl;

    /**
     * @var int
     */
    private int $textSize = 21;

    /**
     * Template type: auto/short text/long text
     *
     * @var int|null
     */
    private $layoutSize;

    /**
     * @var bool
     */
    private $save = false;

    /**
     * @return int
     */
    public function getLayer(): int
    {
        return $this->layer;
    }

    /**
     * @param int|null $layer
     */
    public function setLayer($layer)
    {
        $this->layer = $layer;
    }

    /**
     * @return int
     */
    public function getMode(): int
    {
        return $this->mode;
    }

    /**
     * @param int $mode
     *
     * @return void
     */
    public function setMode(int $mode):void
    {
        $this->mode = $mode;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     */
    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return int
     */
    public function getCaptionType(): int
    {
        return $this->captionType;
    }

    /**
     * @param int $captionType
     */
    public function setCaptionType(int $captionType)
    {
        $this->captionType = $captionType;
    }

    /**
     * @return null|string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param null|string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return string
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @param string $level
     *
     * @return void
     */
    public function setLevel(string $level): void
    {
        $this->level = $level;
    }

    /**
     * @return null|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param null|string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getStory(): string
    {
        return $this->story;
    }

    /**
     * @param null|string $story
     */
    public function setStory(string $story): void
    {
        $this->story = $story;
    }

    /**
     * @return int|null
     */
    public function getLayoutSize()
    {
        return $this->layoutSize;
    }

    /**
     * @param int|null $layoutSize
     */
    public function setLayoutSize($layoutSize)
    {
        $this->layoutSize = $layoutSize;
    }

    /**
     * @return int|null
     */
    public function getTextSize()
    {
        return $this->textSize;
    }

    /**
     * @param int|null $textSize
     */
    public function setTextSize($textSize)
    {
        $this->textSize = $textSize;
    }

    /**
     * @return null|string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param null|string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    //    /**
    //     * @return null|string
    //     */
    //    public function getImageUrl()
    //    {
    //        return $this->imageUrl;
    //    }
    //
    //    /**
    //     * @param null|string $imageUrl
    //     */
    //    public function setImageUrl($imageUrl)
    //    {
    //        $this->imageUrl = $imageUrl;
    //    }

    /**
     * @return bool
     */
    public function isSave(): bool
    {
        return $this->save;
    }

    /**
     * @param bool $save
     */
    public function setSave(bool $save)
    {
        $this->save = $save;
    }

    /**
     * @param string[] $places
     */
    public function setPlaces(array $places)
    {
        $this->places = $places;
    }

    /**
     * @return string[]
     */
    public function getPlaces(): array
    {
        return $this->places;
    }

    public function getCardData(): array
    {
        return [
            $this->layer,
            $this->mode,
            $this->title,
            $this->tag,
            $this->captionType,
            $this->caption,
            $this->level,
            $this->text,
            $this->story,
            $this->places,
            $this->image,
            //     $this->imageUrl,
            $this->textSize,
            $this->layoutSize
        ];
    }
}
