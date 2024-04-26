<?php

namespace MPorembski\CardMaker\Cards;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class GdPrinter
 *
 * @package CardMaker\Cards
 */
class GdPrinter
{
    /**
     * @var int|float|null
     */
    protected $cardWidth;

    /**
     * @var int|float|null
     */
    protected $cardHeight;

    /**
     * @var string|null
     */
    protected $layerFile;

    /**
     * TODO: this should not be UploadedFile/strng, because:
     *  - this should be not symfony dependent
     *  - we should get here only object
     *
     * @var null|UploadedFile|string
     */
    protected $image;

    protected $fonts = [
        'b' => '../var/cardmaker/resources/fonts/caxton_b.ttf',
        'bi' => '../var/cardmaker/resources/fonts/caxton_bi.ttf',
        'l' => '../var/cardmaker/resources/fonts/caxton_l.ttf',
        'li' => '../var/cardmaker/resources/fonts/caxton_li.ttf',
        'n' => '../var/cardmaker/resources/fonts/caxton_n.ttf',
        'ni' => '../var/cardmaker/resources/fonts/caxton_ni.ttf',
        'w' => '../var/cardmaker/resources/fonts/windlass2.ttf'
    ];

    protected $textColor = null;

    protected $textColorWhite = null;

    protected $gdResource = null;

    /**
     * init
     *
     * @param $layerFile
     * @param UploadedFile|null $image
     * @param $imageAreaStartX
     * @param $imageAreaStartY
     * @param $imageAreaWidth
     * @param $imageAreaHeight
     *
     * @throws \Exception
     */
    public function init(
        $layerFile,
        $image = null,
        $imageAreaStartX = null,
        $imageAreaStartY = null,
        $imageAreaWidth = null,
        $imageAreaHeight = null,
        $cardWidth = null,
        $cardHeight = null
    ) {
        $this->cardWidth = $cardWidth;
        $this->cardHeight = $cardHeight;
        $this->layerFile = $layerFile;
        $this->image = $image;
        $this->gdResource = imagecreatetruecolor($this->cardWidth, $this->cardHeight);
        $this->textColor = imagecolorallocate($this->gdResource, 0, 0, 0);
        $this->textColorWhite = imagecolorallocate($this->gdResource, 255, 255, 255);
        imagefill($this->gdResource, 0, 0, $this->textColorWhite);
        if ($image) {
            $this->initImageLayer($imageAreaStartX, $imageAreaStartY, $imageAreaWidth, $imageAreaHeight);
        }
        $this->initCardLayer();
    }

    /**
     * @param $path
     *
     * @return null|string
     */
    public function render($path)
    {
        if ($path) {
            imagepng($this->gdResource, $path);
        } else {
            header('Content-Type: image/png');
            imagepng($this->gdResource);
            $path = null;
        }
        imagedestroy($this->gdResource);

        return $path;
    }

    /**
     * @param $textSize
     * @param $text
     * @param $maxWidth
     * @param $font
     *
     * @return mixed
     */
    public function fitTextSize($textSize, $text, $maxWidth, $font)
    {
        $titleWidth = 999;
        while ($titleWidth > $maxWidth) {
            $titleWidth = $this->getTextWidth($textSize, $font, $text);
            $textSize--;
        }

        return $textSize;
    }

    /**
     * @param $size
     * @param $x
     * @param $y
     * @param $font
     * @param $text
     * @param bool $white
     */
    public function printText($size, $x, $y, $font, $text, $white = false)
    {
        $color = $white ? $this->textColorWhite : $this->textColor;
        imagettftext($this->gdResource, $size, 0, $x, $y, $color, $this->fonts[$font], $text);
    }

    /**
     * @param $text
     * @param $height
     * @param $size
     * @param $font
     * @param int $offset
     * @param bool $white
     */
    public function centerText($text, $height, $size, $font, $offset = 0, $white = false)
    {
        $color = $white ? $this->textColorWhite : $this->textColor;
        $textWidth = $this->getTextWidth($size, $font, $text);
        $writeStart = floor(($this->cardWidth - $textWidth) / 2) + $offset;

        imagettftext($this->gdResource, $size, 0, $writeStart, $height, $color, $this->fonts[$font], $text);
    }

