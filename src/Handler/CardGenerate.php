<?php

namespace MPorembski\CardMaker\Handler;

use MPorembski\CardMaker\Cards\AbstractCard;
use MPorembski\CardMaker\Cards\Info;
use MPorembski\CardMaker\Cards\LongText\Adventures as AdventuresLong;
use MPorembski\CardMaker\Cards\LongText\Bridge as BridgeLong;
use MPorembski\CardMaker\Cards\LongText\City as CityLong;
use MPorembski\CardMaker\Cards\LongText\Dragon1 as Dragon1Long;
use MPorembski\CardMaker\Cards\LongText\Dragon2 as Dragon2Long;
use MPorembski\CardMaker\Cards\LongText\Dragon3 as Dragon3Long;
use MPorembski\CardMaker\Cards\LongText\Dungeon as DungeonLong;
use MPorembski\CardMaker\Cards\LongText\Equpiment as EqupimentLong;
use MPorembski\CardMaker\Cards\LongText\Harbinger as HarbingerLong;
use MPorembski\CardMaker\Cards\LongText\Highland as HighlandLong;
use MPorembski\CardMaker\Cards\LongText\Nether as NetherLong;
use MPorembski\CardMaker\Cards\LongText\Potion as PotionLong;
use MPorembski\CardMaker\Cards\LongText\Relict as RelictLong;
use MPorembski\CardMaker\Cards\LongText\Remnant as RemnantLong;
use MPorembski\CardMaker\Cards\LongText\Spell as SpellLong;
use MPorembski\CardMaker\Cards\LongText\Talisman as TalismanLong;
use MPorembski\CardMaker\Cards\LongText\Treasure as TreasureLong;
use MPorembski\CardMaker\Cards\LongText\Tunel as TunelLong;
use MPorembski\CardMaker\Cards\LongText\Vampire as VampireLong;
use MPorembski\CardMaker\Cards\LongText\Woodland as WoodlandLong;
use MPorembski\CardMaker\Cards\NoImage\Denizen;
use MPorembski\CardMaker\Cards\NoImage\Evil;
use MPorembski\CardMaker\Cards\NoImage\Good;
use MPorembski\CardMaker\Cards\NoImage\Neutral;
use MPorembski\CardMaker\Cards\NoImage\QuestReward;
use MPorembski\CardMaker\Cards\NoImage\Warlock;
use MPorembski\CardMaker\Cards\ShortText\Adventures as AdventuresShort;
use MPorembski\CardMaker\Cards\ShortText\Bridge as BridgeShort;
use MPorembski\CardMaker\Cards\ShortText\City as CityShort;
use MPorembski\CardMaker\Cards\ShortText\Dragon1 as Dragon1Short;
use MPorembski\CardMaker\Cards\ShortText\Dragon2 as Dragon2Short;
use MPorembski\CardMaker\Cards\ShortText\Dragon3 as Dragon3Short;
use MPorembski\CardMaker\Cards\ShortText\Dungeon as DungeonShort;
use MPorembski\CardMaker\Cards\ShortText\Equpiment as EqupimentShort;
use MPorembski\CardMaker\Cards\ShortText\Harbinger as HarbingerShort;
use MPorembski\CardMaker\Cards\ShortText\Highland as HighlandShort;
use MPorembski\CardMaker\Cards\ShortText\Nether as NetherShort;
use MPorembski\CardMaker\Cards\ShortText\Potion as PotionShort;
use MPorembski\CardMaker\Cards\ShortText\Relict as RelictShort;
use MPorembski\CardMaker\Cards\ShortText\Remnant as RemnantShort;
use MPorembski\CardMaker\Cards\ShortText\Spell as SpellShort;
use MPorembski\CardMaker\Cards\ShortText\Talisman as TalismanShort;
use MPorembski\CardMaker\Cards\ShortText\Treasure as TreasureShort;
use MPorembski\CardMaker\Cards\ShortText\Tunel as TunelShort;
use MPorembski\CardMaker\Cards\ShortText\Vampire as VampireShort;
use MPorembski\CardMaker\Cards\ShortText\Woodland as WoodlandShort;
use MPorembski\CardMaker\Entity\Dto\GenerateCardCommand;
use MPorembski\CardMaker\Entity\Layer;

