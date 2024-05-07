<?php

namespace Tests\MPorembski\CardMaker\Handler;

use MPorembski\CardMaker\Cards\AbstractCard;
use MPorembski\CardMaker\Entity\Dto\GenerateCardCommand;
use MPorembski\CardMaker\Entity\Layer;
use MPorembski\CardMaker\Handler\CardGenerate;
use PHPUnit\Framework\TestCase;

class CardGenerateTest extends TestCase
{
    public function testGenerateSimpleCard()
    {
        for($i=1;$i<2;$i++) {
            $command = $this->getBaseDto();
            $command->setLayer($i);
            $cardGenerate = new CardGenerate();
            $res = $cardGenerate->handle($command);

            $this->assertIsString($res);
        }
    }

    public function testGenerateLongTextCard()
    {
        $command = $this->getBaseDto();
        $command->setLevel(1);
        $command->setLayer(Layer::CARD_CITY);
        $command->setCaption(
            'caption: test test test test test test test test test test test test test test test test test test test'
        );
        $command->setCaptionType(AbstractCard::CAPTION_TYPE_BOLD);
        $command->setText(
            'text: test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test'
        );
        $command->setSave(true);
        $cardGenerate = new CardGenerate();
        $res = $cardGenerate->handle($command);

        $this->assertIsString($res);
    }

    public function testGeneratePlaceCard()
    {
        $command = new GenerateCardCommand();
        $command->setTitle('test long');
        $command->setPlaces(['place 1', 'place 2']);
        $command->setTag('tag');
        $command->setLayer(Layer::CARD_DRAGON2);
        $command->setText(
            'text: test test test test test test test test test test test test test test test test test test test test'
        );
        $command->setSave(true);
        $cardGenerate = new CardGenerate();
        $res = $cardGenerate->handle($command);

        $this->assertIsString($res);
    }

    public function testAlignmentCard()
    {
        $command = new GenerateCardCommand();
        $command->setTitle('test long');
        $command->setLayer(Layer::CARD_ALIGNMENT_EVIL);
        $command->setText(
            'text: test test test test test test test test test test test test test test test test test test test test'
        );
        $command->setSave(true);
        $cardGenerate = new CardGenerate();
        $res = $cardGenerate->handle($command);

        $this->assertIsString($res);
    }

    public function getBaseDto(){
        $dto = new GenerateCardCommand();
        $dto->setTitle('test' . rand());
        $dto->setCaption('test');
        $dto->setTag('tag');
        $dto->setCaptionType(AbstractCard::CAPTION_TYPE_BOLD_ITALIC);
        $dto->setText('test');
        $dto->setSave(true);

        return $dto;
    }
}
