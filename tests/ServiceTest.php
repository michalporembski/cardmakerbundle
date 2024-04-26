<?php

namespace Tests\MPorembski\CardMaker\Services;

use MPorembski\CardMaker\Service\SheetPrinter;
use PHPUnit\Framework\TestCase;

class SheetPrinterTest extends TestCase
{
    public function testSomething(): void
    {
        $dummyService = new Service();
        $x = $dummyService->foo();
        $this->assertTrue('bar' == $x);
    }
}