/**
 * Class CardGenerate
 *
 * @package Cardmaker\Handler
 */
class CardGenerate implements CardGenerateInterface
{
    const CARD_LAYOUT_SIZE = [
        'cardmaker.layout-size.auto' => 0,
        'cardmaker.layout-size.small-text' => 1,
        'cardmaker.layout-size.big-text' => 2
    ];

    const CAPTION_TYPE_NONE = 0;

    const CAPTION_TYPE_ITALIC = 1;

    const CAPTION_TYPE_REGULAR = 2;

    const CAPTION_TYPES = [
        'cardmaker.caption.none' => self::CAPTION_TYPE_NONE,
        'cardmaker.caption.italic' => self::CAPTION_TYPE_ITALIC,
        'cardmaker.caption.regular' => self::CAPTION_TYPE_REGULAR,
    ];

    /**
     * @param GenerateCardCommand $generateCardCommand
     *
     * @return null|string
     * @throws \Exception
     */
    public function handle(GenerateCardCommand $generateCardCommand)
    {
        $path = $this->getCardPath($this->buildCardHash($generateCardCommand));
        if (file_exists($path)) {
            return $path;
        }
        $layoutSize = $this->getLayoutSize($generateCardCommand);
        $card = $this->getCardObject($generateCardCommand->getLayer(), $layoutSize);

        $card->setTextNormalSize($generateCardCommand->getTextSize());
        $card->setLevel($generateCardCommand->getLevel());
        $card->setTextTitle($generateCardCommand->getTitle());
        $card->setTextTag($generateCardCommand->getTag());
        $card->setTextCaption($generateCardCommand->getCaption());
        $card->setCaptionType($generateCardCommand->getCaptionType());
        if (!empty($generateCardCommand->getPlaces())) {
            $card->setTextCaption(implode(' • ',$generateCardCommand->getPlaces()));
            $card->setCaptionType(AbstractCard::CAPTION_TYPE_UNDERLINE);
        }
        // TODO: explode text by lines only if auto-line-break disabled
        $card->setTextDescription(explode(PHP_EOL, $generateCardCommand->getText()));
        $card->setStory(explode(PHP_EOL, $generateCardCommand->getStory()));
        if (!$generateCardCommand->getImage()) {
            //TODO: temporary upload; use previously uploaded file
            $card->setImage('../var/cardmaker/placeholder.jpg');
        } else {
            $card->setImage($generateCardCommand->getImage());
        }

        return $card->render($path);
    }

    /**
     * @param GenerateCardCommand $generateCardCommand
     *
     * @return string|null
     */
    protected function buildCardHash(GenerateCardCommand $generateCardCommand)
    {
        // TODO: we should support package generation, that would place cards of each deck in separate folder
        if (!$generateCardCommand->isSave()) {
            return null;
        }
        $name = $generateCardCommand->getLayer() .
            '_' . substr($generateCardCommand->getTitle(), 0, 20) .
            '_' . substr(base_convert(md5(json_encode($generateCardCommand->getCardData())),16,36), 0, 5);

        return $name;
    }

    /**
     * @param string|null $name
     *
     * @return string|null
     */
    protected function getCardPath($name)
    {
        if (!$name) {
            return null;
        }

        return './generated/' . $name . '.png';
    }

    /**
     * @param GenerateCardCommand $generateCardCommand
     *
     * @return int
     */
    protected function getLayoutSize(GenerateCardCommand $generateCardCommand): int
    {
        $layoutSize = $generateCardCommand->getLayoutSize();
        if ($layoutSize) {
            return $layoutSize;
        }

        $len = strlen($generateCardCommand->getText());
        if ($generateCardCommand->getCaption()) {
            $len += 20;
        }
        if (strpos($generateCardCommand->getText(), AbstractCard::LINE_TEXT) > 0) {
            $len += 100;
        }
        $len += strlen($generateCardCommand->getStory());

        if ($len > 230) {
            return self::CARD_LAYOUT_SIZE['cardmaker.layout-size.big-text'];
        }

        return self::CARD_LAYOUT_SIZE['cardmaker.layout-size.small-text'];
    }