    public function printLine($height)
    {
        imageline(
            $this->gdResource,
            $this->cardWidth / 5,
            $height,
            4 * $this->cardWidth / 5,
            $height,
            $this->textColor
        );
    }

    /**
     * @param $size
     * @param $font
     * @param $text
     *
     * @return mixed
     */
    public function getTextWidth($size, $font, $text)
    {
        $arr = $this->imagettfbbox($size, $font, $text);

        return $arr[2];
    }

    /**
     * @var array
     */
    protected static $imagettfbboxCache = [];

    /**
     * @param $size
     * @param $font
     * @param $text
     *
     * @return mixed
     */
    protected function imagettfbbox($size, $font, $text)
    {
        $key = $size . ':' . $font . ':' . $text;
        if (empty(self::$imagettfbboxCache[$key])) {
            self::$imagettfbboxCache[$key] = imagettfbbox($size, 0, $this->fonts[$font], $text);
        }

        return self::$imagettfbboxCache[$key];
    }

    /**
     * @return string
     */
    protected function getLayerFile()
    {
        /**
         * @TODO: this should be injected
         */
        return '../var/cardmaker/resources/standard_layers/' . $this->layerFile . '.png';
    }

    /**
     * @param $imageAreaStartX
     * @param $imageAreaStartY
     * @param $imageAreaWidth
     * @param $imageAreaHeight
     *
     * @throws \Exception
     */
    protected function initImageLayer($imageAreaStartX, $imageAreaStartY, $imageAreaWidth, $imageAreaHeight)
    {
        // TODO: image should be passed as argument
        list($src2w, $src2h, $type, $attr) = getimagesize($this->image);

        if (is_object($this->image)) {
            $ext = strtolower($this->image->getClientOriginalExtension());
        } else {
            $parts = explode('.', $this->image);
            $ext = strtolower(end($parts));
        }

        if ($ext == 'jpg' || $ext == 'jpeg') {
            $cardImage = imagecreatefromjpeg($this->image);
        } elseif ($ext = 'png') {
            $cardImage = imagecreatefrompng($this->image);
        } else {
            throw new \Exception('unknown format');
        }

        if ($imageAreaWidth / $imageAreaHeight > $src2w / $src2h) {
            $src2hNew = $src2w * $imageAreaHeight / $imageAreaWidth;
            $srcX = 0;
            $srcY = ($src2h - $src2hNew) / 2;
            $src2h = $src2hNew;
        } else {
            $src2wNew = $src2h * $imageAreaWidth / $imageAreaHeight;
            $srcX = ($src2w - $src2wNew) / 2;
            $srcY = 0;
            $src2w = $src2wNew;
        }

        imagecopyresized(
            $this->gdResource,
            $cardImage,
            $imageAreaStartX,
            $imageAreaStartY,
            $srcX,
            $srcY,
            $imageAreaWidth,
            $imageAreaHeight,
            $src2w,
            $src2h
        );
        imagedestroy($cardImage);
    }

    /**
     * initCardLayer()
     */
    protected function initCardLayer()
    {
        list($src2w, $src2h, $type, $attr) = getimagesize($this->getLayerFile());
        $cardLayer = imagecreatefrompng($this->getLayerFile());
        if ($src2w < 260) {
            imagecopyresized($this->gdResource, $cardLayer, (2 * $src2w - $this->cardWidth) / -2,
                (2 * $src2h - $this->cardHeight) / -2, 0, 0, 2 * $src2w, 2 * $src2h, $src2w, $src2h);
        } else {
            imagecopy($this->gdResource, $cardLayer, ($src2w - $this->cardWidth) / -2,
                ($src2h - $this->cardHeight) / -2, 0, 0, $src2w, $src2h);
        }
        imagedestroy($cardLayer);
    }
}
