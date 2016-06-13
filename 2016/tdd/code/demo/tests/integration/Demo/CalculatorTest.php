<?php
namespace Tests\Integration\Demo;

use Demo\Calculator;
use Demo\CourseProvider;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @var Calculator */
    protected $calculator;

    protected $mock;

    protected function setUp()
    {
        $this->mock = $this->createMock(CourseProvider::class);

        $this->calculator = new Calculator($this->mock);
    }

    public function testConvert_SVKToEUR_returnsCorrectResult()
    {
        $this->mock->method('getExchangeRate')
            ->with('SVK', 'EUR')
            ->willReturn(1/30.126);

        $result = $this->calculator->convert('SVK', 'EUR', 3000);

        $this->assertEquals($result, 3000 / 30.126);
    }

    public function testConvert_EURtoSVK_returnsCorrectResult()
    {
        $this->mock->method('getExchangeRate')
            ->with('EUR', 'SVK')
            ->willReturn(30.126);

        $result = $this->calculator->convert('EUR', 'SVK', 100);

        $this->assertEquals($result, 100 * 30.126);
    }
}