    /**
     * @param int $layer
     * @param int $layoutSize
     *
     * @return AbstractCard
     */
    protected function getCardObject(int $layer, int $layoutSize): AbstractCard
    {
        $classes = $this->getClasses($layoutSize);
        $class = $classes[$layer] ?? reset($classes);

        return new $class();
    }

    /**
     * @param int $layoutSize
     *
     * @return array
     */
    protected function getClasses(int $layoutSize): array
    {
        if (self::CARD_LAYOUT_SIZE['cardmaker.layout-size.big-text'] === $layoutSize) {
            return [
                Layer::CARD_ADVENTURES => AdventuresLong::class,
                Layer::CARD_TALISMAN => TalismanLong::class,
                Layer::CARD_DRAGON1 => Dragon1Long::class,
                Layer::CARD_DRAGON2 => Dragon2Long::class,
                Layer::CARD_DRAGON3 => Dragon3Long::class,
                Layer::CARD_DUNGEON => DungeonLong::class,
                Layer::CARD_EQUIPMENT => EqupimentLong::class,
                Layer::CARD_HIGHLAND => HighlandLong::class,
                Layer::CARD_RELICT => RelictLong::class,
                Layer::CARD_SPELL => SpellLong::class,
                Layer::CARD_TREASURE => TreasureLong::class,

                Layer::CARD_BRIDGE => BridgeLong::class,
                Layer::CARD_CITY => CityLong::class,
                Layer::CARD_HARBINGER => HarbingerLong::class,
                Layer::CARD_NETHER => NetherLong::class,
                Layer::CARD_VAMPIRE => VampireLong::class,
                Layer::CARD_WOODLAND => WoodlandLong::class,
                Layer::CARD_TUNEL => TunelLong::class,
                Layer::CARD_POTION => PotionLong::class,
                Layer::CARD_REMNANT => RemnantLong::class,

                Layer::CARD_WARLOCK => Warlock::class,
                Layer::CARD_DENIZEN => Denizen::class,
                Layer::CARD_QUEST_REWARD => QuestReward::class,
                Layer::CARD_ALIGNMENT_EVIL => Evil::class,
                Layer::CARD_ALIGNMENT_GOOD => Good::class,
                Layer::CARD_ALIGNMENT_NEUTRAL => Neutral::class,

                Layer::CARD_INFO => Info::class,
            ];
        }

        return [
            Layer::CARD_ADVENTURES => AdventuresShort::class,
            Layer::CARD_TALISMAN => TalismanShort::class,
            Layer::CARD_DRAGON1 => Dragon1Short::class,
            Layer::CARD_DRAGON2 => Dragon2Short::class,
            Layer::CARD_DRAGON3 => Dragon3Short::class,
            Layer::CARD_DUNGEON => DungeonShort::class,
            Layer::CARD_EQUIPMENT => EqupimentShort::class,
            Layer::CARD_HIGHLAND => HighlandShort::class,
            Layer::CARD_RELICT => RelictShort::class,
            Layer::CARD_SPELL => SpellShort::class,
            Layer::CARD_TREASURE => TreasureShort::class,

            Layer::CARD_BRIDGE => BridgeShort::class,
            Layer::CARD_CITY => CityShort::class,
            Layer::CARD_HARBINGER => HarbingerShort::class,
            Layer::CARD_NETHER => NetherShort::class,
            Layer::CARD_VAMPIRE => VampireShort::class,
            Layer::CARD_WOODLAND => WoodlandShort::class,
            Layer::CARD_TUNEL => TunelShort::class,
            Layer::CARD_POTION => PotionShort::class,
            Layer::CARD_REMNANT => RemnantShort::class,

            Layer::CARD_WARLOCK => Warlock::class,
            Layer::CARD_QUEST_REWARD => QuestReward::class,
            Layer::CARD_DENIZEN => Denizen::class,
            Layer::CARD_ALIGNMENT_EVIL => Evil::class,
            Layer::CARD_ALIGNMENT_GOOD => Good::class,
            Layer::CARD_ALIGNMENT_NEUTRAL => Neutral::class,

            Layer::CARD_INFO => Info::class,
        ];
    }
}
