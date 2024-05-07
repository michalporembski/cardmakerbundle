<?php

namespace Tests\MPorembski\CardMaker\Services;

use MPorembski\CardMaker\Services\SheetPrinter;
use PHPUnit\Framework\TestCase;

class SheetPrinterTest extends TestCase
{
    public function testSomething(): void
    {
        $sheetPrinter = new SheetPrinter();
        $sheetPrinter->addSmallCard('a', 'b');
        $this->assertTrue('bar' == 'bar');
    }
}
