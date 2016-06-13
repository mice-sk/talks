<?php
namespace Tests\Unit\Demo;

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

    public function testAdd_twoIntegers_returnsCorrectResult()
    {
        $result = $this->calculator->add(1, 2);

        $this->assertEquals(3, $result);
    }

    public function testSub_twoIntegers_returnsCorrectResult()
    {
        $result = $this->calculator->sub(2, 1);

        $this->assertEquals(1, $result);
    }

    public function testMul_twoIntegers_returnsCorrectResult()
    {
        $result = $this->calculator->mul(2, 2);

        $this->assertEquals(4, $result);
    }

    public function testDiv_twoIntegers_returnsCorrectResult()
    {
        $result = $this->calculator->div(4, 2);

        $this->assertEquals(2, $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDiv_divisionByZero_throwsException()
    {
        $this->calculator->div(1, 0);
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