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
        'b' => __DIR__ . '/../../assets/fonts/caxton_b.ttf',
        'bi' => __DIR__ . '/../../assets/fonts/caxton_bi.ttf',
        'l' => __DIR__ . '/../../assets/fonts/caxton_l.ttf',
        'li' => __DIR__ . '/../../assets/fonts/caxton_li.ttf',
        'n' => __DIR__ . '/../../assets/fonts/caxton_n.ttf',
        'ni' => __DIR__ . '/../../assets/fonts/caxton_ni.ttf',
        'w' => __DIR__ . '/../../assets/fonts/windlass2.ttf'
    ];

    protected $textColor = null;

    protected $textColorWhite = null;

    protected $gdResource = null;

    /**
     * init
     *
     * @param                   $layerFile
     * @param UploadedFile|null $image
     * @param                   $imageAreaStartX
     * @param                   $imageAreaStartY
     * @param                   $imageAreaWidth
     * @param                   $imageAreaHeight
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
     * @param int    $textSize
     * @param string $text
     * @param int    $maxWidth
     * @param string $font
     *
     * @return int
     */
    public function fitTextSize(int $textSize, string $text, int $maxWidth, string $font): int
    {
        $titleWidth = 999;
        while ($titleWidth > $maxWidth) {
            $titleWidth = $this->getTextWidth($textSize, $font, $text);
            $textSize--;
        }

        return $textSize;
    }

    /**
     * @param int    $size
     * @param int    $x
     * @param int    $y
     * @param string $font
     * @param string $text
     * @param bool   $white
     *
     * @return void
     */
    public function printText(int $size, int $x, int $y, string $font, string $text, bool $white = false): void
    {
        $color = $white ? $this->textColorWhite : $this->textColor;
        imagettftext($this->gdResource, $size, 0, $x, $y, $color, $this->fonts[$font], $text);
    }

    /**
     * @param string $text
     * @param int    $height
     * @param int    $size
     * @param string $font
     * @param int    $offset
     * @param bool   $white
     *
     * @return void
     */
    public function centerText(
        string $text,
        int $height,
        int $size,
        string $font,
        int $offset = 0,
        bool $white = false
    ): void {
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
    public function getTextWidth(int $size, string $font, string $text)
    {
        $arr = $this->imagettfbbox($size, $font, $text);

        return $arr[2];
    }

    /**
     * @var array
     */
    protected static $imagettfbboxCache = [];

    /**
     * @param int    $size
     * @param string $font
     * @param string $text
     *
     * @return int[]
     */
    protected function imagettfbbox(int $size, string $font, string $text): array
    {
        if (strlen($text) < 1) {
            return [
                0,
                0,
                0
            ];
        }

        $key = $size . ':' . $font . ':' . $text;
        if (empty(self::$imagettfbboxCache[$key])) {
            self::$imagettfbboxCache[$key] = \imagettfbbox($size, 0, $this->fonts[$font], $text);
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
        return __DIR__ . '/../../assets/standard_layers/' . $this->layerFile . '.png';
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
            $cardImage = \imagecreatefromjpeg($this->image);
        } elseif ($ext = 'png') {
            $cardImage = \imagecreatefrompng($this->image);
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
            (int)$imageAreaStartX,
            (int)$imageAreaStartY,
            (int)$srcX,
            (int)$srcY,
            (int)$imageAreaWidth,
            (int)$imageAreaHeight,
            (int)$src2w,
            (int)$src2h
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
            imagecopyresized(
                $this->gdResource,
                $cardLayer,
                intval((2 * $src2w - $this->cardWidth) / -2),
                intval((2 * $src2h - $this->cardHeight) / -2),
                0,
                0,
                2 * $src2w,
                2 * $src2h,
                $src2w,
                $src2h
            );
        } else {
            imagecopy(
                $this->gdResource,
                $cardLayer,
                intval(($src2w - $this->cardWidth) / -2),
                intval(($src2h - $this->cardHeight) / -2),
                0,
                0,
                $src2w,
                $src2h
            );
        }
        imagedestroy($cardLayer);
    }
}
